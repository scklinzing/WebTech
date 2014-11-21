<header>
<img src="../image/rat-chat-banner-728x187.gif" alt="Rat Chat Image"
	width="728" height="187">
</header>
<div class="container">
	<ul class="nav nav-pills" role="tablist">
        <li class="active"><a href="../index.php">Home</a> </li>
        <li> <a href="">Fancy Rat Varieties</a> </li>
        <li> <a href="">Housing</a> </li>
        <li> <a href="">Food</a> </li>
        <li> <a href="">Toys</a> </li> 
        <li> <a href="">Links</a> </li>
        <?php 
			if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) { 
		  		echo "<li><a href=\"../views/userProfile.php?username="
						.$_SESSION['userName']."\">".$_SESSION['userName']."</a></li>";
		  		echo "<li><a href=\"../controllers/logoutController.php\">Logout</a></li>";
			} else {
				echo "<li><a href=\"../controllers/loginController.php\">Login</a></li> 
				<li><a href=\"../controllers/registerController.php\">Sign up</a></li>";
			}
		?>
	</ul>
</div>