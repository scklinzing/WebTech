<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class LoginControllerTest extends UnitTestCase {
	// Tester class for the LoginController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runLoginController() {
		// Tests that LoginController code can be executed
		$_SERVER["REQUEST_METHOD"] = "POST";
		$_POST = array("userName" => "JohnnyCatchup",
				       "userEmail" => "catchup@gmail.com",
		               "userPassword" => "abc123");
	    $user = 0;
		LoginController::run();
		$this->assertEqual($user, 0, "[It should not throw an exception]");
	}
}
?>