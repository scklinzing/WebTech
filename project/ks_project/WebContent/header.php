<div class="container">
<header>
<img src="https://lh4.googleusercontent.com/-fNMdMjLxjGA/VIjf2IdlMrI/AAAAAAAAALw/u8T-cRrNlJs/w728-h187-no/rat-chat-banner-728x187.gif" alt="Rat Chat Image"
	width="728" height="187">
</header>
</div>
<style>
body {
    background-color: #b0c4de;
} 
</style>
<div class="container">
	<ul class="nav nav-pills" role="tablist">
		<?php 
			/* get the uri to see what the active pill tab is */
			$uri = $_SERVER['REQUEST_URI'];
			//$uri = "";
		
			/* INDEX */
			if (strstr($uri, "index") != FALSE)
				echo '<li class="active"><a href="../index.php">Home</a> </li>';
			else
				echo '<li><a href="../index.php">Home</a> </li>';
			
			/* VARIETIES */
			if (strstr($uri, "varieties") != FALSE)
				echo '<li class="active"><a href="../views/varieties.php">Fancy Rat Varieties</a></li>';
			else
				echo '<li><a href="../views/varieties.php">Fancy Rat Varieties</a></li>';
			
			/* HOUSING */
			if (strstr($uri, "housing") != FALSE)
				echo '<li class="active"><a href="../views/housing.php">Housing</a></li>';
			else
				echo '<li><a href="../views/housing.php">Housing</a></li>';
			
			/* FOOD */
			if (strstr($uri, "food") != FALSE)
				echo '<li class="active"><a href="../views/food.php">Food</a></li>';
			else
				echo '<li><a href="../views/food.php">Food</a></li>';
			
			/* TOYS */
			if (strstr($uri, "toys") != FALSE)
				echo '<li class="active"><a href="../views/toys.php">Toys</a></li>';
			else
				echo '<li><a href="../views/toys.php">Toys</a></li>';
			
			/* LINKS */
			if (strstr($uri, "links") != FALSE)
				echo '<li class="active"><a href="../views/links.php">Links</a></li>';
			else
				echo '<li><a href="../views/links.php">Links</a></li>';
			
        	/* USER PROFILE, LOGOUT, LOGIN, SIGN UP */
			if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
 
				/* USER PROFILE */
				if (strstr($uri, $_SESSION['userName']) != FALSE) {
					echo '<li class="active"><a href="../views/userProfile.php?username='
							.$_SESSION['userName'].'">'.$_SESSION['userName'].'</a></li>';
				} else {
					echo '<li><a href="../views/userProfile.php?username='
							.$_SESSION['userName'].'">'.$_SESSION['userName'].'</a></li>';
				}

		  		/* LOGOUT */
		  		echo '<li><a href="../controllers/logoutController.php">Logout</a></li>';
			} else {
				/* LOGIN */
				echo '<li><a href="../controllers/loginController.php">Login</a></li>';
				
				/* SIGN UP */
				echo '<li><a href="../controllers/registerController.php">Sign up</a></li>';
			}
		?>
	</ul>
</div>