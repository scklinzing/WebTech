<?php
require_once('c:/Programs/simpletest/autorun.php');

class ViewTests extends TestSuite {
	function __construct() {
		parent::__construct();
   		$this->addFile ( __DIR__."/registerForm_test.php" );
	}
}
?>