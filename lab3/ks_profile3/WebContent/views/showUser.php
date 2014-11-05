<?php
/**
 * Displays the information about the user passed through
 * Input: a username
 */
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
function showUser($username) {
	$userID = UserDB::getUserID($username);
	$user = UserDB::getUserByID ( $userID );

	echo "<h3><a href=\"../views/userProfile.php?username=".$user->getUsername()."\">".$user->getUsername()."</a></h3><br>";
	echo "userID: ".$user->getUserID()."<br>";
	echo "Email: ".$user->getEmail()."<br>";
	echo "Password: ".$user->getPassword()."<br>";
	echo "Phone Number: ".$user->getPhoneNum()."<br>";
	echo "Website: ".$user->getWebsite()."<br>";
	echo "Color: ".$user->getFavcolor()."<br>";
	echo "Birthday Month and Year: ".$user->getBday()."<br>";
	echo "Reason on Rat Chat: ";
	switch($user->getWhyRatChat()) {
			case 1:
	echo "I own rats.<br>";
			break;
			case 2:
	echo "I am looking into owning rats.<br>";
			break;
			default:
	echo "Other reason.<br>";
	break;
	}
	echo "Rats Owned: ".$user->getRatsOwned()."<br>";
	/* print out the interest list */
	$tags = $user->getInterestList ();
	echo "Interest List: [ ";
	for($k = 0; $k < count ( $tags ); $k ++)
		echo $tags [$k] . " ";
	echo "]<br>";
	echo "Date user joined: ".$user->getUserDateCreated()."<br>";
}
?>