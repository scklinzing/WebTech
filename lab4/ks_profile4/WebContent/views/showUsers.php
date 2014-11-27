<?php
/**
 * Displays a list of users
 * INPUT: 
 * 		$userList: 	an array of UserData objects
 * 		$msg:		discriptive header message to display
 * 		$url:		relative profile link location (can't get absolute paths to work for some reason)
 */
include_once (dirname ( __FILE__ ) . "/../views/showUserImage.php");

function showUsers($userList, $msg, $url) {
	echo "<h2>" . $msg . "</h2>";
	
	foreach ( $userList as $user ) {
		showUserImage($user->getUsername(), "small");
		if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
			echo '<a href="'.$url.''.$user->getUsername().'" 
					class="btn btn-default" role="button">'.$user->getUsername().'</a><br>';
		} else {
			echo '<a href="" class="btn btn-default" role="button">'.$user->getUsername().'</a><br>';
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