<?php  
class RegisterController {
	
  public static function run() {  	
	if ($_SERVER["REQUEST_METHOD"] != "POST") {
		$user = new userData();
		RegisterForm::show($user);
	} else {
	   $user = new UserData($_POST);
	   if (!is_null(userDB::getUserByName($user->getUserName())))
	   	  $user->setError('userName', 'User already exists, choose another name');
	   $id = 0;
	   if ($user->getErrorCount() == 0)   
	        $id = userDB::addUser($user);
	   if ($id != 0) { // if successfully added, show the user
	        ShowUser::show(userDB::getUserById($id)); // need to fix what comes back
	    } else {
	    	RegisterForm::show($user);	
	    }
	} 
  }
}
?>