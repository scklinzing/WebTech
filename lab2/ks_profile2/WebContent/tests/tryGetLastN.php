<?php
include_once("../models/UserDB.class.php");
include_once("../models/Database.class.php");
include_once("../models/UserData.class.php");
include_once("../models/InterestListDB.class.php");
include_once("../views/showUsers.php");

$users = UserDB::getLastNUsers(3);

echo "<h1>Print out the array of the last 3 users</h1>";
print_r($users);

echo "<hr><h1>Print out the information of the last 3 users</h1>";
showUsers($users);

echo "<hr>";