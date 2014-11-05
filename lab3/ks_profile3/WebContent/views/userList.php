<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User List</title>
</head>

<body>
	<header>
	<img src="../image/rat-chat-banner-728x187.gif" alt="Rat Chat Image"
		width="728" height="187">
	</header>
	<nav>
		<a href="../index.php">Home</a> | <a href="">Fancy Rat Varieties</a> |
		<a href="">Housing</a> | <a href="">Food</a> | <a href="">Toys</a> | <a
			href="">Links</a> | <a href="">My Profile</a>
	</nav>
	
	<!-- List all members here -->
	<?php
	include_once ("../views/showUsers.php");
	include_once ("../models/UserData.class.php");
	include_once ("../models/UserDB.class.php");
	include_once ("../models/Database.class.php");
	$userList = UserDB::fetchAll ();
	showUsers ( $userList, "" );
	echo "<hr><hr><br>";
	?>
</body>
</html>