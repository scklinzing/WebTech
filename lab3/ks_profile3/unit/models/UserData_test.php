<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/UserData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class UserDataTest extends UnitTestCase {
	private $testData;
	
	function __construct() {
		parent::__construct();
		//makeTestDB('temp1');
	}
	
	function setUp() {
		$this->testData = array (
							"username" => "LadyBug",
							"email" => "lady-bug@mail.com",
							"password" => "$2y$10\$TmIMGqe3o5JSQBw9v05qZ.qdNUBj0F7yWt1KpuS4rTNNFkYHWxiku", // password
							"phoneNum" => "8443819620",
							"website" => "www.facebook.com",
							"favcolor" => "#ff0000", // color
							"bday" => "1980-11",
							"whyRatChat" => "2", // reason
							"ratsOwned" => "0", // ratsOwned
							"interestList" => array("Rat Toys")
							);
	}
	
	function test_emptyUserData() {
		// Tests that an empty UserData object can be created
		$s1 = new UserData();
		$this->assertNotNull($s1, "UserData object $s1");
		$this->assertIsA($s1, 'UserData', "Should be a UserData object");
		$this->assertEqual($s1->getUserName(), "",
				"user name should be empty but is ".$s1->getUserName());
	}
	
	function test_validInput() {
        // Tests that a UserData object can be made when input is valid
		$s1 = new UserData($this->testData);
  		$this->assertNotNull($s1, "UserData object $s1");
  		$this->assertTrue(is_a($s1, 'UserData'), "Should be a UserData object");
		$this->assertEqual($s1->getUserName(), $this->testData['username'],
		       "username should be ".$this->testData['username'].
				" but is ".$s1->getUserName());
	}
	
	function test_invalidPassword() {
		// Tests invalid passwords are detected
		$this->testData['passwordRetyped'] = 'ab';
		$s1 = new UserData($this->testData);
		$this->assertNotNull($s1, "UserData object $s1");
		$this->assertTrue(is_a($s1, 'UserData'), "Should be a UserData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
	
	function test_invalidUserName() {
		// Tests invalid user names are detected
		$this->testData['username'] = '$ab';
		$s1 = new UserData($this->testData);
		$this->assertNotNull($s1, "UserData object $s1");
		$this->assertTrue(is_a($s1, 'UserData'), "Should be a UserData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
	
	function test_validUserNameDashes() {
		// Tests invalid user names are detected
		$this->testData['username'] = '-a_b';
		$s1 = new UserData($this->testData);
		$this->assertNotNull($s1, "UserData object $s1");
		$this->assertTrue(is_a($s1, 'UserData'), "Should be a UserData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 0, "It should have no errors but has $errors");
	}
	
	function test_getParameters() {
		// Tests that UserData returns a valid array when no errors
		$s1 = new UserData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 0, 
				"It should have no errors for valid input, but has $errorCount errors");
		$params = $s1->getParameters();

		$this->assertEqual($params['username'], $this->testData['username'],
				"Returned username should be ".$this->testData['username']." but is ".
				$params['username']);
		$this->assertEqual($params['email'], $this->testData['email'],
				"Returned email should be ".$this->testData['email']." but is ".
				$params['email']);
		$this->assertEqual($params['phoneNum'], $this->testData['phoneNum'],
				"Returned phoneNum should be ".$this->testData['phoneNum']." but is ".
				$params['phoneNum']);
		$this->assertEqual($params['website'], $this->testData['website'],
				"Returned website should be ".$this->testData['website']." but is ".
				$params['website']);
		$this->assertEqual($params['favcolor'], $this->testData['favcolor'],
				"Returned favcolor should be ".$this->testData['favcolor']." but is ".
				$params['favcolor']);
		$this->assertEqual($params['bday'], $this->testData['bday'],
				"Returned bday should be ".$this->testData['bday']." but is ".
				$params['bday']);
		$this->assertEqual($params['whyRatChat'], $this->testData['whyRatChat'],
				"Returned whyRatChat should be ".$this->testData['whyRatChat']." but is ".
				$params['whyRatChat']);
		$this->assertEqual($params['ratsOwned'], $this->testData['ratsOwned'],
				"Returned ratsOwned should be ".$this->testData['ratsOwned']." but is ".
				$params['ratsOwned']);
	}
	
	function test_setError() {
		// Tests that an error message can be set appropriately
		$s1 = new UserData($this->testData);
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
	

}

?>