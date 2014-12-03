<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class ShowCommentTest extends UnitTestCase {
	// Tester class for the showComment view
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_showComment() {
		// Tests that showComment can be be invoked without error
		$validTest1 = array("evaluationUrl" => "http://npr.org",
		                    "comment" => "This is my comment",
		                    "memberClassName" => "reader",
		                    "commentTagList" => array("colors", "layout"));
		$s1 = new CommentData($validTest1);
		$this->assertIsA($s1, 'CommentData', "It should create a valid CommentData object but doesn't");
		ShowComment::show($s1);
		$comments = 0;
		$this->assertEqual($comments, 0, "[Show comment executes]");
	}
}
?>