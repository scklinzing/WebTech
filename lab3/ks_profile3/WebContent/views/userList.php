<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User List</title>
</head>

<body>
	<?php include_once ("../header.php"); ?>
	
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