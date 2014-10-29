<?php
include_once ("../views/showUser.php");
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
echo "<h1>Tests for showUser class</h1><hr>";
echo "<hr><h2>It should output when a valid user is provided</h2><hr>";

echo "<h3>Testing showUser() for RatLover345</h3><br>";
$user = "RatLover345";
showUser ( $user );
echo "<hr><br>";

echo "<h3>Testing showUser() for SillyGirl</h3><br>";
$user = "SillyGirl";
showUser ( $user );
echo "<hr><br>";

echo "<h3>Testing showUser() for MrAwesome</h3><br>";
$user = "MrAwesome";
showUser ( $user );
echo "<hr><br>";
?>