<?php  
session_start ();
function changePassword($user) {
?>

<form action ="../controllers/changePswdController.php" method="Post">
<p>New Password: <input id="password" type="password" name ="newPassword" required tabindex="3"
<?php if (!is_null($user) && !empty($user->getPassword())) {echo 'value = "'. $user->getPassword() .'"';}?>>
<span id="newPasswordError" class="error"><?php if (!is_null($user)) {echo $user->getError("newPassword");}?></span>
</p>
<p>
Retype New Password: <input id="retypedPassword" type="password" name="newPasswordRetyped" required tabindex="4">
<span id="retypedError" class="error"></span>
</p>

<p>Current Password: <input type="password" name ="oldPassword" 
<?php if (!is_null($user)) {echo 'value = "'. $user->getPassword() .'"';}?>> 
<span class="error"><?php if (!is_null($user)) {echo $user->getError("oldPassword");}?></span></p>

<p><input type = "submit" name = "submit" value="Submit"></p>
</form>

<button onclick="myFunction()">Cancel</button>

<script>
function myFunction() {
	header("location: ../views/userProfile.php?username=".$_SESSION['userName']);
}
</script>
<?php 
}
?>