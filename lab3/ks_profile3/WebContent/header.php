<header>
<img src="../image/rat-chat-banner-728x187.gif" alt="Rat Chat Image"
	width="728" height="187">
</header>
<nav>
	<a href="../index.php">Home</a> | 
	<a href="">Fancy Rat Varieties</a> |
	<a href="">Housing</a> | 
	<a href="">Food</a> | 
	<a href="">Toys</a> | 
	<a href="">Links</a> | 
	<?php 
		if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) { 
	  		echo "Logged in as <a href=\"../views/userProfile.php?username=".$_SESSION['userName']."\">".$_SESSION['userName']."</a> | ";
	  		echo "<a href=\"../controllers/logoutController.php\">Logout</a>";
		} else {
			echo "<a href=\"../controllers/loginController.php\">Login</a> or 
			<a href=\"../controllers/registerController.php\">Sign up</a>";
		}
	?>
</nav>