<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/UserData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/views/registerForm.php");

class RegisterFormTest extends UnitTestCase {
	// Tester class for the loginForm view
	function __construct() {
		parent::__construct();
	}

	function test_registerFormNullUser() {
		// Tests that registerForm can be called with a null user
		try {
		  registerForm(null);
		} catch (Exception $e) { 
		   $this->assertTrue(0, "It should not throw exception on null object");
		}

	}
	
	function test_registerForm() {
		// Tests that registerForm can be called with non-null user
		$validTest1 = array("userName" => "JohnnyCatchup",
				"userPassword" => "abc123");
		$s1 = new UserData($validTest1);
		$this->assertIsA($s1, 'UserData', "It should create a valid UserData object but doesn't");
		try {
			registerForm($s1);
		} catch (Exception $e) {
			$this->assertTrue(0, "It should not throw exception on a UserData object");
		}
	}
}