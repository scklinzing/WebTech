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
		"password" => "password", // password
		"phoneNum" => "8780203940",
		"website" => "www.google.com",
		"favcolor" => "#000000", // color
		"bday" => "1992-07",
		"whyRatChat" => "1", // reason
		"ratsOwned" => "3", // ratsOwned
		"interestList" => array("ratVarieties", "ratFood"),
);
$s1 = new UserData ( $validTest );
$s1->printUser ();

echo "<h2>It should extract the parameters that went in</h2>";
$props = $s1->getParameters();
print_r($props);
echo "<br>";
?>