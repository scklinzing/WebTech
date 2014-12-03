<?php
require_once('c:/Programs/simpletest/autorun.php');

class ControllerTests extends TestSuite {
	function __construct() {
		parent::__construct();
		$this->addFile ( __DIR__."/CommentsController_test.php" );
		$this->addFile ( __DIR__."/LastCommentsController_test.php" );
		$this->addFile ( __DIR__."/PostCommentController_test.php" );
		$this->addFile ( __DIR__."/LoginController_test.php" );
		$this->addFile ( __DIR__."/RegisterController_test.php" );
	}
}
?>