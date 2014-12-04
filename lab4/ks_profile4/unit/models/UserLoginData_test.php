<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserLoginData.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class UserLoginDataTest extends UnitTestCase {
	// Tester class for models/UserDB
	private $testData;
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		$this->testData = array (
				"userID" => "1",
				"username" => "LadyBug",
				"password" => 'password',
				"userDateCreated" => "2014-11-27 13:40:36"
		);
	}
	
	function test_emptyUserLoginData() {
		// Tests that an empty UserLoginData object can be created
		$s1 = new UserLoginData();
		$this->assertNotNull($s1, "UserLoginData object $s1");
		$this->assertIsA($s1, 'UserLoginData', "Should be a UserLoginData object");
		$this->assertEqual($s1->getUserID(), "",
				"userID should be empty but is ".$s1->getUserID());
		$this->assertEqual($s1->getUsername(), "",
				"username should be empty but is ".$s1->getUsername());
		$this->assertEqual($s1->getPassword(), "",
				"password should be empty but is ".$s1->getPassword());
		$this->assertEqual($s1->getUserDateCreated(), "",
				"userDateCreated should be empty but is ".$s1->getUserDateCreated());
	}
	
	function test_validInput() {
		// Tests that a UserLoginData object can be made when input is valid
		$s1 = new UserLoginData($this->testData);
		$this->assertNotNull($s1, "UserLoginData object $s1");
		$this->assertTrue(is_a($s1, 'UserLoginData'), "Should be a UserLoginData object");
		$this->assertEqual($s1->getUserID(), $this->testData['userID'],
				"userID should be ".$this->testData['userID'].
				" but is ".$s1->getUserID());
		$this->assertEqual($s1->getUsername(), $this->testData['username'],
				"username should be ".$this->testData['username'].
				" but is ".$s1->getUsername());
		$this->assertEqual($s1->getPassword(), $this->testData['password'],
				"password should be ".$this->testData['password'].
				" but is ".$s1->getPassword());
		$this->assertEqual($s1->getUserDateCreated(), $this->testData['userDateCreated'],
				"userDateCreated should be ".$this->testData['userDateCreated'].
				" but is ".$s1->getUserDateCreated());
	}
	
	function test_getParameters() {
		// Tests that UserLoginData returns a valid array when no errors
		$s1 = new UserLoginData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 0,
				"It should have no errors for valid input, but has $errorCount errors");
		$params = $s1->getParameters();
		$this->assertEqual($params['userID'], $this->testData['userID'],
				"Returned userID should be ".$this->testData['userID']." but is ".
				$params['userID']);
		$this->assertEqual($params['username'], $this->testData['username'],
				"Returned username should be ".$this->testData['username']." but is ".
				$params['username']);
		$this->assertEqual($params['password'], $this->testData['password'],
				"Returned password should be ".$this->testData['password']." but is ".
				$params['password']);
		$this->assertEqual($params['userDateCreated'], $this->testData['userDateCreated'],
				"Returned userDateCreated should be ".$this->testData['userDateCreated']." but is ".
				$params['userDateCreated']);
	}
	
	function test_setError() {
		// Tests that an error message can be set appropriately
		$s1 = new UserLoginData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 0,
				"It should have no errors for valid input, but has $errorCount errors");
		$thisError = 'Incorrect username';
		$s1->setError('username', $thisError);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 1,
				"It should have 1 error, but has $errorCount errors");
		$setError = $s1->getError('username');
		$this->assertEqual($setError, $thisError,
				"The error should have been $thisError but was $setError");
	}
	
	function test_invalidUserID() {
		// Tests invalid user names are detected
		$this->testData['userID'] = '-1';
		$s1 = new UserLoginData($this->testData);
		$this->assertNotNull($s1, "UserLoginData object $s1");
		$this->assertTrue(is_a($s1, 'UserLoginData'), "Should be a UserLoginData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
	
	function test_invalidUserName() {
		// Tests invalid user names are detected
		$this->testData['username'] = '$a%b!';
		$s1 = new UserLoginData($this->testData);
		$this->assertNotNull($s1, "UserLoginData object $s1");
		$this->assertTrue(is_a($s1, 'UserLoginData'), "Should be a UserLoginData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
	
	function test_invalidPassword() {
		// Tests invalid passwords are detected
		$this->testData['passwordRetyped'] = '';
		$s1 = new UserLoginData($this->testData);
		$this->assertNotNull($s1, "UserLoginData object $s1");
		$this->assertTrue(is_a($s1, 'UserLoginData'), "Should be a UserLoginData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
}
?>
