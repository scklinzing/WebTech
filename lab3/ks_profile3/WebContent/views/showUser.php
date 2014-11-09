<?php
/**
 * Displays the information about the user passed through
 * Input: a username (string) OR a UserData object.
 */
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
function showUser($username) {
	/* if it is a username, fetch the data */
	if(gettype($username) == "string") {
		$userID = UserDB::getUserID($username);
		$user = UserDB::getUserByID ( $userID );
	} else { /* if it's a UserData object, do nothing */
		$user = $username;
	}

	if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
		echo "<h3><a href=\"../views/userProfile.php?username=".$user->getUsername()."\">".$user->getUsername()."</a></h3><br>";
	} else {
		echo "<h3>Username: ".$user->getUsername()."</h3><br>";
	}
	echo "userID: ".$user->getUserID()."<br>";
	echo "Email: ".$user->getEmail()."<br>";
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