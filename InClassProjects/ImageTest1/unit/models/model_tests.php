<?php
require_once('c:/Programs/simpletest/autorun.php');

class ModelTests extends TestSuite {
	function __construct() {
		parent::__construct();
		$this->addFile ( __DIR__."/ImageData_test.php" );
	}
}
?>