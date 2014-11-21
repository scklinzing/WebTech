<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User List</title>
</head>

<body>
	<?php include_once(dirname(__FILE__)."/../header.php"); ?>
	
	<!-- List all members here -->
	<?php
	include_once(dirname(__FILE__)."/../views/showUsers.php");
	include_once(dirname(__FILE__)."/../models/UserData.class.php");
	include_once(dirname(__FILE__)."/../models/UserDB.class.php");
	include_once(dirname(__FILE__)."/../models/Database.class.php");
	$userList = UserDB::fetchAll ();
	showUsers ( $userList, "" );
	echo "<hr><hr><br>";
	?>
</body>
</html>