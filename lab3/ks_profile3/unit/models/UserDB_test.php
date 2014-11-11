<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/InterestListDB.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class UserDBTest extends UnitTestCase {
	// Tester class for models/UserDB
	private $existingUser;
	private $testData;
	function __construct() {
		parent::__construct();

		$existingUser = array("username" => "SillyGirl", 
				              "userPasswordHash" => '$2y$10$TmIMGqe3o5JSQBw9v05qZ.qdNUBj0F7yWt1KpuS4rTNNFkYHWxiku');
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_getUserByName() {
		// Tests getUserByName which tests to see whether an item is already in the database
		$name = "SillyGirl";
		$user = UserDB::getUserByName($name);
		$this->assertIsA($user, 'UserData', 
		   "It should return a UserData object for a valid user name");
		$name = "Jane";
		$user = UserDB::getUserByName($name);
		$this->assertNull($user, "It should return a null for invalid user name");
	}
	
	function test_getUserById() {
		// Tests getUserByName which tests to see whether an item is already in the database
		$name = "SillyGirl";
		$user = UserDB::getUserById(1);
		$this->assertIsA($user, 'UserData',
				"It should return a UserData object for a valid user name");
		$actualName = $user->getUserName();
		$this->assertEqual($actualName, $name, 
				"It should have name $name but has name $actualName");
	}
	
	function test_updateUser() {
		// Tests udateUser
		$name = "SillyGirl";
		$user = UserDB::getUserById(1);
		$this->assertIsA($user, 'UserData',
				"It should return a UserData object for a valid user name");
		$parms = $user->getParameters();
		$parms['email'] = "kay@gmail.com";
		$newUser = new UserData($parms);
		$returnID = UserDB::updateUser($name, $newUser);
		$this->assertEqual($returnID, 1, 
				"The ID of updated object should be 1 but is $returnID");
		$email = $newUser->getEmail();
		$this->assertEqual($email, $parms['email'], 
		   "New email should be ".$parms['email']. " but is $email");
		
		/* ----------- try updating interest list ----------- */
		$parms['interestList'] = array("varieties", "care"); // set new interest list
		
		/* write out the new list */
		$tags = $parms['interestList'];
		$newList = "[ ";
		for($k = 0; $k < count ( $tags ); $k ++)
			$newList = $newList . $tags [$k] . " ";
		$newList = $newList . "]";
		
		/* try and update */
		$newUser = new UserData($parms);
		$returnID = UserDB::updateUser($name, $newUser);
		
		/* print out the user list */
		$list = $newUser->getInterestList();
		$userList = "[ ";
		for($k = 0; $k < count ( $list ); $k ++)
			$userList = $userList . $list [$k] . " ";
			$userList = $userList . "]";
		
		$this->assertEqual($returnID, 1,
				"The ID of updated object should be 1 but is $returnID");
		
		//echo $newList;
		//echo $userList;
		
		$this->assertEqual($list, $parms['interestList'],
				"New interest list should be ".$newList. " but is $userList");
	}
}
?>
