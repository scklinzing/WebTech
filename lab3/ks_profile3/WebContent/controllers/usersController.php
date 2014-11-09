<?php
include_once(dirname(__FILE__)."/../views/showUsers.php");
include_once(dirname(__FILE__)."/../models/UserDB.class.php");
include_once(dirname(__FILE__)."/../models/UserData.class.php");
include_once(dirname(__FILE__)."/../models/Database.class.php");

echo "<h1>Here are all our current members!</h1>";
$myUsers = UserDB::fetchAll ();
showUsers ( $myUsers, "" );
?>