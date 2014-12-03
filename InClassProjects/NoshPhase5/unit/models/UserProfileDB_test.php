<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class UserProfileDBTest extends UnitTestCase {
	// Tester class for models/UserProfileDB
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_getUserByEmail() {
		// Tests getUserByEmail which tests to see whether an item is already in the database
		$email = "kay@gmail.com";
		$user = UserProfileDB::getUserByEmail($email);
		$this->assertIsA($user, 'UserProfileData', 
		   "It should return a UserProfileData object for a valid user name");
		$email = "john1@yahoo.com";
		$user = UserProfileDB::getUserByEmail($email);
		$this->assertNull($user, "It should return a null for invalid user name");
	}
	
	function test_getUserByUserId() {
		// Tests getUserByName which tests to see whether an item is already in the database
		$name = "Kay";
		$user = UserProfileDB::getUserProfileByUserId(1);
		$this->assertIsA($user, 'UserProfileData',
				"It should return a UserProfileData object for a valid user name");
		$actualName = $user->getUserProfileFirstName();
		$this->assertEqual($actualName, $name, 
				"It should have name $name but has name $actualName");
	}
	
	function test_getAll() {
		// Tests getAll which fetches all of the rows from the database.
		$myUserProfiles = UserProfileDB::getAll();
		$profileCount = count($myUserProfiles);
		$this->assertEqual($profileCount, 2, "[It should return 2 user profiles, but returned
				$profileCount items]");
		for ($k = 0; $k < count($myUserProfiles); $k++) {
			$this->assertTrue(is_a($myUserProfiles[$k], 'UserProfileData'), "[Item $k
					should be a UserDataData object but is not]");
		}
		}
	
	function test_addUserProfile() {
		// Tests addUserProfile which inserts a new user profile in the database.
		$testArray = array("userProfileEmail" => "ann@yahoo.com",
				            "userProfileFirstName" => "Ann",
				            "userProfileLastName" => "Jones",
		                    "userId" => 3);
		$testUserProfile = new UserProfileData($testArray);
		$predictedCount = count(UserProfileDB::getAll()) + 1;
		$returnValue = userProfileDB::addUserProfile($testUserProfile);
		$afterCount = count(userProfileDB::getAll());
		$this->assertEqual($afterCount, $predictedCount,
				"[Database should have $predictedCount items after adding user profile but
				has $afterCount items]");
		$insertedUserProfile = UserProfileDB::getUserProfileByUserId($returnValue);
		$email = $insertedUserProfile->getUserProfileEmail();
		$testEmail = $testArray['userProfileEmail'];
		$this->assertEqual($email, $testEmail, 
				"The added user should have email $testEmail but had email $email");
	}
	
}
?>
