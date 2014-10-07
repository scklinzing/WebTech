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
			$userRows = $statement->fetchAll ();
			foreach ( $userRows as $userRow ) {
				print_r ( $userRow ); // Just temporary
				echo "<br>"; // Just temporary
				$user = new UserData ( $userRow );
				array_push ( $users, $users );
			}
			$statement->closeCursor ();
			return $users;
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error fetching comments $e->getMessage()</p>";
		}
		return $users;
	}
	public static function addUser($newUser) {
		try {
			$db = Database::getDB ();
			/**
			 * username, email, password, phoneNum, website, color, bday, reason, ratsOwned
			 */
			$query = "INSERT INTO user (username, email, password, phoneNum, website, color, bday, reason, ratsOwned)
				VALUES(:username, :email, :pass2, :phone, :website, :favcolor, :bday, :whyRatChat, :numRats)";
			$statement = $db->prepare ( $query );
			$statement->execute ($newUser);
			
			return "I did it";
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding new user $e->getMessage()</p>";
		}
		return $users;
	}
}
?>