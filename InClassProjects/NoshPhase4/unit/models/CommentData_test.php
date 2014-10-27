<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/MemberClassesDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/CommentTagsDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class CommentDataTest extends UnitTestCase {
	// Tester for CommentData class
	private $testData;
	private $memberClasses;
	private $tagValues;
	
	function __construct() {
		parent::__construct();
		makeTestDB('temp1');
		$this->memberClasses = MemberClassesDB::getMap('memberClassName', 'memberClassId');
		$this->tagValues = CommentTagsDB::getMap('commentTagName', 'commentTagId');	
	}
	
	function setUp() {
		$this->testData = array("evaluationUrl" => "http://yahoo1.com",
			                	"comment" => "Not here",
			                 	"memberClassName" => "nosher",
			                	"commentTagList" => array("layout", "semantics"));
	}
	
	function test_emptyCommentData() {
		// Tests that an empty CommentData object can be created
		$s1 = new CommentData();
		$this->assertNotNull($s1, "CommentData object $s1");
		$this->assertIsA($s1, 'CommentData', "Should be a CommentData object");
		$this->assertEqual($s1->getEvaluationUrl(), "",
				"evaluation url should be empty but is " .$s1->getEvaluationUrl());
		$this->assertEqual($s1->getComment(), "",
				"comment should be empty but is ".$s1->getComment());
		$this->assertEqual($s1->getMemberClassName(), "",
				"member class name should be empty but is ".$s1->getMemberClassName());
		$tags = $s1->getCommentTagList();
		$this->assertTrue(is_array($tags),
				"the tag list should be an array but is not");
	}
	
	function test_validInput() {
        // Tests that a CommentData object can be made when input is valid
		$s1 = new CommentData($this->testData);
  		$this->assertNotNull($s1, "CommentData object $s1");
  		$this->assertTrue(is_a($s1, 'CommentData'), "Should be a CommentData object");
		$this->assertEqual($s1->getEvaluationUrl(), $this->testData['evaluationUrl'],
		       "evaluation url should be ".$this->testData['evaluationUrl']." but is " .$s1->getEvaluationUrl());
		$this->assertEqual($s1->getComment(), $this->testData['comment'],
		       "comment should be ".$this->testData['comment']." but is ".$s1->getComment());
		$this->assertEqual($s1->getMemberClassName(), $this->testData['memberClassName'],
		       "member class name should be ". $this->testData['memberClassName'] ." but is ".$s1->getMemberClassName());
		$tags = $s1->getCommentTagList();
		$this->assertTrue(is_array($tags), 
				 "the tag list should be an array but is not");
	}
	
	function test_getParameters() {
		// Tests that CommentData returns a valid array when no errors
		$s1 = new CommentData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 0, 
				"It should have no errors for valid input, but has $errorCount errors");
		$params = $s1->getParameters();
		$this->assertEqual($params['evaluationUrl'], $this->testData['evaluationUrl'],
		         "Returned evaluationUrl should be ".$this->testData['evaluationUrl']." but is ".$params['evaluationUrl']);
		$this->assertEqual($params['comment'], $this->testData['comment'],
				"Returned comment should be ".$this->testData['comment']." but is ".$params['comment']);
		$this->assertEqual($params['memberClassName'], $this->testData['memberClassName'],
		        "Returned member class name should be ".$this->testData['memberClassName']." but is ".$params['memberClassName']);
	}
	
	function test_invalidUrl() {
		// Tests that CommentData has an error when the URL is invalid
		$this->testData['evaluationUrl'] = '$\xy^';
		$s1 = new CommentData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0, 
		    "Error count should be greater than 0 for invalid URL, but was $errorCount");
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['evaluationUrl']), 
		    "Error message should be set for evaluation URL but was not");
		$this->assertFalse(empty($s1->getError('evaluationUrl')));
	}
	
	function test_isTag() {
		// Tests that CommentData correctly indicates whether it has a tag
		$s1 = new CommentData($this->testData);
		$tagTruth = $s1->isTag("layout");
		$this->assertTrue($tagTruth, "It should think it has a layout tag, but it doesn't");
		$tagTruth = $s1->isTag("bash");
		$this->assertFalse($tagTruth, "It should not have a bash tag");
		$tagTruth = $s1->isTag("content");
		$this->assertFalse($tagTruth, "It should not have a content tag");
	}
	
	function test_missingUrl() {
		// Tests that CommentData has an error when the URL is missing
		unset($this->testData['evaluationUrl']); // make URL missing
		$s1 = new CommentData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0,
				"Error count should be greater than 0 for invalid URL, but was $errorCount");
	    $errors = $s1->getErrors();
	    $this->assertTrue(isset($errors['evaluationUrl']),
				"Error message should be set for evaluation URL but was not");
	}
	
	function test_badMemberName() {
		// Tests that CommentData has an error when the member class name is bad and member classes provided.
		$this->testData['memberClassName'] = "Blubber";
		$s1 = new CommentData($this->testData, $this->memberClasses);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0,
				"Error count should be greater than 0 for invalid member class name, but was $errorCount");
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['memberClassName']),
				"Error message should be set for invalid member class name, but was not");
	}
	
	function test_badMemberNameNoMap() {
		// Tests that CommentData doesn't have an error for bad name if no map is provided
		$s1 = new CommentData($this->testData);
	    $errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 0,
				"Error count should always be 0 when no class map, but was $errorCount");
		$errors = $s1->getErrors();
		$this->assertFalse(isset($errors['memberClassName']),
				"Error message for class member should be clear if no map is provided");
	}
	
	function test_badTags() {
		// Tests that CommentData has an error when the tag names are bad when the comment tag map is provided.
		$this->testData['commentTagList'] = array("Blubber", "layout", "Banana", "content");
		$s1 = new CommentData($this->testData, $this->memberClasses, $this->tagValues);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 1,
				"Error count should be 1 for multiple invalid tags, but was $errorCount");
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['commentTagList']),
				"Error message should be set for invalid member class name, but was not");
	}
}

?>