<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class DatabaseTest extends UnitTestCase {
	
	function test_temporary() {
		$this->assertEqual(3, 3);
		$db = makeTestDB("temp");
		$this->assertNotNull($db, "Connection should not be null");
	}
	
	


// echo "<h3>Indexing by id</h3>";
// $myArray = MemberClassesDB::getArray($rowset, 'memberClassId', 'memberClassName');
// print_r($myArray);


// echo "<hr><h2>It should fetch the entire table as a id-name associative array</h2>";
// $myArray= MemberClassesDB::getMap('memberClassId', 'memberClassName');
// print_r($myArray);

// echo "<hr><h2>It should fetch a name by id</h2>";
// $myName = MemberClassesDB::getNameById(1);
// echo "Name for Id 1 is $myName";


// echo "<hr><h2>It should fetch an id by  name</h2>";
// $myName = "moderator";
// $myId = MemberClassesDB::getIdByName($myName);
// echo "Id for name $myName is $myId";
}
?>
