<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");

class RegisterFormTest extends UnitTestCase {
	// Tester class for the RegisterForm view
	function __construct() {
		parent::__construct();
	}

	function test_RegisterFormNullUser() {
		// Tests that RegisterForm can be called with a null user
		try {
		  RegisterForm::show(null);
		} catch (Exception $e) { 
		   $this->assertTrue(0, "It should not throw exception on null object");
		}

	}
	
	function test_RegisterForm() {
		// Tests that RegisterForm can be called with non-null user
		$validTest1 = array("userName" => "JohnnyCatchup",
				"userPassword" => "abc123");
		$s1 = new UserData($validTest1);
		$this->assertIsA($s1, 'UserData', "It should create a valid UserData object but doesn't");
		try {
			RegisterForm::show($s1);
		} catch (Exception $e) {
			$this->assertTrue(0, "It should not throw exception on a UserData object");
		}
	}
}