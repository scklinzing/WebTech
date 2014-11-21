<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/InterestListDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserDB.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/UserData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/views/showUsers.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class UsersControllerTest extends UnitTestCase {
	// Tester class for the usersController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runUsersController() {
		// Tests that usersController code can be executed
		$myUsers = 0;
		require(dirname(__FILE__)."/../../WebContent/controllers/usersController.php");
		$this->assertTrue(is_array($myUsers), 
				"[It should create an array of UserData but does not]");
	}
}
?>