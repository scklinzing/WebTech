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
		$this->assertEqual($s1->getPassword(), "",
				"old password should be empty but is ".$s1->getPassword());
	}
	
	function test_validInput() {
		// Tests that a ChangePswdData object can be made when input is valid
		$s1 = new ChangePswdData($this->testData);
		$this->assertNotNull($s1, "ChangePswdData object $s1");
		$this->assertTrue(is_a($s1, 'ChangePswdData'), "Should be a ChangePswdData object");
		$this->assertEqual($s1->getUsername(), $this->testData['username'],
				"username should be ".$this->testData['username'].
				" but is ".$s1->getUsername());
		$this->assertEqual($s1->getNewPassword(), $this->testData['newPassword'],
				"newPassword should be ".$this->testData['newPassword'].
				" but is ".$s1->getNewPassword());
		$this->assertEqual($s1->getPassword(), $this->testData['oldPassword'],
				"oldPassword should be ".$this->testData['oldPassword'].
				" but is ".$s1->getPassword());
	}
	
	function test_getParameters() {
		// Tests that ChangePswdData returns a valid array when no errors
		$s1 = new ChangePswdData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 0,
				"It should have no errors for valid input, but has $errorCount errors");
		$params = $s1->getParameters();
		$this->assertEqual($params['username'], $this->testData['username'],
				"Returned username should be ".$this->testData['username']." but is ".
				$params['username']);
		$this->assertEqual($params['newPassword'], $this->testData['newPassword'],
				"Returned newPassword should be ".$this->testData['newPassword']." but is ".
				$params['newPassword']);
		$this->assertEqual($params['oldPassword'], $this->testData['oldPassword'],
				"Returned oldPassword should be ".$this->testData['oldPassword']." but is ".
				$params['oldPassword']);
	}
	
	function test_setError() {
		// Tests that an error message can be set appropriately
		$s1 = new ChangePswdData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 0,
				"It should have no errors for valid input, but has $errorCount errors");
		$thisError = 'User name is already in use';
		$s1->setError('username', $thisError);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 1,
				"It should have 1 error, but has $errorCount errors");
		$setError = $s1->getError('username');
		$this->assertEqual($setError, $thisError,
				"The error should have been $thisError but was $setError");
	}
	
	function test_invalidUserName() {
		// Tests invalid user names are detected
		$this->testData['username'] = '$ab';
		$s1 = new ChangePswdData($this->testData);
		$this->assertNotNull($s1, "ChangePswdData object $s1");
		$this->assertTrue(is_a($s1, 'ChangePswdData'), "Should be a ChangePswdData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
	
	function test_invalidNewPassword() {
		// Tests invalid passwords are detected
		$this->testData['newPasswordRetyped'] = 'ab';
		$s1 = new ChangePswdData($this->testData);
		$this->assertNotNull($s1, "ChangePswdData object $s1");
		$this->assertTrue(is_a($s1, 'ChangePswdData'), "Should be a ChangePswdData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
	
	function test_invalidOldPassword() {
		// Tests invalid passwords are detected
		$this->testData['oldPassword'] = '';
		$s1 = new ChangePswdData($this->testData);
		$this->assertNotNull($s1, "ChangePswdData object $s1");
		$this->assertTrue(is_a($s1, 'ChangePswdData'), "Should be a ChangePswdData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
}
?>
