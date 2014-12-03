<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/ChangePswdData.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class ChangePswdDataTest extends UnitTestCase {
	// Tester class for models/UserDB
	private $testData;
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		$this->testData = array (
				"username" => "LadyBug",
				"newPassword" => 'password1',
				"oldPassword" => 'password2'
		);
	}
	
	function test_emptyChangePswdData() {
		// Tests that an empty ChangePswdData object can be created
		$s1 = new ChangePswdData();
		$this->assertNotNull($s1, "ChangePswdData object $s1");
		$this->assertIsA($s1, 'ChangePswdData', "Should be a ChangePswdData object");
		$this->assertEqual($s1->getUsername(), "",
				"username should be empty but is ".$s1->getUsername());
		$this->assertEqual($s1->getNewPassword(), "",
				"new password should be empty but is ".$s1->getNewPassword());
		$this->assertEqual($s1->getOldPassword(), "",
				"old password should be empty but is ".$s1->getOldPassword());
	}
	
	
	
}
?>
