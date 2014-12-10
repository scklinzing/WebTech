<?php
function loginForm($user) {
	?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Rat Chat Login</title>
</head>
<body>
	<?php include_once(dirname(__FILE__)."/../header.php"); ?>
	<div class="container">
		<form action="../controllers/loginController.php" method="Post">
			<br>
			<div class="row">
				<div class="col-lg-2">
					<label for="username">Username:</label>
					<input class="form-control" type="text" name="username" id="username" 
						<?php if (!is_null($user)) {echo 'value = "'. $user->getUsername() .'"';}?>> 
						<span class="error"><?php if (!is_null($user)) {echo $user->getError("username");}?></span>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-2">
					<label for="password">Password:</label>
					<input class="form-control" type="password" name="password" id="password" 
						<?php if (!is_null($user)) {echo 'value = "'. $user->getPassword() .'"';}?>>
						<span class="error"><?php if (!is_null($user)) {echo $user->getError("password");}?></span>
				</div>
			</div>
		
			<br>
			<p><button class="btn btn-default" type = "submit" name = "submit" value="Submit">Submit</button></p>
		</form>
		
		<p>New user? <a href="../controllers/registerController.php">Sign up here</a></p>
		
		<p>Forget your password? Well good luck with that....</p>
	</div>
</body>
</html>
<?php 
}
?>