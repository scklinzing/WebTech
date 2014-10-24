<?php
require_once('c:/Programs/simpletest/autorun.php');

class AllTests extends TestSuite {
	function __construct() {
		parent::__construct();
		$thisDir = __DIR__;
		$this->addFile ( __DIR__."/controllers/controller_tests.php" );
		$this->addFile ( __DIR__."/models/model_tests.php" );
		$this->addFile ( __DIR__."/views/view_tests.php" );
	}

}
?>