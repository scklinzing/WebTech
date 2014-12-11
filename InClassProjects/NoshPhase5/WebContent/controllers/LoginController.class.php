<?php  
class LoginController {
	
  public static function run() {  	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   $user = new UserData($_POST);  // What if already logged in?
	   if ($user->getErrorCount() == 0) {  
	        $actualUser = userDB::getUserByName($user->getUserName());
	        if (is_null($actualUser)) {
	        	$user->setError('userName', 'Invalid user name');
	        	LoginForm::show($user);
	        } elseif (!userDB::authenticateUser($user)) {
	        	$user->setError('userPassword', 'Invalid password!');
	        	LoginForm::show($user);
	        } else	{// Add sessions here
	        	$_SESSION ['userName'] = $user->getUserName();
	        	$_SESSION ['userLoginStatus'] = 1;
	            ShowUser::show($user);
	        }
	    } else {
	    	LoginForm::show($user);	
	    }
	} else { // Initial link
		$user = new userData();
		LoginForm::show($user);
	}
  }
}
?>