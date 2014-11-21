<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/UserData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/../../WebContent/views/showUser.php");
require_once(dirname(__FILE__)."/../models/makeTestDB.php");

class ShowUserTest extends UnitTestCase {
	// Tester class for the showUser view
	function __construct() {
		parent::__construct();
	}
	
	function setUp() {
		makeTestDB('temp1');
	}
	
	function test_showUser() {
		// Tests that showUser can be be invoked without error
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
		showUser($s1);
		$users = 0;
		$this->assertEqual($users, 0, "[Show user executes]");
	}
}
?>