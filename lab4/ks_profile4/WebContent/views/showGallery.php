<?php
/**
 * Displays a user's gallery
 * INPUT:
 * $username: a username (string)
 */
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
function showGallery($username) {
	?>
<div class="container">
	<p>&nbsp;</p>
	<div class="panel panel-default" style="width: 750px;">
		<div class="panel-heading"><label>Gallery</label></div>
		<div class="panel-body">
			<ul class="row">
				<?php
					$userID = UserDB::getUserID ( $username );
					$user = UserDB::getUserByID ( $userID );
					
					// get user gallery
					$IMAGES = UserDB::getGallery ( $userID );
					
					if ($IMAGES > 0) { // print out the images
						echo sizeof ( $IMAGES );
						foreach ( $IMAGES as $image ) {
							echo '<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
								<img src="data:image;base64,' . base64_encode ( $image ) . '"></li>';
						}
					} else { // if user has no images, say so
						echo '<li>No images!</li>';
					}
					?>
			</ul>
		</div>
	</div>
</div>
<?php } ?>