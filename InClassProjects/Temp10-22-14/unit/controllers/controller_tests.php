<?php
require_once('c:/Programs/simpletest/autorun.php');

class ControllerTests extends TestSuite {
	function __construct() {
		parent::__construct();
		$this->addFile ( __DIR__."/commentsController_test.php" );
		$this->addFile ( __DIR__."/lastCommentsController_test.php" );
		$this->addFile ( __DIR__."/postCommentController_test.php" );
	}
}
?>