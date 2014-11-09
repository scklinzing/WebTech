<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserData.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class UserDBTest extends UnitTestCase {
	// Tester class for models/UserDB
	private $existingUser;
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
}
?>
