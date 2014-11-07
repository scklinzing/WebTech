<?php
require_once('c:/Programs/simpletest/autorun.php');

class ViewTests extends TestSuite {
	function __construct() {
		parent::__construct();
   		$this->addFile ( __DIR__."/showComments_test.php" );
   		$this->addFile ( __DIR__."/showComment_test.php" );
   		$this->addFile ( __DIR__."/showUser_test.php" );
   		$this->addFile ( __DIR__."/loginForm_test.php" );
   		$this->addFile ( __DIR__."/registerForm_test.php" );
	}
}
?>