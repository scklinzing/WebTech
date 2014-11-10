<?php
include_once(dirname(__FILE__)."/../models/Database.class.php");
include_once(dirname(__FILE__)."/../views/showUser.php");
include_once(dirname(__FILE__)."/../views/registerForm.php");
include_once(dirname(__FILE__)."/../models/UserData.class.php");
include_once(dirname(__FILE__)."/../models/UserDB.class.php");
include_once(dirname(__FILE__)."/../models/InterestListDB.class.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	$user = UserDB::getUserByName($_SESSION['userName']);
	registerForm($user);
} else {
   $user = new UserData($_POST);
   if ($user->getErrorCount() == 0)   
        $id = UserDB::updateUser($_SESSION['userName'], $user);
   if ($id != 0) { // if successfully added, show the user
        showUser(UserDB::getUserByID($id)); // need to fix what comes back
    } else {
    	registerForm($user);	
    }
} 
?>