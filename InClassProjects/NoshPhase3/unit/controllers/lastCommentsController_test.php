<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/MemberClassesDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentTagsDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/views/showComments.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class LastCommentsControllerTest extends UnitTestCase {
	// Tester class for the lastCommentsController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runLastCommentsController() {
		// Tests that commentsController code can be executed
		$myComments = 0;
		require(dirname(__FILE__)."/../../WebContent/controllers/lastCommentsController.php");
		$this->assertTrue(is_array($myComments), 
				"[It should create an array of CommentData but does not]");
		$commentCount = count($myComments);
		$this->assertTrue($commentCount <= 3, 
				"[It should retrieve 3 or fewer comments, but it retrieved $commentCount comments");
	}
}
?>