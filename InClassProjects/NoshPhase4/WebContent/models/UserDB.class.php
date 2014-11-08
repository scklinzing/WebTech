<?php
// Responsibility: Handles all queries pertaining to user registration and login
class UserDB {
   
	public static function addUser($myUser) {
		// Inserts the user contained in a UserData object into DB
		$query = "INSERT INTO USERS (userName, userPasswordHash)
		            VALUES(:userName, :userPasswordHash)";
		$returnId = 0;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ($query);
			$statement->bindValue(":userName", $myUser->getUserName());
			$passHash = password_hash($myUser->getUserPassword(), PASSWORD_DEFAULT);
			print_r($passHash);
			$statement->bindValue(":userPasswordHash", $passHash);
			$statement->execute ();
			$statement->closeCursor();
			$returnId = $db->lastInsertId("userId");
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding user ".$e->getMessage()."</p>";
		}
		return $returnId;
	}
	
	public static function getUserById($Id) {
		// Returns the UserData object corresponding to userId $Id
		$query = "SELECT * FROM USERS WHERE (userId = :userId )";
		$user = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":userId", $Id);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new UserData($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user with a particular Id ".$e->getMessage()."</p>";
		}
		return $user;
	}
	
	public static function getUserByName($name) {
		// Returns the UserData object corresponding to userName $name
		$query = "SELECT * FROM USERS WHERE (userName = :userName )"; 
		$user = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":userName", $name);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new UserData($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user with a particular name ".$e->getMessage()."</p>";
		}
		return $user;
	}
	
	public static function authenticateUser($user) {
		// Returns true if the UserData object corresponds to a valid authenticated user.
		$user = null;
		if ($user->getErrorCount() > 0)
		    $user->setIsAuthenticated(false);
		else {
		    $hash = UserDB::getUserPasswordHash($user->getUserName());
		    if (is_null($hash)) {
		    	$user->setIsAuthenticated(false);
		    	$user->setError('userName', "User doesn't exist");
		    } else {
			    $verify = password_verify($user->getUserPassword(), $hash);          
		        $user->setIsAuthenticated($verify);
		        if (!$verify)
		        	$user->setError('userPassword', "Invalid password");
		    }
		}
		return $user;
	}
	
	private static function getUserPasswordHash($name) {
		// Returns the UserData object corresponding to userName $name
		$query = "SELECT userPasswordHash FROM USERS WHERE (userName = :userName )";
		$hash = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":userName", $name);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$hash = $userRows['userPasswordHash'];
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user password hash ".$e->getMessage()."</p>";
		}
		return $hash;
	}
}
?>
