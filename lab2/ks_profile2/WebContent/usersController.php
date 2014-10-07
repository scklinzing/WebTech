<?php
include_once ("views/showUsers.php");
include_once ("models/UserDB.class.php");
include_once ("models/UserData.class.php");
$myUsers = UserDB::fetchAll ();
showUsers ( $myUsers );
?>