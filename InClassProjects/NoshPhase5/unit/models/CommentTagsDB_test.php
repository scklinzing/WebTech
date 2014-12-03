<?php
require_once ('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once (dirname ( __FILE__ ) . "/makeTestDB.php");
class CommentTagsDBTest extends UnitTestCase {
	// Tester class for models/CommentTagsDb
	function __construct() {
		parent::__construct ();
		makeTestDB ( 'temp1' );
	}
	
	function test_getArrayByName() {
		// Tests getArray with the commentTagName as the key
		$rowset = array (
				array (
						"commentTagId" => 1,
						"commentTagName" => "layout" 
				),
				array (
						"commentTagId" => 2,
						"commentTagName" => "colors" 
				) 
		);
		$myArray = CommentTagsDB::getArray ( $rowset, "commentTagName", "commentTagId" );
		$this->assertEqual ( $myArray ['layout'], 1, "Should return 1 for key of layout but returned " . $myArray ['layout'] );
		$this->assertEqual ( $myArray ['colors'], 2, "Should return 2 for key of colors but returned " . $myArray ['colors'] );
	}
	
	function test_getArrayById() {
		// Tests getArray with the commentTagId as the key
		$rowset = array (
				array (
						"commentTagId" => 1,
						"commentTagName" => "layout" 
				),
				array (
						"commentTagId" => 2,
						"commentTagName" => "colors" 
				) 
		);
		$myArray = commentTagsDB::getArray ( $rowset, "commentTagId", "commentTagName" );
		$this->assertEqual ( $myArray ['1'], "layout", "Should return layout for key of 1 but returned " . $myArray ['1'] );
		$this->assertEqual ( $myArray ['2'], 'colors', "Should return colors for key of 2 but returned " . $myArray ['2'] );
	}
	
	function test_getMapById() {
		// Tests the getMap method for mapping commentTagId -> commentTagName
		$myArray = CommentTagsDB::getMap ( 'commentTagId', 'commentTagName' );
		$this->assertEqual ( $myArray ['1'], "layout", "Should return layout for key of 1 but returned " . $myArray ['1'] );
		$this->assertEqual ( $myArray ['2'], 'colors', "Should return colors for key of 2 but returned " . $myArray ['2'] );
	}
	
	function test_getNameById() {
		// Tests getNameById for a valid commentTagId
		$myName = CommentTagsDB::getNameById ( 1 );
		$this->assertEqual ( $myName, "layout", "Should return layout for key of 1 but returned " . $myName );
	}
	
	function test_getIdByName() {
		// Tests getIdByName for a valid commentTag
		$myName = "colors";
		$myId = CommentTagsDB::getIdByName ( $myName );
		$this->assertEqual ( $myId, "2", "Should return 2 for name colors but returned " . $myId );
	}
}
?>
