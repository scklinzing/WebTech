<?php
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../views/showUser.php");
include_once (dirname ( __FILE__ ) . "/../views/registerForm.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");
include_once (dirname ( __FILE__ ) . "/../models/InterestListDB.class.php");

if ($_SERVER ["REQUEST_METHOD"] != "POST") {
	$user = new UserData ();
	registerForm ( $user );
} else {
	
	/* check to see if the image is an actual image */
	if (isset ( $_POST ["submit"] )) {
		$check = getimagesize ( $_FILES ["userImage"] ["tmp_name"] );
		if ($check !== false) {
			echo "File is an image - " . $check ["mime"] . ".";
			$uploadOk = 1;
		} else {
			throw new Exception ( "File is not an image." );
			$uploadOk = 0;
		}
	}
	
	/* create a new user */
	$user = new UserData ( $_POST );
	// print_r($user); // error handling
	// echo "<br><br>";
	// print_r($_POST); // error handling
	if (! is_null ( UserDB::getUserByName ( $user->getUsername () ) ))
		$user->setError ( 'username', 'User already exists, choose another name' );
	$id = 0;
	if ($user->getErrorCount () == 0) { // if no errors, attempt to add user to DB
		$id = UserDB::addUser ( $user );
		if ($id != 0) { // add user profile picture
			
			/* check to see if a file was uploaded */
			if (is_uploaded_file ( $_FILES ['userImage'] ['tmp_name'] ) && getimagesize ( $_FILES ['userImage'] ['tmp_name'] ) != false) {
				/* get the image info */
				$size = getimagesize ( $_FILES ['userImage'] ['tmp_name'] );
				/* assign variables */
				$type = $size ['mime'];
				$imgfp = fopen ( $_FILES ['userImage'] ['tmp_name'], 'rb' );
				$size = $size [3];
				$name = $_FILES ['userImage'] ['name'];
				$maxsize = 999999999;
				
				if ($_FILES ['userImage'] ['size'] < $maxsize) {
					/* query */
					$query = "INSERT INTO userImage (image_type, image, image_size, image_name, userID) 
							VALUES (? ,?, ?, ?, ?)";
					
					$db = Database::getDB ();
					$statement = $db->prepare ( $query );
					$statement->bindParam ( 1, $type );
					$statement->bindParam ( 2, $imgfp, PDO::PARAM_LOB );
					$statement->bindParam ( 3, $size );
					$statement->bindParam ( 4, $name );
					$statement->bindParam ( 5, $id );
					$statement->execute ();
				} else {
					/* throw an exception is image is not of correct type */
					throw new Exception ( "File Size Error" );
				}
			} else {
				// if the file is not less than the maximum allowed, print an error
				throw new Exception ( "Unsupported Image Format!" );
			}
		} // end file upload
	}
	if ($id != 0) { // if successfully added, show the user profile page
		$user = UserDB::getUserByID ( $id ); // get new user
		$_SESSION ['userName'] = $user->getUsername (); // set session
		$_SESSION ['userLoginStatus'] = 1;
		header ( "location: ../views/userProfile.php?username=" . $_SESSION ['userName'] ); // show profile page
	} else {
		registerForm ( $user );
	}
}
?>