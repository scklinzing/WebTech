<?php  
class LoginForm {
	
  public static function show($user) {  	
?> 
	<!DOCTYPE html>
	<html>
	<head>
	<title>URL NOSH Login Form</title>
	<meta name= "keywords" content="URL NOSH, Members, login">
	<meta name="description" content = "Login for URL Nosh">
	</head>
	<body>
	<form action ="LoginController" method="Post">
	<p>User name: <input type="text" name ="userName" 
	<?php if (!is_null($user)) {echo 'value = "'. $user->getUserName() .'"';}?>> 
	<span class="error"><?php if (!is_null($user)) {echo $user->getError("userName");}?></span></p>
	
	<p>Password: <input type="password" name ="userPassword" 
	<?php if (!is_null($user)) {echo 'value = "'. $user->getUserPassword() .'"';}?>> 
	<span class="error"><?php if (!is_null($user)) {echo $user->getError("userPassword");}?></span></p>
	
	<p><input type = "submit" name = "submit" value="Submit"></p>
	</form>
	
	<p>New user?  <a href="../controllers/registerController.php">Sign up here</a></p>
	
	<p>Forget your password?  Well good luck with that.... </p>
    </body>
    </html>
<?php 
  }
}
?>