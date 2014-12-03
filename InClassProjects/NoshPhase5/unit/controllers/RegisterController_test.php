<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class RegisterControllerTest extends UnitTestCase {
	// Tester class for the registerController code
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_runRegisterController() {
		// Tests that RegisterController code can be executed
		$_SERVER["REQUEST_METHOD"] = "POST";
		$_POST = array("userName" => "JohnnyCatchup",
		               "userPassword" => "abc123",
		                "userPasswordRetyped" => "abc123");
		$comment = 0;
		RegisterController::run();
		$this->assertEqual($comment, 0, "[It should not throw an exception]");
	}
}
?>