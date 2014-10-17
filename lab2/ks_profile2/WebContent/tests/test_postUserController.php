<?php
include_once ("../models/UserDB.class.php");
include_once ("../models/InterestListDB.class.php");

echo "<h1>Tests for postUserController </h1><hr>";

echo "<hr><h2>It should add a user to the database when a valid form is filled out</h2><hr>";

$_POST = array (
		"username" => "LadyBug",
		"email" => "lady-bug@mail.com",
		"password" => "password", // password
		"phoneNum" => "8443819620",
		"website" => "www.facebook.com",
		"favcolor" => "#ff0000", // color
		"bday" => "1980-11",
		"whyRatChat" => "2", // reason
		"ratsOwned" => "0", // ratsOwned
		"interestList" => array("ratToys")
);
print_r($_POST);
include_once("../controllers/postUserController.php"); //Make sure you understand

?>