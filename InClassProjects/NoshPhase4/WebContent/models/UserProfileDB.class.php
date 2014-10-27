<?php
// Responsibility: Handles all queries pertaining to user registration and login
class UserDB {
   
	public static function addUser($myUser) {
		// Inserts the user contained in a UserData object into DB
		$query = "INSERT INTO USERS (userName, userEmail, userPasswordHash)
		            VALUES(:userName, :userEmail, :userPasswordHash)";
		$returnId = 0;
		try {
			$db = Database::getDB ();
			$name = $myUser->getUserName();
			$email = $myUser->getUserEmail();
			$existingUser = UserDB::getUserBy($name, $email);
			if (!is_null($existingUser))  // user already exists
			    
			$memberClassName = $myComment->getMemberClassName();
			$memberClassId = MemberClassesDB::getIdByName ($memberClassName);
			$statement = $db->prepare ($query);
			$statement->bindValue(":evaluationUrl", $evaluationUrl);
			$statement->bindValue(":comment", $comment);
			$statement->bindValue(":memberClassId", $memberClassId);
			$statement->execute ();
			$statement->closeCursor();
			$returnId = $db->lastInsertId("commentId");
			$myTags = $myComment->getCommentTagList();
			CommentDB::writeCommentTags($db, $returnId, $myTags);
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding comment ".$e->getMessage()."</p>";
		}
		return $returnId;
	}
	
	public static function getUserByName($name) {
		// Returns the UserData object corresponding to userEmail $name
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
	
	public static function getUserByEmail($email) {
		// Returns the UserData object corresponding to userEmail $email
		$query = "SELECT * FROM USERS WHERE (userEmail = :userEmail)";
		$user = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":userEmail", $email);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new UserData($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user with a particular email ".$e->getMessage()."</p>";
		}
		return $user;
	}
	
	public static function authenticateUser($user) {
		// Returns $user if the UserData object corresponds to a valid authenticated user.
		if ($user->getErrorCount() > 0)
		   return $user;
		try {
			$db = Database::getDB ();
			$newUser = UserDataDB::getUserByName($user->getUserName());
			if (is_null($newUser)) {
				
			$statement = $db->prepare($query);
			$statement->bindParam(":userEmail", $email);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new UserData($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user with a particular email ".$e->getMessage()."</p>";
		}
		return $user;
	}
	}
	
	public static function getUserByEmail($email) {
		// Returns the UserData object corresponding to userEmail $email
		$query = "SELECT * FROM USERS WHERE (userEmail = :userEmail)";
		$user = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":userEmail", $email);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new UserData($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user with a particular email ".$e->getMessage()."</p>";
		}
		return $user;
	}
	
}
?>
