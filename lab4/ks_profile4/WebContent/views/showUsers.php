<?php
/**
 * Displays a list of users
 * Input: an array of UserData objects
 */
function showUsers($userList, $msg) {
	echo "<h2>" . $msg . "</h2>";
	
	foreach ( $userList as $user ) {
		if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
			echo "<img src=\"image/no-photo-small.png\" alt=\"[User Image]\" 
					title=\"".$user->getUsername()."\" width=\"50\" height=\"50\">
					<a href=\"views/userProfile.php?username=".$user->getUsername()."\"
							 class=\"btn btn-default\" role=\"button\">".$user->getUsername()."</a><br>";
		} else {
			echo "<img src=\"image/no-photo-small.png\" alt=\"[User Image]\" 
					title=\"".$user->getUsername()."\" width=\"50\" height=\"50\">
					<a href=\"\" class=\"btn btn-default\" role=\"button\">".$user->getUsername()."</a><br>";
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
		echo "<br>";
	}
}
?>