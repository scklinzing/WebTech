<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/InterestListDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class InterestListDBTest extends UnitTestCase {
	// Tester class for models/InterestListDB
	function __construct() {
		parent::__construct();
		makeTestDB('temp1');
	}
	
	function test_getArrayByName() {
		// Tests getArray with the interestListName as the key
		$rowset = array(array("interestListID" => 1, "interestListName" => "varieties"),
						array("interestListID" => 2, "interestListName" => "housing"),
						array("interestListID" => 3, "interestListName" => "food"),
						array("interestListID" => 4, "interestListName" => "toys"),
						array("interestListID" => 5, "interestListName" => "care")
						);
		$myArray = InterestListDB::getArray($rowset, "interestListName", "interestListID");
		$this->assertEqual($myArray['varieties'], 1,  
		       "Should return 1 for key of 'varieties' but returned " . $myArray['varieties']);
		$this->assertEqual($myArray['housing'], 2,
				"Should return 2 for key of 'housing' but returned ".$myArray['housing']);
		$this->assertEqual($myArray['food'], 3,
				"Should return 3 for key of 'food' but returned ".$myArray['food']);
		$this->assertEqual($myArray['toys'], 4,
				"Should return 4 for key of 'toys' but returned ".$myArray['toys']);
		$this->assertEqual($myArray['care'], 5,
				"Should return 5 for key of 'care' but returned ".$myArray['care']);
	}
	
	function test_getArrayById() {
		// Tests getArray with the interestListID as the key
		$rowset = array(array("interestListID" => 1, "interestListName" => "varieties"),
						array("interestListID" => 2, "interestListName" => "housing"),
						array("interestListID" => 3, "interestListName" => "food"),
						array("interestListID" => 4, "interestListName" => "toys"),
						array("interestListID" => 5, "interestListName" => "care")
						);
		$myArray = InterestListDB::getArray($rowset, "interestListID", "interestListName");
		$this->assertEqual($myArray['1'], "varieties",
				"Should return varieties for key of 1 but returned ".$myArray['1']);
		$this->assertEqual($myArray['2'], 'housing',
				"Should return housing for key of 2 but returned ".$myArray['2']);
		$this->assertEqual($myArray['3'], 'food',
				"Should return food for key of 3 but returned ".$myArray['3']);
		$this->assertEqual($myArray['4'], 'toys',
				"Should return toys for key of 4 but returned ".$myArray['4']);
		$this->assertEqual($myArray['5'], 'care',
				"Should return care for key of 5 but returned ".$myArray['5']);
	}

	function test_getMapById() {
		// Tests the getMap method for mapping interestListID -> interestListName
		$myArray= InterestListDB::getMap('interestListID', 'interestListName');
		$this->assertEqual($myArray['1'], "varieties",
				"Should return varieties for key of 1 but returned ".$myArray['1']);
		$this->assertEqual($myArray['2'], 'housing',
				"Should return housing for key of 2 but returned ".$myArray['2']);
		$this->assertEqual($myArray['3'], 'food',
				"Should return food for key of 3 but returned ".$myArray['3']);
		$this->assertEqual($myArray['4'], 'toys',
				"Should return toys for key of 4 but returned ".$myArray['4']);
		$this->assertEqual($myArray['5'], 'care',
				"Should return care for key of 5 but returned ".$myArray['5']);
	}

	function test_getNameById() {
		// Tests getNameById for a valid interestListID
		$myName = InterestListDB::getNameById(1);
		$this->assertEqual($myName, "varieties",
				"Should return varieties for key of 1 but returned ".$myName);
	}
	
	function test_getIdByName() {
		// Tests getIdByName for a valid name
		$myName = "housing";
        $myId = InterestListDB::getIdByName($myName);
		$this->assertEqual($myId, "2",
				"Should return 2 for name housing but returned ".$myId);
	}
}
?>
