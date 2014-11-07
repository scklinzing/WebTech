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
		$rowset = array(array("interestListID" => 1, "interestListName" => "Rat Varieties"),
						array("interestListID" => 2, "interestListName" => "Rat Housing"),
						array("interestListID" => 3, "interestListName" => "Rat Food"),
						array("interestListID" => 4, "interestListName" => "Rat Toys"),
						array("interestListID" => 5, "interestListName" => "Rat Care")
						);
		$myArray = InterestListDB::getArray($rowset, "interestListName", "interestListID");
		$this->assertEqual($myArray['Rat Varieties'], 1,  
		       "Should return 1 for key of reader but returned ".$myArray['Rat Varieties']);
		$this->assertEqual($myArray['Rat Housing'], 2,
				"Should return 2 for key of nosher but returned ".$myArray['Rat Housing']);
		$this->assertEqual($myArray['Rat Food'], 3,
				"Should return 2 for key of nosher but returned ".$myArray['Rat Food']);
		$this->assertEqual($myArray['Rat Toys'], 4,
				"Should return 2 for key of nosher but returned ".$myArray['Rat Toys']);
		$this->assertEqual($myArray['Rat Care'], 5,
				"Should return 2 for key of nosher but returned ".$myArray['Rat Care']);
	}
	
	function test_getArrayById() {
		// Tests getArray with the interestListID as the key
		$rowset = array(array("interestListID" => 1, "interestListName" => "Rat Varieties"),
						array("interestListID" => 2, "interestListName" => "Rat Housing"),
						array("interestListID" => 3, "interestListName" => "Rat Food"),
						array("interestListID" => 4, "interestListName" => "Rat Toys"),
						array("interestListID" => 5, "interestListName" => "Rat Care")
						);
		$myArray = InterestListDB::getArray($rowset, "interestListID", "interestListName");
		$this->assertEqual($myArray['1'], "Rat Varieties",
				"Should return Rat Varieties for key of 1 but returned ".$myArray['1']);
		$this->assertEqual($myArray['2'], 'Rat Housing',
				"Should return Rat Housing for key of 2 but returned ".$myArray['2']);
		$this->assertEqual($myArray['3'], 'Rat Food',
				"Should return Rat Food for key of 3 but returned ".$myArray['3']);
		$this->assertEqual($myArray['4'], 'Rat Toys',
				"Should return Rat Toys for key of 4 but returned ".$myArray['4']);
		$this->assertEqual($myArray['5'], 'Rat Care',
				"Should return Rat Care for key of 5 but returned ".$myArray['5']);
	}

	function test_getMapById() {
		// Tests the getMap method for mapping interestListID -> interestListName
		$myArray= InterestListDB::getMap('interestListID', 'interestListName');
		$this->assertEqual($myArray['1'], "Rat Varieties",
				"Should return Rat Varieties for key of 1 but returned ".$myArray['1']);
		$this->assertEqual($myArray['2'], 'Rat Housing',
				"Should return Rat Housing for key of 2 but returned ".$myArray['2']);
		$this->assertEqual($myArray['3'], 'Rat Food',
				"Should return Rat Food for key of 3 but returned ".$myArray['3']);
		$this->assertEqual($myArray['4'], 'Rat Toys',
				"Should return Rat Toys for key of 4 but returned ".$myArray['4']);
		$this->assertEqual($myArray['5'], 'Rat Care',
				"Should return Rat Care for key of 5 but returned ".$myArray['5']);
	}

	function test_getNameById() {
		// Tests getNameById for a valid interestListID
		$myName = InterestListDB::getNameById(1);
		$this->assertEqual($myName, "Rat Varieties",
				"Should return Rat Varieties for key of 1 but returned ".$myName);
	}
	
	function test_getIdByName() {
		// Tests getIdByName for a valid name
		$myName = "Rat Housing";
        $myId = InterestListDB::getIdByName($myName);
		$this->assertEqual($myId, "2",
				"Should return 2 for name Rat Housing but returned ".$myId);
	}
}
?>
