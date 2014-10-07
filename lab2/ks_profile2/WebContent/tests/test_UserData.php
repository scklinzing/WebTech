<?php
/**
 * username, email, password, phoneNum, website, color, bday, reason, ratsOwned
 *
 * Responsibility: Test the UserData class.
 */
include ("../models/UserData.class.php");
echo "<h1>Tests for UserData class";
echo "<h2>It should create a valid object when all input is provided</h2>";
$validTest = array (
		"username" => "Shelley",
		"email" => "shelley@mail.com",
		"pass2" => "password", // password
		"phoneNum" => "8780203940",
		"website" => "www.google.com",
		"favcolor" => "black", // color
		"bday" => "071992",
		"whyRatChat" => "1", // reason
		"ratsOwned" => "3", // ratsOwned
);
$s1 = new UserData ( $validTest );
$s1->printUser ();
?>