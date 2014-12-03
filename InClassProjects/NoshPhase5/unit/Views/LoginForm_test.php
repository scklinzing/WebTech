<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");

class LoginFormTest extends UnitTestCase {
	// Tester class for the loginForm view
	function __construct() {
		parent::__construct();
	}

	function test_LoginFormNullUser() {
		// Tests that LoginForm show can be called with a null user
		try {
		  
		  LoginForm::show(null);
		} catch (Exception $e) { 
		   $this->assertTrue(0, "It should not throw exception on null object");
		}

	}
	
	function test_LoginForm() {
		// Tests that loginForm can be called with non-null user
		$validTest1 = array("userName" => "JohnnyCatchup",
				"userPassword" => "abc123");
		$s1 = new UserData($validTest1);
		$this->assertIsA($s1, 'UserData', "It should create a valid UserData object but doesn't");
		try {
			LoginForm::show($s1);
		} catch (Exception $e) {
			$this->assertTrue(0, "It should not throw exception on a UserData object");
		}
	}
}