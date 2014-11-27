<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<?php 
	if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
			echo "<title>Edit Profile</title>";
	} else {
		echo "<title>Sign Up</title>";
	}
	?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <SCRIPT type="text/javascript">
		pic1 = new Image(16, 16); 
		pic1.src = "../image/loader.gif";
		$(document).ready(function(){
		$("#username").change(function() { 
		var usr = $("#username").val();
		if(usr.length >= 4) {
		$("#status").html('<img src="../image/loader.gif" align="absmiddle">&nbsp;Checking availability...');
		    $.ajax({  
		    type: "POST",  
		    url: "../controllers/jsonUsernameController.php",  
		    data: "username="+ usr,  
		    success: function(msg){
		   $("#status").ajaxComplete(function(event, request, settings){
			if(msg == 'OK') { 
		        $("#username").removeClass('object_error'); // if necessary
				$("#username").addClass("object_ok");
				$("#status").html('&nbsp;<img src="../image/tick.gif" align="absmiddle">');
			} else {  
				$("#username").removeClass('object_ok'); // if necessary
				$("#username").addClass("object_error");
				$("#status").html(msg);
			}  
		   });
		 } 
		  }); 
		} else {
			$("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
			$("#username").removeClass('object_ok'); // if necessary
			$("#username").addClass("object_error");
		}
		});
		});
	</SCRIPT>
</head>

<body>
	<?php
	include_once(dirname(__FILE__)."/../header.php");
	
	if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
		$user = UserDB::getUserByName($_SESSION['userName']);
	}
	function registerForm($user) {
	?>
	<!-- Input Member Data -->
	<div class="container">
		<?php 
			if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
				echo "<h2>Edit Profile</h2>";
				echo "<form class=\"form-vertical\" role=\"form\" enctype=\"multipart/form-data\" action =\"../controllers/editProfileController.php\" method=\"Post\">";
			} else {
				echo "<h2>Sign up to Rat Chat to start posting!</h2>";
				echo "<form class=\"form-vertical\" role=\"form\" enctype=\"multipart/form-data\" action =\"../controllers/registerController.php\" method=\"Post\">";
			}
		?>
		<div class="panel panel-default">
		<div class="panel-heading"><label>Member Information</label></div>
		<div class="panel-body">
		
			<div class="row">
				<div class="col-lg-4">
					<label for="username">RatChat Username:</label>
					<input class="form-control" type="text" width="20" name="username" id="username" placeholder="Your nickname" 
							autofocus required tabindex="1"
							<?php if (!is_null($user) && !empty($user->getUsername())) {echo 'value = "'. $user->getUsername() .'"';}?>>
					<span id="userNameError" class="error"><?php if (!is_null($user)) {echo $user->getError("username");}?></span>
				</div>
				<div id="status"></div>
			</div>
			
			<div class="row">
				<div class="col-lg-4">
					<label for="email">Email:</label>
					<input class="form-control" type="email" name="email" id="email" placeholder="joe@email.com" required tabindex="2"
							<?php if (!is_null($user) && !empty($user->getEmail())) {echo 'value = "'. $user->getEmail() .'"';}?>>
					<span class="error"><?php if (!is_null($user)) {echo $user->getError("email");}?></span>
				</div>
			</div>

			
			<?php 
				if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
					echo "<a href=\"../controllers/changePswdController.php\" class=\"btn btn-default\" role=\"button\">Change Password</a>";
				} else {
					echo "<div class=\"row\"><div class=\"col-lg-4\">";
						echo "<label for=\"password\">Password:</label>";
						echo "<input class=\"form-control\" id=\"password\" type=\"password\" name =\"password\" tabindex=\"3\"";
						if (!is_null($user) && !empty($user->getPassword())) {echo 'value = "'. $user->getPassword() .'"';}
						echo "><span id=\"passwordError\" class=\"error\">";
						if (!is_null($user)) {echo $user->getError("password");}
						echo "</span></p>";
					echo "</div></div>";
					
					echo "<div class=\"row\"><div class=\"col-lg-4\">";
						echo "<label for=\"retypedPassword\">Retype password:</label>";
						echo "<input class=\"form-control\" id=\"retypedPassword\" type=\"password\"
								name=\"userPasswordRetyped\" required tabindex=\"4\"><span id=\"retypedError\" class=\"error\"></span>";
					echo "</div></div>";
				}
			?>
			
			<div class="row">
				<div class="col-lg-4">
					<label for="phone">Telephone:</label>
					<input class="form-control" type="tel" name="phoneNum" id="phone" placeholder="000-000-0000" required tabindex="5"
							<?php if (!is_null($user) && !empty($user->getPhoneNum())) {echo 'value = "'. $user->getPhoneNum() .'"';}?>>
					<span id="phoneNumError" class="error"><?php if (!is_null($user)) {echo $user->getError("phoneNum");}?></span>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-4">
					<label for="web">Favorite website:</label>
					<input class="form-control" type="url" name="website" id="web" placeholder="http://www.url.com"
					<?php if (!empty($user->getWebsite())) {echo 'value = "'. $user->getWebsite() .'"';}?> required tabindex="6">
          			<span id="websiteError" class="error"><?php echo $user->getError("website")?></span>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-4">
					<label for="color">Select your favorite color:</label>
					<input class="form-control" type="color" name="favcolor" id="color" tabindex="7"
						<?php if (!is_null($user) && !empty($user->getFavcolor())) {echo 'value = "'. $user->getFavcolor() .'"';}?>> 
						<span id="favColorError" class="error"><?php if (!is_null($user)) {echo $user->getError("favcolor");}?></span>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-4">
					<label for="birthday">Birthday month and year:</label>
					<input class="form-control" type="month" name="bday" id="birthday" placeholder="yyyy-mm" required tabindex="8"
						<?php if (!is_null($user) && !empty($user->getBday())) {echo 'value = "'. $user->getBday() .'"';}?>> 
						<span id="bdayError" class="error"><?php if (!is_null($user)) {echo $user->getError("bday");}?></span>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-4">
					<input type="hidden" name="MAX_FILE_SIZE" value="999999999" />
					<label for="userImage">Select a profile picture:</label>
					<input class="btn btn-default" type="file" name="userImage" id="userImage" accept="image/*" required tabindex="9"> 
					<span id="userImageError" class="error"></span>
				</div>
			</div>

			<!-- <p>Select a profile picture: <input class="btn btn-default" type="file" name="profile-pic" accept="image/*" tabindex="9"></p> -->
					
					
		</div></div>
		
		<!-- RAT INFORMATION --><br>
		
		<div class="panel panel-default">
		<div class="panel-heading"><label>Rat Information</label></div>
		<div class="panel-body">
		<p><b>What brings you to Rat Chat?</b></p>
			<div class="container">
				<div class="radio">
					<label>
						<input type="radio" name="whyRatChat" value="1" tabindex="10" required
						<?php if ($user->getWhyRatChat() == "1") {echo "checked";}?>> I own rats.
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="whyRatChat" value="2" tabindex="11"
						<?php if ($user->getWhyRatChat() == "2") {echo "checked";}?>> I am looking into getting a rat.<br>
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="whyRatChat" value="3" tabindex="12"
						<?php if ($user->getWhyRatChat() == "3") {echo "checked";}?>> Other
					</label>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-4">
					<label for="numRats">How many rats do you currently own? Please enter a number:</label>
					<input class="form-control" type="number" name="ratsOwned" min="0" id="numRats" placeholder="0" required tabindex="13"
							<?php if (!is_null($user) && !empty($user->getRatsOwned())) {echo 'value = "'. $user->getRatsOwned() .'"';}?>> 
							<span id="ratsOwnedError" class="error"><?php if (!is_null($user)) {echo $user->getError("ratsOwned");}?></span>
				</div>
			</div>
			
			<p><b>What type of information are you interested in?</b></p>
				<?php $list = $user->getInterestList(); ?>
				<!-- varieties, housing, food, toys, care -->
				<div class="container">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="interestList[]" value ="varieties"
							<?php if (in_array("varieties", $list)) {echo "checked";}?>>Rat Varieties
						</label> 
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="interestList[]" value ="housing"
							<?php if (in_array("housing", $list)) {echo "checked";}?>>Housing 
						</label> 
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="interestList[]" value ="food"
							<?php if (in_array("food", $list)) {echo "checked";}?>>Food 
						</label> 
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="interestList[]" value ="toys"
							<?php if (in_array("toys", $list)) {echo "checked";}?>>Toys
						</label> 
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="interestList[]" value ="care"
							<?php if (in_array("care", $list)) {echo "checked";}?>>Rat Care/Health 
						</label> 
					</div>
				</div>
		</div></div>
			
		<?php 
			if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
				echo "<p>Please enter password to update profile:
						 <input id=\"password\" type=\"password\" name =\"updatePass \" required tabindex=\"15\"";
				if (!is_null($user) && !empty($user->getPassword())) {echo 'value = "'. $user->getPassword() .'"';}
				echo "<p><button class=\"btn btn-default\" type=\"submit\" name=\"submit\" 
						value=\"Update Profile\" tabindex=\"16\">Update Profile</button></p>";
			} else {
				echo "<p><button class=\"btn btn-default\" type=\"submit\" name=\"submit\" value=\"Submit\">Submit</button></p>";
			}
		echo "</form>";
		?>
		<p></p>
	</div>
	<?php 
	}
	?>
</body>
</html>