<?php  
function registerForm($user) {
?>

<form action ="../controllers/registerController.php" method="Post">
<p>User name: <input type="text" name ="userName" 
<?php if (!empty($user->getUserName())) {echo 'value = "'. $user->getUserName() .'"';}?>> 
<span class="error"><?php echo $user->getError("userName")?></span></p>

<p>Password: <input type="password" name ="userPassword" 
<?php if (!empty($user->getUserPassword())) {echo 'value = "'. $user->getUserPassword() .'"';}?>> 
<span class="error"><?php echo $user->getError("userPassword")?></span></p>

<p>Retype password: <input type="password" name ="userPasswordRetyped"></p>

<p><input type = "submit" name = "submit" value="Submit"></p>
</form>
<?php 
}
?>