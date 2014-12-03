<?php function addPhoto($username) { ?>
<form class="form-vertical" role="form" enctype="multipart/form-data"
	action="../controllers/addPhotoController.php" method="Post">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<input type="hidden" name="MAX_FILE_SIZE" value="999999999" /> <input
					type="hidden" name="username" value="<?php echo $username;?>" />
				<label for="addPhoto">Add photos to gallery:</label> <input
					class="btn btn-default" type="file" name="addPhoto" id="addPhoto"
					accept="image/*">
				<button class="btn btn-default" type="submit" name="submit"
					value="Submit">Upload</button>
			</div>
		</div>
	</div>
</form>
<?php }?>