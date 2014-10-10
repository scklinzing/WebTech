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
	<!-- List all members here -->
	<?php
	include_once ("../views/showUsers.php");
	include_once ("../models/UserData.class.php");
	include_once ("../models/UserDB.class.php");
	include_once ("../models/Database.class.php");
	$userList = UserDB::fetchAll ();
	showUsers ( $userList );
	echo "<hr><hr><br>";
	?>
</body>
</html>