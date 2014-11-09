<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/InterestListDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/views/showUsers.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class LastUsersControllerTest extends UnitTestCase {
	// Tester class for the lastUsersController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runLastUsersController() {
		// Tests that usersController code can be executed
		$myUsers = 0;
		require(dirname(__FILE__)."/../../WebContent/controllers/lastUsersController.php");
		$this->assertTrue(is_array($myUsers), 
				"[It should create an array of UserData but does not]");
		$userCount = count($myUsers);
		$this->assertTrue($userCount <= 3, 
				"[It should retrieve 3 or fewer users, but it retrieved $userCount users");
	}
}
?>