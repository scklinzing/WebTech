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
	<?php  
	function registerForm($user) {
	?>
	<!-- Input Member Data -->
	<section>
	<h2>Sign up to Rat Chat to start posting!</h2>
		<!-- <form id="signup-form" action="echoform1.php">-->
		<form action ="../controllers/registerController.php" method="Post">
			<fieldset>
				<legend>Member information</legend>
				<p>
					RatChat Username: <input type="text" name="username"
						placeholder="Your nickname" autofocus required tabindex="1"
						<?php if (!is_null($user) && !empty($user->getUsername())) {echo 'value = "'. $user->getUsername() .'"';}?>> 
						<span class="error"><?php if (!is_null($user)) {echo $user->getError("username");}?></span>
				</p>
				<p>
					E-mail: <input type="email" name="email"
						placeholder="joe@email.com" required tabindex="2">
				</p>
				<p>
					Password: <input id="password" type="password" name ="password" required tabindex="3"
					<?php if (!is_null($user) && !empty($user->getPassword())) {echo 'value = "'. $user->getPassword() .'"';}?>> 
					<span id="passwordError" class="error"><?php if (!is_null($user)) {echo $user->getError("password");}?></span>
				</p>
				<p>
					Retype password: <input id="retypedPassword" type="password" name="userPasswordRetyped" required tabindex="4">
					<span id="retypedError" class="error"></span>
				</p>
				<p>
					Telephone: <input type="tel" name="phoneNum" placeholder="000-000-0000" required tabindex="5"
					<?php if (!is_null($user) && !empty($user->getPhoneNum())) {echo 'value = "'. $user->getPhoneNum() .'"';}?>> 
					<span id="phoneNumError" class="error"><?php if (!is_null($user)) {echo $user->getError("phoneNum");}?></span>
				</p>
				<p>
					Favorite website:<br> <input type="text" name="website"
						list="favorites" required tabindex="6">
					<datalist id="favorites">
						<option value="npr">National Public Radio</option>
						<option value="google">Google search</option>
						<option value="nyt">New York Times</option>
					</datalist>
					<?php if (!empty($user->getWebsite())) {echo 'value = "'. $user->getWebsite() .'"';}?> 
					<span class="websiteError"><?php echo $user->getError("website")?></span>
				</p>
				<p>
					Select your favorite color: <input type="color" name="favcolor" tabindex="7"
					<?php if (!is_null($user) && !empty($user->getFavcolor())) {echo 'value = "'. $user->getFavcolor() .'"';}?>> 
					<span id="favColorError" class="error"><?php if (!is_null($user)) {echo $user->getError("favcolor");}?></span>
				</p>
				<p>
					Birthday month and year: <input type="month" name="bday" required tabindex="8"
					<?php if (!is_null($user) && !empty($user->getBday())) {echo 'value = "'. $user->getBday() .'"';}?>> 
					<span id="bdayError" class="error"><?php if (!is_null($user)) {echo $user->getError("bday");}?></span>
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
					<input type="radio" name="whyRatChat" value="1" tabindex="10" required
					<?php if ($user->getWhyRatChat() == "1") {echo '"checked"';}?>> I own rats.<br>
					<input type="radio" name="whyRatChat" value="2" tabindex="11"
					<?php if ($user->getWhyRatChat() == "2") {echo '"checked"';}?>> I am looking into getting a rat.<br>
					<input type="radio" name="whyRatChat" value="3" tabindex="12"
					<?php if ($user->getWhyRatChat() == "3") {echo '"checked"';}?>> Other<br>
				</p>
				<p>
					How many rats do you currently own? Please enter a number. <input type="number"
						name="ratsOwned" min="0" value="0" required tabindex="13"
						<?php if (!is_null($user) && !empty($user->getRatsOwned())) {echo 'value = "'. $user->getRatsOwned() .'"';}?>> 
						<span id="ratsOwnedError" class="error"><?php if (!is_null($user)) {echo $user->getError("ratsOwned");}?></span>
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
<!-- 			<p>
				Make sure that you have read our <a href="">User Agreement</a> <input
					type="checkbox" name="user-agree-check" required tabindex="14">
			</p> -->
			<p><input type = "submit" name = "submit" value="Submit" tabindex="15"></p>
		</form>
	</section>
	<?php 
	}
	?>
</body>
</html>