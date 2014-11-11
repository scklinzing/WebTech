<?php
session_start ();
function changePassword($user) {
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Change Password</title>
</head>
<form action="../controllers/changePswdController.php" method="Post">
	<h1>Update Password</h1>
	<p>
		New Password: <input id="password" type="password" name="newPassword"
			required tabindex="3"
			<?php if (!is_null($user) && !empty($user->getNewPassword())) {echo 'value = "'. $user->getNewPassword() .'"';}?>>
		<span id="newPasswordError" class="error"><?php if (!is_null($user)) {echo $user->getError("newPassword");}?></span>
	</p>
	<p>
		Retype New Password: <input id="retypedPassword" type="password"
			name="newPasswordRetyped" required tabindex="4"> <span
			id="retypedError" class="error"></span>
	</p>

	<p>
		Current Password: <input type="password" name="password"
			<?php if (!is_null($user)) {echo 'value = "'. $user->getPassword() .'"';}?>>
		<span class="error"><?php if (!is_null($user)) {echo $user->getError("password");}?></span>
	</p>

	<p>
		<input type="submit" name="submit" value="Submit">
	</p>
<?php echo "<a href=\"../views/userProfile.php?username=".$_SESSION['userName']."\">Cancel</a>"; ?>
</form>

</body>
</html>
<?php 
}
?>