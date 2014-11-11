<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
</head>

<body>
	<?php
	session_start();
	include_once(dirname(__FILE__)."/../header.php");
	
	if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
		$user = UserDB::getUserByName($_SESSION['userName']);
	}
	function registerForm($user) {
	?>
	<!-- Input Member Data -->
	<section>
		<?php 
			if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
				echo "<h2>Edit Profile</h2>";
				echo "<form action =\"../controllers/editProfileController.php\" method=\"Post\">";
			} else {
				echo "<h2>Sign up to Rat Chat to start posting!</h2>";
				echo "<form action =\"../controllers/registerController.php\" method=\"Post\">";
			}
		?>
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
						placeholder="joe@email.com" required tabindex="2"
						<?php if (!is_null($user) && !empty($user->getEmail())) {echo 'value = "'. $user->getEmail() .'"';}?>> 
						<span class="error"><?php if (!is_null($user)) {echo $user->getError("email");}?></span>
				</p>
				<?php 
					if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
						echo "<a href=\"../controllers/changePswdController.php\">Change Password</a>";
					} else {
						echo "<p>Password: <input id=\"password\" type=\"password\" name =\"password\" tabindex=\"3\"";
						if (!is_null($user) && !empty($user->getPassword())) {echo 'value = "'. $user->getPassword() .'"';}
						echo "><span id=\"passwordError\" class=\"error\">";
						if (!is_null($user)) {echo $user->getError("password");}
						echo "</span></p>";
						echo "Retype password: <input id=\"retypedPassword\" type=\"password\"
								name=\"userPasswordRetyped\" required tabindex=\"4\"><span id=\"retypedError\" class=\"error\"></span>";
					}
				?>
				<p>
					Telephone: <input type="tel" name="phoneNum" placeholder="000-000-0000" required tabindex="5"
					<?php if (!is_null($user) && !empty($user->getPhoneNum())) {echo 'value = "'. $user->getPhoneNum() .'"';}?>> 
					<span id="phoneNumError" class="error"><?php if (!is_null($user)) {echo $user->getError("phoneNum");}?></span>
				</p>
				<p>
					Favorite website:<br> <input type="url" name="website" 
						<?php if (!empty($user->getWebsite())) {echo 'value = "'. $user->getWebsite() .'"';}?>
						list="favorites" required tabindex="6">
						<span class="websiteError"><?php echo $user->getError("website")?></span> 
					<datalist id="favorites">
						<option value="npr">National Public Radio</option>
						<option value="google">Google search</option>
						<option value="nyt">New York Times</option>
					</datalist>
				</p>
				<p>
					Select your favorite color: <input type="color" name="favcolor" tabindex="7"
					<?php if (!is_null($user) && !empty($user->getFavcolor())) {echo 'value = "'. $user->getFavcolor() .'"';}?>> 
					<span id="favColorError" class="error"><?php if (!is_null($user)) {echo $user->getError("favcolor");}?></span>
				</p>
				<p>
					Birthday month and year: <input type="month" name="bday" placeholder="yyyy-mm" required tabindex="8"
					<?php if (!is_null($user) && !empty($user->getBday())) {echo 'value = "'. $user->getBday() .'"';}?>> 
					<span id="bdayError" class="error"><?php if (!is_null($user)) {echo $user->getError("bday");}?></span>
				</p>
				<p>
					Select a profile picture: <input type="file" name="profile-pic"
						accept="image/*" tabindex="9">
				</p>
			</fieldset>
			<br>
			<fieldset>
				<legend>Rat Information</legend>
				<p>
					What brings you to Rat Chat?<br>
					<input type="radio" name="whyRatChat" value="1" tabindex="10" required
					<?php if ($user->getWhyRatChat() == "1") {echo "checked";}?>> I own rats.<br>
					<input type="radio" name="whyRatChat" value="2" tabindex="11"
					<?php if ($user->getWhyRatChat() == "2") {echo "checked";}?>> I am looking into getting a rat.<br>
					<input type="radio" name="whyRatChat" value="3" tabindex="12"
					<?php if ($user->getWhyRatChat() == "3") {echo "checked";}?>> Other<br>
				</p>
				<p>
					How many rats do you currently own? Please enter a number. <input type="number"
						name="ratsOwned" min="0" placeholder="0" required tabindex="13"
						<?php if (!is_null($user) && !empty($user->getRatsOwned())) {echo 'value = "'. $user->getRatsOwned() .'"';}?>> 
						<span id="ratsOwnedError" class="error"><?php if (!is_null($user)) {echo $user->getError("ratsOwned");}?></span>
				</p>
				<p>
					What type of information are you interested in?<br>
					<?php $list = $user->getInterestList(); ?>
					<!-- varieties, housing, food, toys, care -->
					<input type="checkbox" name="interestList[]" value ="varieties"
					<?php if (in_array("varieties", $list)) {echo "checked";}?>>Rat Varieties  
					<input type="checkbox" name="interestList[]" value ="housing"
					<?php if (in_array("housing", $list)) {echo "checked";}?>>Housing 
					<input type="checkbox" name="interestList[]" value ="food"
					<?php if (in_array("food", $list)) {echo "checked";}?>>Food 
					<input type="checkbox" name="interestList[]" value ="toys"
					<?php if (in_array("toys", $list)) {echo "checked";}?>>Toys
					<input type="checkbox" name="interestList[]" value ="care"
					<?php if (in_array("care", $list)) {echo "checked";}?>>Rat Care/Health 
				</p>
			</fieldset>
			
			<?php 
				if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
					echo "<p>Please enter password to update profile:
							 <input id=\"password\" type=\"password\" name =\"updatePass \" required tabindex=\"15\"";
					if (!is_null($user) && !empty($user->getPassword())) {echo 'value = "'. $user->getPassword() .'"';}
					echo "<p><input type = \"submit\" name = \"submit\" value=\"Update Profile\" tabindex=\"16\"></p>";
				} else {
					echo "<input type = \"submit\" name = \"submit\" value=\"Submit\" tabindex=\"15\">";
				}
			?>
			<p></p>
		</form>
	</section>
	<?php 
	}
	?>
</body>
</html>