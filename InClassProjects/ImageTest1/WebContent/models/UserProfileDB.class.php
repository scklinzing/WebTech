<?php
// Responsibility: Handles all queries pertaining to user profile registration and login
class UserProfileDB {
   
	public static function addUserProfile($myUser) {
		// Inserts the user contained in a UserProfileData object into DB
		$query = "INSERT INTO USERPROFILES (userProfileEmail, userProfileFirstName, 
				        userProfileLastName, userId)
		            VALUES(:userProfileEmail, :userProfileFirstName, 
                           :userProfileLastName, :userId)";
		$returnId = 0;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ($query);
			$statement->bindValue(":userProfileEmail", $myUser->getUserProfileEmail());
			$statement->bindValue(":userProfileFirstName", $myUser->getUserProfileFirstName());
			$statement->bindValue(":userProfileLastName", $myUser->getUserProfileLastName());
			$statement->bindValue(":userId", $myUser->getUserId());
			$statement->execute ();
			$statement->closeCursor();
			$returnId = $db->lastInsertId("userProfileId");
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding user profile ".$e->getMessage()."</p>";
		}
		return $returnId;
	}
	
	public static function getAll() {
		$query =  "SELECT * FROM USERPROFILES";
		$userProfiles = array();
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->execute ();
			$userProfiles= UserProfileDB::getUserProfileArray($statement->fetchAll(PDO::FETCH_ASSOC));
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting all user profiles ".$e->getMessage()."</p>";
		}
		return $userProfiles;
	}
	
	public static function getUserProfileByUserId($Id) {
		// Returns the UserData object corresponding to userId $Id
		$query = "SELECT * FROM USERPROFILES WHERE (userId = :userId )";
		$user = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":userId", $Id);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new UserProfileData($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user profile with a particular Id ".$e->getMessage()."</p>";
		}
		return $user;
	}
	
	public static function getUserByEmail($email) {
		// Returns the UserData object corresponding to userName $name
		$query = "SELECT * FROM USERPROFILES WHERE (userProfileEmail = :userProfileEmail)"; 
		$user = NULL;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":userProfileEmail", $email);
			$statement->execute ();
			$userRows = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($userRows))
				$user = new UserProfileData($userRows);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting user with a particular email ".$e->getMessage()."</p>";
		}
		return $user;
	}
	
	public static function getUserProfileArray($rowSets) {
		$userProfiles = array ();
		foreach ( $rowSets as $profileRow ) {
			$userProfile = new UserProfileData($profileRow);
			array_push ( $userProfiles, $userProfile );
		}
		return $userProfiles;
	}
	

}
?>
