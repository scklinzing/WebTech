<?php
/**
 * Responsibility: Handles all queries pertaining to USER 
 */
class UserDB {
	public static function fetchAll() {
		$query = "SELECT user.userID, username, email, password, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned,
			                 GROUP_CONCAT(interestList.interestListName SEPARATOR ';') as interestlist
				      FROM user
			                 LEFT JOIN interestListMap
	 	                        ON user.userID = interestListMap.userID
			                 LEFT JOIN interestList
			                    ON interestListMap.interestListID = interestList.interestListID
			          GROUP BY user.userID";
		$users = array ();
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ( $query );
			$statement->execute ();
			$users = UserDB::getUserArray ( $statement->fetchAll ( PDO::FETCH_ASSOC ) );
			//print_r($users); // for debugging purposes
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error fetching users (UserDB.class.php)" . $e->getMessage () . "</p>";
		}
		return $users;
	}
	
	/* return the userID for a username */
	public static function getUserID($username) {
		$username = strval ( $username );
		$query = "SELECT * FROM user WHERE username = :username";
		// Returns a userID object or null;
		$id = null;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ( $query );
			$statement->bindParam ( ":username", $username ); // Only binds at execute time
			$statement->execute ();
			$result = $statement->fetch ( PDO::FETCH_ASSOC );
			//print_r($result); // for debugging purposes
			if (! empty ( $result ))
				$id = $result['userID'];
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error retrieving userID by username (getUserID()) " . $e->getMessage () . "</p>";
		}
		return $id;
	}
	
	/* get info about a specific user by their userID */
	public static function getUserByID($userID) {
		$userID = strval ( $userID );
		$query = "SELECT * FROM user WHERE userID = :userID";
		// Returns a user object or null;
		$user = null;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ( $query );
			$statement->bindParam ( ":userID", $userID ); // Only binds at execute time
			$statement->execute ();
			$result = $statement->fetch ( PDO::FETCH_ASSOC );
			//print_r($result); // for debugging purposes
			if (! empty ( $result )) {
				$result['interestList'] = UserDB::getInterestsByUserID($userID);
				$user = new UserData ( $result );
			}
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error retrieving users by userID " . $e->getMessage () . "</p>";
		}
		return $user;
	}
	
	/* get user rows and return a UserData object */
	public static function getUser($userRow) {
		// Return a comment object from a rowset.
		if (isset($userRow['interestlist'])) {
			$tags = $userRow['interestlist'];
			$interestList = explode(";", $tags);
			$userRow['interestList'] = explode(";", $tags);
		}
		return new UserData ( $userRow );
	}
	
	/* return the interestList of a certain user by userID */
	public static function getInterestsByUserId($userID) {
		$query = "SELECT interestList.interestListName
				     FROM interestListMap
						LEFT JOIN interestList
			               ON interestListMap.interestListID = interestList.interestListID
				     WHERE interestListMap.userID = :userID";
	
		$tags = array ();
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ( $query );
			$statement->bindParam ( ":userID", $userID );
			$statement->execute ();
			$results = $statement->fetchAll ( PDO::FETCH_ASSOC );
			$tags = array();
			for ($k = 0; $k < count($results); $k++) {
				array_push($tags, $results[$k]['interestListName']);
			}
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error retrieving interests for user .$userID in getInterestsByUserID() " . $e->getMessage () . "</p>";
		}
		return $tags;
	}
	
	
	
	
	
	
	
	/* add a user to the database */
	public static function addUser($newUser) {
		// Inserts the user contained in a UserData object into DB
		/**
		 * username, email, password, phoneNum, website, color, bday, reason, ratsOwned
		 */
		$query = "INSERT INTO user (username, email, password, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned)
				VALUES(:username, :email, :pass2, :phone, :website, :favcolor, :bday, :whyRatChat, :numRats)";
		$returnId = 0;
		try {
			$db = Database::getDB();
			$username = $newUser->getUsername();
			$email = $newUser->getEmail();
			$password = $newUser->getPassword();
			$phoneNum = $newUser->getPhoneNum();
			$website = $newUser->getWebsite();
			$favcolor = $newUser->getFavColor();
			$bday = $newUser->getBDay();
			$whyRatChat = $newUser->getWhyRatChat();
			$ratsOwned = $newUser->getRatsOwned();
			
			$statement = $db->prepare ( $query );
			$statement->bindValue ( ":username", $username );
			$statement->bindValue ( ":email", $email );
			$statement->bindValue ( ":pass2", $password );
			$statement->bindValue ( ":phone", $phoneNum );
			$statement->bindValue ( ":website", $website );
			$statement->bindValue ( ":favcolor", $favcolor );
			$statement->bindValue ( ":bday", $bday );
			$statement->bindValue ( ":whyRatChat", $whyRatChat );
			$statement->bindValue ( ":numRats", $ratsOwned );
			
			$statement->execute ();
			$statement->closeCursor ();
			$returnId = $db->lastInsertId ( "userID" );
			
			$myInterests = $newUser->getInterestList();
			UserDB::writeInterestList($db, $returnId, $myInterests);
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding user in function addUser (UserDB.class.php)" . $e->getMessage () . "</p>";
		}
		return $returnId;
	}
	
	/* write a user's interestList to the database */
	public static function writeInterestList($db, $id, $list) {
		// Write the array of $tags for comment $id to commentTagMap
		if (empty($list))
			return;
		$query = "INSERT INTO interestListMap (interestListID, userID)
		                           VALUES(:interestListID, :userID)";
		$listMap = InterestListDB::getMap('interestListName', 'interestListID');
		try {
			$statement = $db->prepare ($query);
			$statement->bindParam(":userID", $id);
				
			for ($k = 0; $k < count($list); $k++) {
				$statement->bindParam(":interestListID", $listMap[$list[$k]]);
				$statement->execute ();
			}
			$statement->closeCursor();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding interest list data for user in writeInterestList() ".$e->getMessage()."</p>";
		}
	}

	/* get an array of users */
	public static function getUserArray($rowSets) {
		$users = array ();
		//print_r($rowSets); // for debugging
		foreach ( $rowSets as $userRow ) {
			$user = UserDB::getUser($userRow);
			//$user->printUser();
			array_push ( $users, $user );
		}
		return $users;
	}
}
?>