<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
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
		// Tests that postCommentController code can be executed
		session_destroy(); // not sure why I needed this...
		$_SERVER["REQUEST_METHOD"] = "POST";
		$_POST = array (
						"username" => "LadyBug",
						"email" => "lady-bug@mail.com",
						"password" => "password", // password
						"phoneNum" => "8443819620",
						"website" => "www.facebook.com",
						"favcolor" => "#ff0000", // color
						"bday" => "1980-11",
						"whyRatChat" => "2", // reason
						"ratsOwned" => "0", // ratsOwned
						"interestList" => array("ratToys"),
						"submit" => "1"
				);
		$myPath = dirname(__FILE__)."/../../WebContent/image/irish.jpg";
		$_FILES = array();
		$_FILES["userImage"]['tmp_name'] = $myPath;
		$_FILES["userImage"]['size'] = filesize($myPath);
		require(dirname(__FILE__)."/../../WebContent/controllers/registerController.php");
		$this->assertTrue(is_a($user, 'UserData'), 
				"[It should create a UserData object but does not]");
	}
}
?>