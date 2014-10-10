<?php
include_once ("../views/showUsers.php");
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
echo "<h1>Tests for showUsers class</h1><hr>";
echo "<hr><h2>It should output when a valid list is provided</h2><hr>";
$validTest1 = array (
		"username" => "LadyBug",
		"email" => "lady-bug@mail.com",
		"pass2" => "password", // password
		"phoneNum" => "8443819620",
		"website" => "www.facebook.com",
		"favcolor" => "red", // color
		"bday" => "011980",
		"whyRatChat" => "0", // reason
		"ratsOwned" => "0", // ratsOwned
);
$s1 = new UserData ( $validTest1 );
$validTest2 = array (
		"username" => "Scarecrow",
		"email" => "scarecrow@mail.com",
		"pass2" => "password", // password
		"phoneNum" => "3844591220",
		"website" => "www.twitter.com",
		"favcolor" => "blue", // color
		"bday" => "071994",
		"whyRatChat" => "1", // reason
		"ratsOwned" => "2", // ratsOwned
);
$s2 = new UserData ( $validTest2 );
$userList = array (
		$s1,
		$s2 
);
$userList = UserDB::fetchAll();
showUsers ( $userList );
echo "<hr><hr><br>";
?>