<?php session_start (); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="../jquery/jquery-2.1.1.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<title>Add Photo</title>
</head>

<body>
<form class="form-vertical" role="form" enctype="multipart/form-data"
	action="../controllers/addPhotoController.php" method="Post">
	<h1>Add new Photo to Gallery:</h1>
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<input type="hidden" name="MAX_FILE_SIZE" value="999999999" /> <label
					for="addPhoto">Add photos to gallery:</label> <input
					class="btn btn-default" type="file" name="addPhoto" id="addPhoto"
					accept="image/*">
				<button class="btn btn-default" type="submit" name="submit"
					value="Submit">Upload</button>
			</div>
		</div>
	</div>
</form>

</body>
</html>
