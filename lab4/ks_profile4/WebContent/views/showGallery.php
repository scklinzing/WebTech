<?php
/**
 * Displays a user's gallery
 * INPUT: 
 * 		$username: 	a username (string)
 */
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");

function showGallery($username) {
	$userID = UserDB::getUserID($username);
	$user = UserDB::getUserByID ( $userID );

	$IMAGES = UserDB::getGallery($userID);
	
	if ($IMAGES[0] != NULL) {
		for($k = 0; $k < count ( $IMAGES ); $k ++) {
			//echo $tags [$k] . " ";
			echo '<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
				<img src="data:image/'.$IMAGES[$k]['image_type'].';base64,'.base64_encode( $IMAGES[$k]['image'] ).'"></li>';
		}
	}
}
?>