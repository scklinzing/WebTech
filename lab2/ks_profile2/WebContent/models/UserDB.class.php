<?php
/**
 * Responsibility: Handles all queries pertaining to USER 
 */
class UserDB {
	public static function fetchAll() {
		$users = array ();
		try {
			$db = Database::getDB ();
			$query = 'SELECT * FROM user';
			$statement = $db->prepare ( $query );
			$statement->execute ();
			$users = UserDB::getUserArray ( $statement->fetchAll ( PDO::FETCH_ASSOC ) );
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error fetching users (UserDB.class.php)" . $e->getMessage () . "</p>";
		}
		return $users;
	}
	/* get info about a specific user */
	public static function getUser($username) {
		$username = strval ( $username );
		$query = "SELECT * FROM user WHERE username = :username";
		// Returns a user object or null;
		$user = null;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ( $query );
			$statement->bindParam ( ":username", $username ); // Only binds at execute time
			$statement->execute ();
			$result = $statement->fetch ( PDO::FETCH_ASSOC );
			if (! empty ( $result ))
				$user = new UserData ( $result );
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error retrieving users by username " . $e->getMessage () . "</p>";
		}
		return $user;
	}
	/* add a user to the database */
	public static function addUser($newUser) {
		// Inserts the user contained in a UserData object into DB
		/**
		 * username, email, password, phoneNum, website, color, bday, reason, ratsOwned
		 */
		$query = "INSERT INTO user (username, email, password, phoneNum, website, color, bday, reason, ratsOwned)
				VALUES(:username, :email, :pass2, :phone, :website, :favcolor, :bday, :whyRatChat, :numRats)";
		$returnId = 0;
		try {
			$db = Database::getDB();
			$username = $newUser->getUsername();
			$email = $newUser->getEmail();
			$password = $newUser->getPassword();
			$phoneNum = $newUser->getPhoneNum();
			$website = $newUser->getWebsite();
			$color = $newUser->getColor();
			$bday = $newUser->getBDay();
			$reason = $newUser->getReason();
			$ratsOwned = $newUser->getRatsOwned();
			
			$statement = $db->prepare ( $query );
			$statement->bindValue ( ":username", $username );
			$statement->bindValue ( ":email", $email );
			$statement->bindValue ( ":pass2", $password );
			$statement->bindValue ( ":phone", $phoneNum );
			$statement->bindValue ( ":website", $website );
			$statement->bindValue ( ":favcolor", $color );
			$statement->bindValue ( ":bday", $bday );
			$statement->bindValue ( ":whyRatChat", $reason );
			$statement->bindValue ( ":numRats", $ratsOwned );
			
			$statement->execute ();
			$statement->closeCursor ();
			$returnId = $db->lastInsertId ( "userID" );
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding user in function addUser (UserDB.class.php)" . $e->getMessage () . "</p>";
		}
		return $returnId;
	}
	/* get an array of users */
	public static function getUserArray($rowSet) {
		$users = array ();
		foreach ( $rowSet as $userRow ) {
			$user = new UserData ( $userRow );
			array_push ( $users, $user );
		}
		return $users;
	}
}
?>