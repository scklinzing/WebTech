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
		$validTest1 = array (
							"username" => "LadyBug",
							"email" => "lady-bug@mail.com",
							"password" => "password", // password
							"phoneNum" => "8443819620",
							"website" => "www.facebook.com",
							"favcolor" => "#ff0000", // color
							"bday" => "1980-11",
							"whyRatChat" => "2", // reason
							"ratsOwned" => "0", // ratsOwned
							"interestList" => array("Rat Toys")
							);
		$s1 = new UserData($validTest1);
		$this->assertIsA($s1, 'UserData', "It should create a valid UserData object but doesn't");
		try {
			registerForm($s1);
		} catch (Exception $e) {
			$this->assertTrue(0, "It should not throw exception on a UserData object");
		}
	}
}