<?php  
class RegisterForm {
	
  public static function show($user) {  	
?> 
	<!DOCTYPE html>
	<html>
	<head>
	<title>URL NOSH Register Form</title>
	<meta name= "keywords" content="URL NOSH, Members, Register">
	<meta name="description" content = "Register for URL Nosh">
	</head>
	<body> 

	<form action ="RegisterController" method="Post">
	<p>User name: <input type="text" name ="userName" 
	<?php if (!is_null($user) && !empty($user->getUserName())) {echo 'value = "'. $user->getUserName() .'"';}?>> 
	<span class="error"><?php if (!is_null($user)) {echo $user->getError("userName");}?></span></p>
	
	<p>Password: <input id="password" type="password" name ="userPassword" 
	<?php if (!is_null($user) && !empty($user->getUserPassword())) {echo 'value = "'. $user->getUserPassword() .'"';}?>> 
	<span id="passwordError" class="error"><?php if (!is_null($user)) {echo $user->getError("userPassword");}?></span></p>
	
	<p>Retype password: <input id="retypedPassword" type="password" name ="userPasswordRetyped">
	<span id="retypedError" class="error"></span></p>
	
	<p><input type = "submit" name = "submit" value="Submit"></p>
	</form>
	</body>
	</html>
<?php 
  }
}
?>