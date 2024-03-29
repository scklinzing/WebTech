<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
</head>

<body>
	<header>
	<img src="../image/rat-chat-banner-728x187.gif" alt="Rat Chat Image"
		width="728" height="187">
	</header>
	<nav>
		<a href="../index.php">Home</a> | <a href="">Fancy Rat Varieties</a> |
		<a href="">Housing</a> | <a href="">Food</a> | <a href="">Toys</a> | <a
			href="">Links</a> | <a href="">My Profile</a>
	</nav>
	
	<!-- Input Member Data -->
	<section>
	<h2>Sign up to Rat Chat to start posting!</h2>
		<!-- <form id="signup-form" action="echoform1.php">-->
		<form action="../controllers/postUserController.php" method="Post">
			<fieldset>
				<legend>Member information</legend>
				<p>
					RatChat Username: <input name="username"
						placeholder="Your nickname" autofocus required tabindex="1">
				</p>
				<p>
					E-mail: <input type="email" name="email"
						placeholder="joe@email.com" required tabindex="2">
				</p>
				<p>
					Password: <input type="password" name="pass1" required tabindex="3">
				</p>
				<p>
					Re-Enter Password: <input type="password" name="password" required
						tabindex="4">
				</p>
				<p>
					Telephone: <input type="tel" name="phoneNum"
						placeholder="000-000-0000" required tabindex="5">
				</p>
				<p>
					Favorite website:<br> <input type="text" name="website"
						list="favorites" required tabindex="6">
					<datalist id="favorites">
						<option value="npr">National Public Radio</option>
						<option value="google">Google search</option>
						<option value="nyt">New York Times</option>
					</datalist>
				</p>
				<p>
					Select your favorite color: <input type="color" name="favcolor" tabindex="7">
				</p>
				<p>
					Birthday month and year: <input type="month" name="bday"
						required tabindex="8">
				</p>
				<p>
					Select a profile picture: <input type="file" name="profile-pic"
						accept="image/*" required tabindex="9">
				</p>
			</fieldset>
			<br>
			<fieldset>
				<legend>Rat Information</legend>
				<p>
					What brings you to Rat Chat?<br>
					<input type="radio" name="whyRatChat" value="1" tabindex="10" required> I own rats.<br>
					<input type="radio" name="whyRatChat" value="2" tabindex="11"> I am looking into getting a rat.<br>
					<input type="radio" name="whyRatChat" value="3" tabindex="12"> Other<br>
				</p>
				<p>
					How many rats do you currently own? Please enter a number. <input type="number"
						name="ratsOwned" min="0" value="0" required tabindex="13">
				</p>
				<p>
					What type of information are you interested in?<br>
					<!-- varieties, housing, food, toys, care -->
					<input type="checkbox" name="interestList[]" value ="ratVarieties">Rat Varieties  
					<input type="checkbox" name="interestList[]" value ="ratHousing">Housing 
					<input type="checkbox" name="interestList[]" value ="ratFood">Food 
					<input type="checkbox" name="interestList[]" value ="ratToys">Toys
					<input type="checkbox" name="interestList[]" value ="ratCare">Rat Care/Health 
				</p>
			</fieldset>
			<p>
				Make sure that you have read our <a href="">User Agreement</a> <input
					type="checkbox" name="user-agree-check" required tabindex="14">
			</p>
			<p><input type = "submit" name = "submit" value="Submit" tabindex="15"></p>
		</form>
	</section>
</body>
</html>