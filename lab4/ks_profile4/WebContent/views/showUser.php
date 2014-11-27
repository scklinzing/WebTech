<?php
/**
 * Displays the information about the user passed through
 * INPUT: 
 * 		$username: 	a username (string) ---OR--- a UserData object.
 * 		$url:		relative profile link location (can't get absolute paths to work for some reason)
 */
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../views/showUserImage.php");

function showUser($username, $url) {
	/* if it is a username, fetch the data */
	if(gettype($username) == "string") {
		$userID = UserDB::getUserID($username);
		$user = UserDB::getUserByID ( $userID );
	} else { /* if it's a UserData object, do nothing */
		$user = $username;
	}

	echo "<br>";
	showUserImage($user->getUsername(), "small");
	if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
		echo '<a href="'.$url.''. $user->getUsername().'" class="btn btn-default" role="button">'.$user->getUsername().'</a><br>';
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