<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class CommentDBTest extends UnitTestCase {
	// Tester class for models/CommentsDB
	private $rowset;
	function __construct() {
		parent::__construct();

		$this->rowset = array("evaluationUrl" => "http://yahoo1.com",
			            "comment" => "Not here",
			            "memberClassName" => "nosher",
			            "taglist" => "layout;semantics");
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_getComment() {
		// Tests getComment which converts a row set to a valid CommentData object
		$testResults1 = CommentDB::getComment($this->rowset);
		$this->validate($testResults1, $this->rowset);
	}

	function test_getCommentArray() {
		// Tests getCommentArray which converts a row sets to array of valid CommentData objects
		$testRows = array($this->rowset, $this->rowset);
		$testResults = CommentDB::getCommentArray($testRows);
		$this->assertTrue(is_array($testResults), '[It should return array but did not]');
		$countResults = count($testResults);
		$countRows = count($testRows);
		$this->assertEqual($countResults, $countRows, 
				"[It should return an array with $countRows elements but returned " .
				 "and array with $countResults elements]");
        for ($k = 0; $k < count($testResults); $k++) {
        	$this->validate($testResults[$k], $this->rowset);
        }
	}

	function test_getAll() {
		// Tests getAll which fetches all of the rows from the database.
		$myComments = CommentDB::getAll();
		$commentCount = count($myComments);
		$this->assertEqual($commentCount, 6, "[It should return 6 comments, but returned
				$commentCount items]");
		for ($k = 0; $k < count($myComments); $k++) {
			$this->assertTrue(is_a($myComments[$k], 'CommentData'), "[Item $k
			                  should be a CommentData object but is not]");
		}
	}

	function test_getCommentById() {
		// Tests getCommentById which fetches individual comments by Id.
		for ($k = 1; $k <= 6; $k++) {
			$myComment = CommentDB::getCommentById($k);
			$this->assertTrue(is_a($myComment, 'CommentData'), "[Item $k
			                  should be a CommentData object but is not]");
			$myId = $myComment->getCommentId();
			$this->assertEqual($myId, $k, "[The commentID is $myId but should be $k]");
		}
	}
	
	function test_addComment() {
		// Tests addComment which inserts a new comment in the database.
		$testComment = CommentDB::getComment($this->rowset);
		$predictedCount = count(CommentDB::getAll()) + 1;
		$returnValue = commentDB::addComment($testComment);
		$afterCount = count(CommentDB::getAll());
		$this->assertEqual($afterCount, $predictedCount, 
				"[Database should have $predictedCount items after adding comment but
				has $afterCount items]");
		$insertedComment = commentDB::getCommentById($returnValue);
		$this->validate($insertedComment, $this->rowset);
	}

    function validate($s1, $testrow) {
		// Validates CommentData $s1 against the rowset with ; separated tags.
		$this->assertNotNull ( $s1, "CommentData object $s1" );
		$this->assertTrue ( is_a ( $s1, 'CommentData' ), "Should be a CommentData object" );
 		$myUrl = $s1->getEvaluationUrl();
 		$testUrl = $testrow['evaluationUrl'];
 		$this->assertEqual($myUrl, $testUrl, "evaluation url should be $testUrl but is $myUrl]");
	}
}
?>
