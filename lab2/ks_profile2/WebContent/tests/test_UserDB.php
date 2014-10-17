<?php
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
include_once ("../models/UserData.class.php");
echo "<h1>Tests for UserDB class";
echo "<h2>It should fetch the entire user table</h2>";
/* get all the users from the database */
$myUsers = UserDB::fetchAll ();
foreach ( $myUsers as $user )
	$user->printUser (); // print them out

echo "<h2>It should insert a new user</h2>";
$testUser = array ( // create new user
		"username" => "MaryJane",
		"email" => "mary.jane@mail.com",
		"password" => "password", // password
		"phoneNum" => "8492748920",
		"website" => "www.yahpp.com",
		"favcolor" => "#000000", // color
		"bday" => "1990-10",
		"whyRatChat" => "1", // reason
		"ratsOwned" => "4", // ratsOwned
		"interestList" => array("ratVarieties", "ratToys", "ratCare")
);

$user = new UserData($testUser);
$user->printUser();

$returnValue = userDB::addUser($user);
echo "It returned $returnValue";
?>