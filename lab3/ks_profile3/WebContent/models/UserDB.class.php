<?php
// Responsibility: Handles all queries pertaining to user registration and login
class UserDB {
	
	public static function fetchAll() {
		$query = "SELECT user.userID, username, email, userPasswordHash, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned, userDateCreated,
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
   
	public static function addUser($myUser) {
		/**
		 * username, email, password, phoneNum, website, color, bday, reason, ratsOwned
		 */
		$query = "INSERT INTO user (username, email, userPasswordHash, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned)
				VALUES(:username, :email, :userPasswordHash, :phone, :website, :favcolor, :bday, :whyRatChat, :numRats)";
		$returnId = 0;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ($query);
			$statement->bindValue ( ":username", $newUser->getUsername() );
			$statement->bindValue ( ":email", $newUser->getEmail() );
			$passHash = password_hash($myUser->getPassword(), PASSWORD_DEFAULT);
			print_r($passHash);
			$statement->bindValue (":userPasswordHash", $passHash);
			$statement->bindValue ( ":phone", $newUser->getPhoneNum() );
			$statement->bindValue ( ":website", $newUser->getWebsite() );
			$statement->bindValue ( ":favcolor", $newUser->getFavColor() );
			$statement->bindValue ( ":bday", $newUser->getBDay() );
			$statement->bindValue ( ":whyRatChat", $newUser->getWhyRatChat() );
			$statement->bindValue ( ":numRats", $newUser->getRatsOwned() );
			$statement->execute ();
			$statement->closeCursor();
			$returnId = $db->lastInsertId("userID");
			$myInterests = $newUser->getInterestList();
			UserDB::writeInterestList($db, $returnId, $myInterests);
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>UserDB:addUser(): Error adding user ".$e->getMessage()."</p>";
		}
		return $returnId;
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
	
	public static function getUserByID($ID) {
		// Returns the UserData object corresponding to userID $Id
		$userID = strval ( $userID );
		$query = "SELECT * FROM USER WHERE (userID = :userID )";
		$user = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":userID", $ID); // Only binds at execute time
			$statement->execute ();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($result)) {
				$result['interestList'] = UserDB::getInterestsByUserID($userID);
				$user = new UserData($result);
			}
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>UserDB:getUserByID(): Error getting user with a particular Id ".$e->getMessage()."</p>";
		}
		return $user;
	}
	
	public static function getUserByName($name) {
		// Returns the UserData object corresponding to username $name
		$query = "SELECT * FROM USER WHERE (username = :username )"; 
		$user = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":username", $name);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new UserData($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>UserDB:getUserByName(): Error getting user with a particular name ".$e->getMessage()."</p>";
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
	
	public static function authenticateUser($user) {
		// Returns true if the UserData object corresponds to a valid authenticated user.
		if ($user->getErrorCount() > 0)
		    $user->setIsAuthenticated(false);
		else {
		    $hash = UserDB::getPasswordHash($user->getUsername());
		    if (is_null($hash)) {
		    	$user->setIsAuthenticated(false);
		    	$user->setError('username', "User doesn't exist");
		    } else {
			    $verify = password_verify($user->getPassword(), $hash);          
		        $user->setIsAuthenticated($verify);
		        if (!$verify)
		        	$user->setError('password', "Invalid password");
		    }
		}
		return $user;
	}
	
	private static function getPasswordHash($name) {
		// Returns the UserData object corresponding to username $name
		$query = "SELECT userPasswordHash FROM USER WHERE (username = :username )";
		$hash = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":username", $name);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$hash = $userRows['userPasswordHash'];
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>UserDB:getPasswordHash(): Error getting user password hash ".$e->getMessage()."</p>";
		}
		return $hash;
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
	
	/* get last n users */
	public static function getLastNUsers($n) {
		$query = "SELECT user.userID, username, email, userPasswordHash, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned, userDateCreated,
			                 GROUP_CONCAT(interestList.interestListName SEPARATOR ';') as interestlist
				      FROM user
			                 LEFT JOIN interestListMap
	 	                        ON user.userID = interestListMap.userID
			                 LEFT JOIN interestList
			                    ON interestListMap.interestListID = interestList.interestListID
			          GROUP BY user.userID
		              ORDER BY user.userDateCreated DESC LIMIT " .strval($n);
	
		$comments = array();
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->execute ();
			$users = UserDB::getUserArray($statement->fetchAll(PDO::FETCH_ASSOC));
			//print_r($users); // error handling
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting last n users in getLastNUsers() ".$e->getMessage()."</p>";
		}
		return $users;
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