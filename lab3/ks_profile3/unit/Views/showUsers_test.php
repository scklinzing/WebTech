<?php
require_once ('c:/Programs/simpletest/autorun.php');
require_once (dirname ( __FILE__ ) . "/../../WebContent/models/UserData.class.php");
require_once (dirname ( __FILE__ ) . "/../../WebContent/models/Database.class.php");
require_once (dirname ( __FILE__ ) . "/../../WebContent/views/showUsers.php");
require_once (dirname ( __FILE__ ) . "/../models/makeTestDB.php");
class ShowUsersTest extends UnitTestCase {
	// Tester class for the showUser view
	function __construct() {
		parent::__construct ();
	}
	function setUp() {
		makeTestDB ( 'temp1' );
	}
	function test_showUser() {
		// Tests that showUser can be be invoked without error
		$validTest1 = array (
				"username" => "LadyBug",
				"email" => "lady-bug@mail.com",
				"password" => "password", // password
				"phoneNum" => "8443819620",
				"website" => "www.facebook.com",
				"favcolor" => "#000000", // color
				"bday" => "1980-11",
				"whyRatChat" => "2", // reason
				"ratsOwned" => "0", // ratsOwned
				"interestList" => array("Rat Varieties")
		);
		$user1 = new UserData ( $validTest1 );
		$this->assertIsA ( $user1, 'UserData', "It should create a valid UserData object but doesn't" );
		$validTest2 = array (
				"username" => "Scarecrow",
				"email" => "scarecrow@mail.com",
				"password" => "password", // password
				"phoneNum" => "3844591220",
				"website" => "www.twitter.com",
				"favcolor" => "#000000", // color
				"bday" => "1994-09",
				"whyRatChat" => "1", // reason
				"ratsOwned" => "2", // ratsOwned
				"interestList" => array("Rat Varieties", "Rat Toys", "Rat Care")
		);
		$user2 = new UserData ( $validTest2 );
		$this->assertIsA ( $user2, 'UserData', "It should create a valid UserData object but doesn't" );
		$userList = array (
				$user1,
				$user2
		);
		showUsers ( $userList, "Simple test message" );
		$users = 0;
		$this->assertEqual ( $users, 0, "[Show users executes]" );
	}
}
?>