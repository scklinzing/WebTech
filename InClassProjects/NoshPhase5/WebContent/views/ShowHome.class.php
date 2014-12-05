<?php  
class ShowHome {
	
  public static function show() {  	
?> 
	
	<!DOCTYPE html>
	<html>
	<head>
	<title>URL Nosh homepage</title>
	</head>
	<body>
	<h1>URL Nosh</h1>
	<em>Discerning web evaluators come to complain and evaluate.</em>
	
	<h3><a href="PostComment">Make comment here </a></h3>
	
	<h3><a href="CommentsController">See comments</a></h3>
	
	<h3><a href="LastCommentsController">See last 3 comments</a></h3>
	
	<h3><a href="RegisterController">Register as a new user</a></h3>
	
	<h3><a href="LoginController">Login</a></h3>
	
	<h3>The footer goes here</h3>
	
	</body>
	</html>
<?php
  }
}
?>