<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Demonstrating file upload</title>
<link href="bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Sample upload</h1>

 <form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
  <div><label>Upload profile picture</label>
       <input name="profilePicture" type="file" /></div>
  <div><input type="submit" value="Submit" /></div>
  </form>

	<script src="jquery/jquery-2.1.1.min.js"></script>
	<script src="bootstrap/3.3.0/js/bootstrap.min.js"></script>

</body>
</html>
