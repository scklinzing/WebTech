<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/MemberClassesDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class MemberClassesDBTest extends UnitTestCase {
	// Tester class for models/MemberClassesDB
	function __construct() {
		parent::__construct();
		makeTestDB('temp1');
	}
	
	function test_getArrayByName() {
		// Tests getArray with the memberClassName as the key
		$rowset = array(array("memberClassId" => 1, "memberClassName" => "reader"),
				array("memberClassId" => 2, "memberClassName" => "nosher"));
		$myArray = MemberClassesDB::getArray($rowset, "memberClassName", "memberClassId");
		$this->assertEqual($myArray['reader'], 1,  
		       "Should return 1 for key of reader but returned ".$myArray['reader']);
		$this->assertEqual($myArray['nosher'], 2,
				"Should return 2 for key of nosher but returned ".$myArray['nosher']);
	}
	
	function test_getArrayById() {
		// Tests getArray with the memberClassId as the key
		$rowset = array(array("memberClassId" => 1, "memberClassName" => "reader"),
				array("memberClassId" => 2, "memberClassName" => "nosher"));
		$myArray = MemberClassesDB::getArray($rowset, "memberClassId", "memberClassName");
		$this->assertEqual($myArray['1'], "reader",
				"Should return reader for key of 1 but returned ".$myArray['1']);
		$this->assertEqual($myArray['2'], 'nosher',
				"Should return nosher for key of 2 but returned ".$myArray['2']);
	}

	function test_getMapById() {
		// Tests the getMap method for mapping memberClassId -> memberClassName
		$myArray= MemberClassesDB::getMap('memberClassId', 'memberClassName');
		$this->assertEqual($myArray['1'], "reader",
				"Should return reader for key of 1 but returned ".$myArray['1']);
		$this->assertEqual($myArray['2'], 'nosher',
				"Should return nosher for key of 2 but returned ".$myArray['2']);
	}

	function test_getNameById() {
		// Tests getNameById for a valid memberClassId
		$myName = MemberClassesDB::getNameById(1);
		$this->assertEqual($myName, "reader",
				"Should return reader for key of 1 but returned ".$myName);
	}
	
	function test_getIdByName() {
		// Tests getIdByName for a valid name
		$myName = "moderator";
        $myId = MemberClassesDB::getIdByName($myName);
		$this->assertEqual($myId, "3",
				"Should return 3 for name moderator but returned ".$myId);
	}
}
?>
