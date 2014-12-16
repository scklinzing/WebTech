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
		echo "<b>Email:</b> ".$user->getEmail()."<br>";
		echo "<b>Phone Number:</b> ".$user->getPhoneNum()."<br>";
		echo "<b>Website:</b> ".$user->getWebsite()."<br>";
		echo '<b>Color:</b> '.$user->getFavcolor().'&nbsp; <font size="3" color="'.$user->getFavcolor().'">&hearts;&hearts;&hearts;</font><br>';
		echo "<b>Birthday Month and Year:</b> ".$user->getBday()."<br>";
		echo "<b>Reason on Rat Chat:</b> ";
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
		echo "<b>Rats Owned:</b> ".$user->getRatsOwned()."<br>";
		/* print out the interest list */
		$tags = $user->getInterestList ();
		echo "<b>Interest List:</b> [ ";
		for($k = 0; $k < count ( $tags ); $k ++)
			echo $tags [$k] . " ";
		echo "]<br>";
		echo "<b>Date user joined:</b> ".$user->getUserDateCreated()."<br>";
		echo "<br>";
	}
}
?>