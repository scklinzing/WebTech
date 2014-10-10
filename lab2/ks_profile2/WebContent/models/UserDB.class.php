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
	public static function getUser($userID) {
		// Returns a user object or null;
		$user = null;
		try {
			$db = Database::getDB ();
			$query = "SELECT * FROM users WHERE userID = :userID";
			$statement = $db->prepare ( $query );
			$statement->bindParam ( ":userId", $userId ); // Only binds at execute time
			$statement->execute ();
			$result = $statement->fetch ( PDO::FETCH_ASSOC );
			if (! empty ( $result ))
				$user = new UserData ( $result );
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error retrieving users by userId " . $e->getMessage () . "</p>";
		}
		return $user;
		
		
		
		
		
		/* $user = array ();
		try {
			$db = Database::getDB ();
			$query = "SELECT * FROM Users WHERE userID = " + $userID;
			$statement = $db->prepare ( $query );
			$statement->execute ();
			$user = UserDB::getUserArray ( $statement->fetchAll ( PDO::FETCH_ASSOC ) );
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error fetching user by userID (UserDB.class.php)" . $e->getMessage () . "</p>";
		}
		return $user; */
		
		
		
	}
	/* add a user to the database */
	public static function addUser($newUser) {
		// Inserts the user contained in a UserData object into DB
		$returnId = 0;
		try {
			$db = Database::getDB ();
			/**
			 * username, email, password, phoneNum, website, color, bday, reason, ratsOwned
			 */
			$query = "INSERT INTO user (username, email, password, phoneNum, website, color, bday, reason, ratsOwned)
				VALUES(:username, :email, :pass2, :phone, :website, :favcolor, :bday, :whyRatChat, :numRats)";
			$statement = $db->prepare ( $query );
			$statement->execute ( $newUser );
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