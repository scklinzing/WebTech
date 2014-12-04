<?php
require_once('c:/Programs/simpletest/autorun.php');

class ControllerTests extends TestSuite {
	function __construct() {
		parent::__construct();
		//$this->addFile ( __DIR__."/lastUsersController_test.php" );
		//$this->addFile ( __DIR__."/loginController_test.php" );
		//$this->addFile ( __DIR__."/registerController_test.php" );
		//$this->addFile ( __DIR__."/usersController_test.php" );
		$this->addFile ( __DIR__."/jsonUsernameController_test.php" );
	}
}
?>