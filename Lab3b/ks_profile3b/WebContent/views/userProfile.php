<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Profile</title>
</head>

<body>
	<!-- This must be declared early so we can put a link in the nav bar to the user's profile -->
	<?php $username = $_GET ['username']; ?>
	<header>
		<img src="../image/rat-chat-banner-728x187.gif" alt="[Rat Chat Image]"
			width="728" height="187">
	</header>
	<nav>
		<a href="../index.html">Home</a> | <a href="">Fancy Rat Varieties</a>
		| <a href="">Housing</a> | <a href="">Food</a> | <a href="">Toys</a> |
		<a href="">Links</a> | <?php echo "<a href=\"userProfile.php?username=$username\">My Profile</a>"; ?>
	</nav>
	<br />
	<img src="../image/no-photo-large.png" alt="User Image" title="user"
		width="200" height="200">

	<!-- Fetch and display user data -->
	<section>
		<?php
		include_once ("../views/showUser.php");
		//$username = $_GET ['username']; // this is declared at the beginning
		showUser($username);
		?>
	</section>
</body>
</html>