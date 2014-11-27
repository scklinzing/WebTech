<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Rat Chat</title>
</head>

<body>
	<header>
	<img src="image/rat-chat-banner-728x187.gif" alt="Rat Chat Image"
		width="728" height="187">
	</header>
	<div class="container">
      <ul class="nav nav-pills" role="tablist">
        <li class="active"><a href="index.php">Home</a> </li>
        <li> <a href="views/varieties.php">Fancy Rat Varieties</a> </li>
        <li> <a href="">Housing</a> </li>
        <li> <a href="">Food</a> </li>
        <li> <a href="">Toys</a> </li> 
        <li> <a href="/views/links.php">Links</a> </li>
        <?php 
			if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) { 
		  		echo "<li><a href=\"views/userProfile.php?username="
						.$_SESSION['userName']."\">".$_SESSION['userName']."</a></li>";
		  		echo "<li><a href=\"controllers/logoutController.php\">Logout</a></li>";
			} else {
				echo "<li><a href=\"controllers/loginController.php\">Login</a></li> 
				<li><a href=\"controllers/registerController.php\">Sign up</a></li>";
			}
		?>
      </ul>
    </div>
	
	<div class="container">
		<?php
			if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) { 
				echo "<h1><i>Hello <b>" . $_SESSION['userName']."</b>! Welcome back to Rat Chat!</i></h1>";
			} else {
				echo "<h1>Welcome to Rat Chat!</h1>";
			}
		?>
		
		<section>
			<h2>Here is some quick info:</h2>
			<p>This website is dedicated to pet fancy rats. Here you will find
				information about health, varieties, housing, food, toys, and much
				more!</p>
		</section>
		<aside>
			<?php include_once (dirname ( __FILE__ ) . "/controllers/lastUsersController.php"); ?>
			<a href="controllers/usersController.php" class="btn btn-default" role="button">See the full member list here!</a>
		</aside>
	</div>
	<footer>
		<p>-x-</p>
		<p>
			<i>Rat Chat Website created by Shelley Klinzing</i>
		</p>
	</footer>
</body>

</html>