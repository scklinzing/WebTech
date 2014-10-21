<?php
include_once("../views/showUsers.php");
include_once("../models/UserDB.class.php");
include_once("../models/UserData.class.php");
include_once("../models/Database.class.php");

echo "<h1>Here are our three newest members!</h1>";
$myUsers = UserDB::getLastNUsers(3);
showUsers($myUsers, "Last 3 users");
?>