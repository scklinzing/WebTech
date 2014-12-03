<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class ShowUserTest extends UnitTestCase {
	// Tester class for the showUser view
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_ShowUser() {
		// Tests that ShowUser can be be invoked without error
		$validTest1 = array("userName" => "JohnnyCatchup",
		                    "userPassword" => "abc123");
		$s1 = new UserData($validTest1);
		$this->assertIsA($s1, 'UserData', "It should create a valid UserData object but doesn't");
		ShowUser::show($s1);
		$users = 0;
		$this->assertEqual($users, 0, "[Show user executes]");
	}
}
?>