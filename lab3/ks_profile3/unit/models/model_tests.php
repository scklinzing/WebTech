<?php
require_once('c:/Programs/simpletest/autorun.php');

class ModelTests extends TestSuite {
	function __construct() {
		parent::__construct();
		$this->addFile ( __DIR__."/makeTestDB_test.php" );
		$this->addFile ( __DIR__."/Database_test.php" );
		$this->addFile ( __DIR__."/InterestListDB_test.php" );
		$this->addFile ( __DIR__."/UserData_test.php" );
		$this->addFile ( __DIR__."/UserDB_test.php" );
	}
}
?>