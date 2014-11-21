<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Rat Chat</title>
</head>

<body>
	<header>
	<img src="image/rat-chat-banner-728x187.gif" alt="Rat Chat Image"
		width="728" height="187">
	</header>
	<nav>
		<a href="index.php">Home</a> | 
		<a href="">Fancy Rat Varieties</a> |
		<a href="">Housing</a> | 
		<a href="">Food</a> | 
		<a href="">Toys</a> | 
		<a href="">Links</a> | 
		<?php 
			if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) { 
		  		echo "Logged in as <a href=\"views/userProfile.php?username=".$_SESSION['userName']."\">".$_SESSION['userName']."</a> | ";
		  		echo "<a href=\"controllers/logoutController.php\">Logout</a>";
			} else {
				echo "<a href=\"controllers/loginController.php\">Login</a> or 
				<a href=\"controllers/registerController.php\">Sign up</a>";
			}
		?>
	</nav>
	
	<?php if (isset($_SESSION['userLoginStatus']) &&
		    $_SESSION['userLoginStatus'] == 1) 
		  echo "<h1>Hello " . $_SESSION['userName']."!</h1>";
	?>
	
	<h1>Welcome to Rat Chat!</h1>
	<section>
		<h2>Here is some quick info:</h2>
		<p>This website is dedicated to pet fancy rats. Here you will find
			information about health, varieties, housing, food, toys, and much
			more!</p>
	</section>
	<aside>
		<?php include_once (dirname ( __FILE__ ) . "/controllers/lastUsersController.php"); ?>
		<h3><a href="controllers/usersController.php">See the full member list here!</a></h3>
	</aside>
	<footer>
		<p>-x-</p>
		<p>
			<i>Rat Chat Website created by Shelley Klinzing</i>
		</p>
	</footer>
</body>

</html>