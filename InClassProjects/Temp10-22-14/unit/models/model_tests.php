<?php
require_once('c:/Programs/simpletest/autorun.php');

class ModelTests extends TestSuite {
	function __construct() {
		parent::__construct();
		$this->addFile ( __DIR__."/CommentData_test.php" );
		$this->addFile ( __DIR__."/MemberClassesDB_test.php" );
		$this->addFile ( __DIR__."/CommentTagsDB_test.php" );
		$this->addFile ( __DIR__."/Database_test.php" );
		$this->addFile ( __DIR__."/CommentDB_test.php" );

	}
}
?>