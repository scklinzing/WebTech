<?php
session_start ();
include_once(dirname(__FILE__)."/../views/showUsers.php");
include_once(dirname(__FILE__)."/../models/UserDB.class.php");
include_once(dirname(__FILE__)."/../models/UserData.class.php");
include_once(dirname(__FILE__)."/../models/Database.class.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Member List Page</title>
	<style>footer {text-align:center;}</style>
</head>

<body>
	<!-- This must be declared early so we can put a link in the nav bar to the user's profile -->
	<?php
		include_once(dirname(__FILE__)."/../header.php");
		echo '<div class="container">';
			$myUsers = UserDB::fetchAll ();
			showUsers ( $myUsers, "Here are all our current members!", "../views/userProfile.php?username=");
		echo '</div>';
	?>
	<footer>
		<p>-x-</p>
		<p>
			<i>Rat Chat Website created by Shelley Klinzing</i>
		</p>
	</footer>
</body>
</html>