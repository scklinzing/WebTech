<?php  
function loginForm($user) {
?>

<form action ="../controllers/loginController.php" method="Post">
<p>User name: <input type="text" name ="username" 
<?php if (!is_null($user)) {echo 'value = "'. $user->getUsername() .'"';}?>> 
<span class="error"><?php if (!is_null($user)) {echo $user->getError("username");}?></span></p>

<p>Password: <input type="password" name ="password" 
<?php if (!is_null($user)) {echo 'value = "'. $user->getPassword() .'"';}?>> 
<span class="error"><?php if (!is_null($user)) {echo $user->getError("password");}?></span></p>

<p><input type = "submit" name = "submit" value="Submit"></p>
</form>

<p>New user?  <a href="../controllers/registerController.php">Sign up here</a></p>

<p>Forget your password?  Well good luck with that.... </p>

<?php 
}
?>