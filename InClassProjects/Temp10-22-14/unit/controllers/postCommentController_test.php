<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/MemberClassesDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentTagsDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/views/showComments.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class PostCommentControllerTest extends UnitTestCase {
	// Tester class for the lastCommentsController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runLastCommentsController() {
		// Tests that postCommentController code can be executed
		$_POST = array("evaluationUrl" => "http://yahoo1.com",
			            "comment" => "Not here",
			            "memberClassName" => "nosher",
			            "commentTagList" => array("layout", "semantics"));
		$comment = 0;
		require(dirname(__FILE__)."/../../WebContent/controllers/postCommentController.php");
		$this->assertTrue(is_a($comment, 'CommentData'), 
				"[It should create a CommentData object but does not]");
	}
}
?>