<?php
include_once("../models/UserDB.class.php");
include_once("../models/Database.class.php");
include_once("../models/UserData.class.php");
include_once("../models/UserTagsDB.class.php");
include_once("../models/MemberClassesDB.class.php");
include_once("../views/showUsers.php");

$users = UserDB::getLastNUsers(3);
print_r($users);

showUsers($users);