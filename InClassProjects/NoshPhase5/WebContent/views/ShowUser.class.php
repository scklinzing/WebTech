<?php  
class ShowUser {
	
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
<?php 
	echo "<h1>URL Nosh Member</h1>";
	echo "User Id: ".$user->getUserId()."<br>";
	echo "User name: ".$user->getUserName()."<br>";
	echo "Date created: ".$user->getuserDateCreated()."<br>";
	echo "Is authenticated: ".$user->getIsAuthenticated()."<br>";
	echo '<h3><a href="index.php">Back to home</a>';
	echo "</body></html>";
  }
}
?>