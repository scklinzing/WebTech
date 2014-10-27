<?php  
function loginForm($user) {
?>

<form action ="../controllers/loginController.php" method="Post">
<p>User name: <input type="text" name ="userName" 
<?php if (!empty($user->getUserName())) {echo 'value = "'. $user->getUserName() .'"';}?>> 
<span class="error"><?php echo $user->getError("userName")?></span></p>

<p>Password: <input type="password" name ="userPassword" 
<?php if (!empty($user->getUserPassword())) {echo 'value = "'. $user->getUserPassword() .'"';}?>> 
<span class="error"><?php echo $user->getError("userPassword")?></span></p>

<p><input type = "submit" name = "submit" value="Submit"></p>
</form>

<p>New user?  <a href="../controllers/registerController.php">Sign up here</a></p>

<p>Forget your password?  Well good luck with that.... </p>

<?php 
}
?>