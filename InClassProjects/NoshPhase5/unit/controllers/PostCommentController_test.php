<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class PostCommentControllerTest extends UnitTestCase {
	// Tester class for the PostCommentsController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runPostCommentsController() {
		// Tests that PostCommentController code can be executed
		$_SERVER["REQUEST_METHOD"] = "POST";
		$_POST = array("evaluationUrl" => "http://yahoo1.com",
			            "comment" => "Not here",
			            "memberClassName" => "nosher",
			            "commentTagList" => array("layout", "semantics"));
		$comment = 0;
		PostCommentController::run();
		$this->assertEqual($comment, 0, "[It should not throw an exception]");
	}
}
?>