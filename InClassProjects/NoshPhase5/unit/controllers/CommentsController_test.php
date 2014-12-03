<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class CommentsControllerTest extends UnitTestCase {
	// Tester class for the CommentsController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runCommentsController() {
		// Tests that CommentsController code can be executed
		$myComments = 0;
		CommentsController::run();
		$this->assertEqual($myComments, 0, "[It should not throw an exception]");
	}
}
?>