<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class LoginControllerTest extends UnitTestCase {
	// Tester class for the loginController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runLoginController() {
		// Tests that loginController code can be executed
		$_SERVER["REQUEST_METHOD"] = "POST";
		$_POST = array("username" => "SillyGirl",
		               "password" => "abc123");
		$user = 0;
		require(dirname(__FILE__)."/../../WebContent/controllers/loginController.php");
		$this->assertTrue(is_a($user, 'UserData'), 
				"[It should create a UserData object but does not]");
	}
}
?>