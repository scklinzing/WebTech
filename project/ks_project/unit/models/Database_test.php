<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class DatabaseTest extends UnitTestCase {
	// Tester class for Database 
	function test_temporary() {
		
		// Tests making of a database called temp
		$db = makeTestDB("temp");
		$this->assertNotNull($db, "Connection should not be null");
	}
}
?>