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
							"password" => '$2y$10$TmIMGqe3o5JSQBw9v05qZ.qdNUBj0F7yWt1KpuS4rTNNFkYHWxiku', // password
							"phoneNum" => "8443819620",
							"website" => "https://www.google.com",
							"favcolor" => "#ff0000", // color
							"bday" => "1980-11",
							"whyRatChat" => "1", // reason
							"ratsOwned" => "1", // ratsOwned
							"interestList" => array("varieties", "toys")
							);
	}
	
	function test_emptyUserData() {
		// Tests that an empty UserData object can be created
		$s1 = new UserData();
		$this->assertNotNull($s1, "UserData object $s1");
		$this->assertIsA($s1, 'UserData', "Should be a UserData object");
		$this->assertEqual($s1->getUsername(), "",
				"username should be empty but is ".$s1->getUsername());
		$this->assertEqual($s1->getEmail(), "",
				"email should be empty but is ".$s1->getEmail());
		$this->assertEqual($s1->getPassword(), "",
				"password should be empty but is ".$s1->getPassword());
		$this->assertEqual($s1->getPhoneNum(), "",
				"phoneNum should be empty but is ".$s1->getPhoneNum());
		$this->assertEqual($s1->getWebsite(), "",
				"website should be empty but is ".$s1->getWebsite());
		$this->assertEqual($s1->getFavcolor(), "",
				"favcolor should be empty but is ".$s1->getFavcolor());
		$this->assertEqual($s1->getBday(), "",
				"bday should be empty but is ".$s1->getBday());
		$this->assertEqual($s1->getWhyRatChat(), "",
				"whyRatChat should be empty but is ".$s1->getWhyRatChat());
		$this->assertEqual($s1->getRatsOwned(), "",
				"ratsOwned should be empty but is ".$s1->getRatsOwned());
		$list = $s1->getInterestList();
		$this->assertTrue(is_array($list),
				"the interest list should be an array but is not");
	}
	
	function test_validInput() {
        // Tests that a UserData object can be made when input is valid
		$s1 = new UserData($this->testData);
  		$this->assertNotNull($s1, "UserData object $s1");
  		$this->assertTrue(is_a($s1, 'UserData'), "Should be a UserData object");
		$this->assertEqual($s1->getUsername(), $this->testData['username'],
		       "username should be ".$this->testData['username'].
				" but is ".$s1->getUsername());
		$this->assertEqual($s1->getEmail(), $this->testData['email'],
				"email should be ".$this->testData['email'].
				" but is ".$s1->getEmail());
		$this->assertEqual($s1->getPassword(), $this->testData['password'],
				"password should be ".$this->testData['password'].
				" but is ".$s1->getPassword());
		$this->assertEqual($s1->getPhoneNum(), $this->testData['phoneNum'],
				"phoneNum should be ".$this->testData['phoneNum'].
				" but is ".$s1->getPhoneNum());
		$this->assertEqual($s1->getWebsite(), $this->testData['website'],
				"website should be ".$this->testData['website'].
				" but is ".$s1->getWebsite());
		$this->assertEqual($s1->getFavcolor(), $this->testData['favcolor'],
				"favcolor should be ".$this->testData['favcolor'].
				" but is ".$s1->getFavcolor());
		$this->assertEqual($s1->getBday(), $this->testData['bday'],
				"bday should be ".$this->testData['bday'].
				" but is ".$s1->getBday());
		$this->assertEqual($s1->getWhyRatChat(), $this->testData['whyRatChat'],
				"whyRatChat should be ".$this->testData['whyRatChat'].
				" but is ".$s1->getWhyRatChat());
		$this->assertEqual($s1->getRatsOwned(), $this->testData['ratsOwned'],
				"ratsOwned should be ".$this->testData['ratsOwned'].
				" but is ".$s1->getRatsOwned());
		$list = $s1->getInterestList();
		$this->assertTrue(is_array($list),
				"the interest list should be an array but is not");
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
	
	function test_invalidUserName() {
		// Tests invalid user names are detected
		$this->testData['username'] = '$ab';
		$s1 = new UserData($this->testData);
		$this->assertNotNull($s1, "UserData object $s1");
		$this->assertTrue(is_a($s1, 'UserData'), "Should be a UserData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
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
	
	function test_invalidEmail() {
		// Tests that UserData has an error when the email is invalid
		$this->testData['email'] = '$\xy^';
		$s1 = new UserData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0,
				"Error count should be greater than 0 for invalid email, but was ".
				$errorCount);
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['email']),
				"Error message should be set for user profile email but was not");
		$this->assertFalse(empty($s1->getError('email')));
	}
	
	function test_invalidPhoneNum() {
		$this->testData['phoneNum'] = "3211";
		$s1 = new UserData($this->testData);
		$this->assertNotNull($s1, "UserData object $s1");
		$this->assertTrue(is_a($s1, 'UserData'), "Should be a UserData object");
		$errors = $s1->getErrorCount();
		$this->assertEqual($errors, 1, "It should have 1 error but has $errors");
	}
	
	function test_invalidWebsite() {
	$this->testData['website'] = '$\xy^';
		$s1 = new UserData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0, 
		    "Error count should be greater than 0 for invalid website, but was $errorCount");
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['website']), 
		    "Error message should be set for website but was not");
		$this->assertFalse(empty($s1->getError('website')));
	}
	
	function test_invalidFavcolor() {
		$this->testData['favcolor'] = '$\xy^';
		$s1 = new UserData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0,
				"Error count should be greater than 0 for invalid favcolor, but was $errorCount");
				$errors = $s1->getErrors();
				$this->assertTrue(isset($errors['favcolor']),
						"Error message should be set for favcolor but was not");
				$this->assertFalse(empty($s1->getError('favcolor')));
	}
	
	function test_invalidBday() {
		$this->testData['bday'] = '$\xy^';
		$s1 = new UserData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0,
				"Error count should be greater than 0 for invalid bday, but was $errorCount");
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['bday']),
				"Error message should be set for bday but was not");
		$this->assertFalse(empty($s1->getError('bday')));
	}
	
	function test_invalidWhyRatChat() {
		$this->testData['whyRatChat'] = '4';
		$s1 = new UserData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0,
				"Error count should be greater than 0 for invalid whyRatChat, but was $errorCount");
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['whyRatChat']),
				"Error message should be set for whyRatChat but was not");
		$this->assertFalse(empty($s1->getError('whyRatChat')));
	}
	
	function test_invalidRatsOwned() {
		$this->testData['ratsOwned'] = 'y';
		$s1 = new UserData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0,
				"Error count should be greater than 0 for invalid ratsOwned, but was $errorCount");
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['ratsOwned']),
				"Error message should be set for ratsOwned but was not");
		$this->assertFalse(empty($s1->getError('ratsOwned')));
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
}
?>