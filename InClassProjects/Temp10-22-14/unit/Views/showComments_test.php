<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/MemberClassesDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentTagsDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/views/showComments.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class ShowCommentsTest extends UnitTestCase {
	// Tester class for the showComments view
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_showComments() {
		// Tests that showComments can be be invoked without error
		$validTest1 = array("evaluationUrl" => "http://npr.org",
				"comment" => "This is my comment",
				"memberClassName" => "reader",
				"commentTagList" => array("colors", "layout"));
		$s1 = new CommentData($validTest1);
		$validTest2 = array("evaluationUrl" => "http://google.com",
				"comment" => "Searching now",
				"memberClassName" => "nosher",
				"commentTagList" => array("semantics", "layout"));
		$s2 = new CommentData($validTest2);
		$commentList = array($s1, $s2);
		showComments($commentList, "Simple test message");
		$comments = 0;
		$this->assertEqual($comments, 0, "Show comments executes]");
	}
}
?>