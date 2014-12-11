<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Rat Chat</title>
	<style>footer {text-align:center;}</style>
</head>

<body>
	<div class="container">
	<header>
	<img src="https://lh4.googleusercontent.com/-fNMdMjLxjGA/VIjf2IdlMrI/AAAAAAAAALw/u8T-cRrNlJs/w728-h187-no/rat-chat-banner-728x187.gif" alt="Rat Chat Image"
		width="728" height="187">
	</header>
	</div>
	<div class="container">
      <ul class="nav nav-pills" role="tablist">
        <li class="active"><a href="index.php">Home</a> </li>
        <li> <a href="views/varieties.php">Fancy Rat Varieties</a> </li>
        <li> <a href="views/housing.php">Housing</a> </li>
        <li> <a href="views/food.php">Food</a> </li>
        <li> <a href="views/toys.php">Toys</a> </li> 
        <li> <a href="views/links.php">Links</a> </li>
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
		
		<div class="row">
			<div class="col-lg-4">
				<img src="https://lh3.googleusercontent.com/-qLJNtgqyUTQ/VIjzw0wp7EI/AAAAAAAAAOQ/
				p_xR8LXSCUM/w598-h816-no/20141121_142711_LLS%5B1%5D.jpg" alt="Basil" title="Basil" width="300">
			</div>
			<div class="col-lg-5">
				<section>
					<h2>Here is some quick info:</h2>
					<p>This website is dedicated to pet fancy rats.</p> 
					<p>Here you will find information about:</p>
					<ul>
						<li><b>Health:</b> Learn how to care for your rat, and look for signs that indicate sickness.</li>
						<li><b>Varieties:</b> Here is information regarding the types of fur, as well as the color 
							and different markings.</li>
						<li><b>Housing and Bedding:</b> Find inspiring ways to decorate and organize your rats' home.</li>
						<li><b>Food:</b> Lab blocks or a homemade diet? Ideas here!</li>
						<li><b>Toys:</b> Rats don't need expensive toys from pet stores! Here are some safe, 
							homemade ideas to entertain your ratties.</li>
						<li><b>And much more!</b></li>
					</ul>
				</section>
			</div>
		</div>
		
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