<?php
require_once('c:/Programs/simpletest/autorun.php');

class ViewTests extends TestSuite {
	function __construct() {
		parent::__construct();
   		$this->addFile ( __DIR__."/ShowComments_test.php" );
   		$this->addFile ( __DIR__."/ShowComment_test.php" );
   		$this->addFile ( __DIR__."/ShowUser_test.php" );
   		$this->addFile ( __DIR__."/LoginForm_test.php" );
   		$this->addFile ( __DIR__."/RegisterForm_test.php" );
	}
}
?>