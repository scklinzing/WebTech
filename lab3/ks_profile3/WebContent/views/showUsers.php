<?php
/**
 * Displays a list of users
 * Input: an array of UserData objects
 */
function showUsers($userList, $msg) {
	echo "<h1>" . $msg . "</h1>";
	
	foreach ( $userList as $user ) {
		echo "<h1>Rat Chat User</h1>";
		if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
			echo "<b><a href=\"../views/userProfile.php?username=".$user->getUsername()."\">".$user->getUsername()."</a></b><br>";
		} else {
			echo "Username: <b>".$user->getUsername()."</b><br>";
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
}
?>