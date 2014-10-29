<?php
include_once ("../views/showUsers.php");
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
echo "<h1>Tests for showUsers class</h1><hr>";
echo "<hr><h2>It should output when a valid list is provided</h2><hr>";
echo "<hr><h3>Testing with hard-coded data</h3><br>";
$validTest1 = array (
		"username" => "LadyBug",
		"email" => "lady-bug@mail.com",
		"password" => "password", // password
		"phoneNum" => "8443819620",
		"website" => "www.facebook.com",
		"favcolor" => "#000000", // color
		"bday" => "1980-11",
		"whyRatChat" => "2", // reason
		"ratsOwned" => "0", // ratsOwned
		"interestList" => array("ratVarieties")
);
$s1 = new UserData ( $validTest1 );
$validTest2 = array (
		"username" => "Scarecrow",
		"email" => "scarecrow@mail.com",
		"password" => "password", // password
		"phoneNum" => "3844591220",
		"website" => "www.twitter.com",
		"favcolor" => "#000000", // color
		"bday" => "1994-09",
		"whyRatChat" => "1", // reason
		"ratsOwned" => "2", // ratsOwned
		"interestList" => array("ratVarieties", "ratToys", "ratCare")
);
$s2 = new UserData ( $validTest2 );
$userList = array (
		$s1,
		$s2 
);
showUsers ( $userList );

echo "<hr><h3>Testing with fetched database data</h3><br>";
/* fetch the user information from the database instead */
$userList = UserDB::fetchAll();
showUsers ( $userList );
echo "<hr><hr><br>";
?>