<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/UserProfileData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class UserProfileDataTest extends UnitTestCase {
	private $testData;
	
	function __construct() {
		parent::__construct();
		makeTestDB('temp1');
	}
	
	function setUp() {
		$this->testData = array("userProfileEmail" => "John@yahoo.com",
				                "userProfileFirstName" => "John",        
			                 	"userProfileLastName" => "Catch");
	}
	
	function test_emptyUserProfileData() {
		// Tests that an empty UserProfileData object can be created
		$s1 = new UserProfileData();
		$this->assertNotNull($s1, "UserProfileData object $s1");
		$this->assertIsA($s1, 'UserProfileData', "Should be a UserProfileData object");
		$this->assertEqual($s1->getUserProfileFirstName(), "",
				"user first name should be empty but is ".$s1->getUserProfileFirstName());
		$this->assertEqual($s1->getUserProfileLastName(), "",
				"user last name should be empty but is ".$s1->getUserProfileLastName());
	}
	
	function test_validInput() {
        // Tests that a UserProfileData object can be made when input is valid
		$s1 = new UserProfileData($this->testData);
  		$this->assertNotNull($s1, "UserProfileData object $s1");
  		$this->assertTrue(is_a($s1, 'UserProfileData'), "Should be a UserProfileData object");
  		$this->assertEqual($s1->getUserProfileEmail(), $this->testData['userProfileEmail'],
  				"Returned userProfileEmail should be ".$this->testData['userProfileEmail'].
  				" but is ".$s1->getUserProfileEmail());
		$this->assertEqual($s1->getUserProfileFirstName(), $this->testData['userProfileFirstName'],
				"userProfileFirstName should be ".$this->testData['userProfileFirstName'].
				" but is ".$s1->getUserProfileFirstName());
	
		$this->assertEqual($s1->getUserProfileLastName(), $this->testData['userProfileLastName'],
				"userProfileLastName should be ".$this->testData['userProfileLastName'].
				" but is ".$s1->getUserProfileLastName());
	}
	
	function test_getParameters() {
		// Tests that UserProfileData returns a valid array when no errors
		$s1 = new UserProfileData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertEqual($errorCount, 0, 
				"It should have no errors for valid input, but has $errorCount errors");
		$params = $s1->getParameters();
		$this->assertEqual($params['userProfileEmail'], $this->testData['userProfileEmail'],
				"Returned userProfileEmail should be ".$this->testData['userProfileEmail'].
				" but is ".$params['userProfileEmail']);
		$this->assertEqual($params['userProfileFirstName'], $this->testData['userProfileFirstName'],
				"Returned userProfileFirstName should be ".$this->testData['userProfileFirstName']." but is ".
				$params['userProfileFirstName']);
		$this->assertEqual($params['userProfileLastName'], $this->testData['userProfileLastName'],
				"Returned userProfileLastName should be ".$this->testData['userProfileLastName']." but is ".
				$params['userProfileLastName']);
	}
	
	function test_invalidUserProfileEmail() {
		// Tests that UserData has an error when the email is invalid
		$this->testData['userProfileEmail'] = '$\xy^';
		$s1 = new UserProfileData($this->testData);
		$errorCount = $s1->getErrorCount();
		$this->assertTrue($errorCount > 0,
				"Error count should be greater than 0 for invalid email, but was ".
				$errorCount);
		$errors = $s1->getErrors();
		$this->assertTrue(isset($errors['userProfileEmail']),
				"Error message should be set for user profile email but was not");
		$this->assertFalse(empty($s1->getError('userProfileEmail')));
	}
	
	
}

?>