<?php
include_once(dirname(__FILE__)."/../views/showUsers.php");
include_once(dirname(__FILE__)."/../models/UserDB.class.php");
include_once(dirname(__FILE__)."/../models/UserData.class.php");
include_once(dirname(__FILE__)."/../models/Database.class.php");

$myUsers = UserDB::getLastNUsers(3);
showUsers($myUsers, "Here are our three newest members!", "views/userProfile.php?username=");
?>