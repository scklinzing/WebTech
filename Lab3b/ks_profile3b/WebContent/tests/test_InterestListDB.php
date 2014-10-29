<?php
include_once("../models/InterestListDB.class.php");
include_once("../models/Database.class.php");

echo "<h1>Tests for InterestListDB class";

echo "<hr><h2>It should convert a rowset to key-value array</h2>";
$rowset = array(array("interestListID" => 1, "interestListName" => "ratVarieties"),
		        array("interestListID" => 2, "interestListName" => "ratHousing"),
				array("interestListID" => 3, "interestListName" => "ratFood"),
				array("interestListID" => 4, "interestListName" => "ratToys"),
				array("interestListID" => 5, "interestListName" => "ratCare")

);


echo "<h3>Indexing by name</h3>";
$myArray = InterestListDB::getArray($rowset, "interestListName", "interestListID");
print_r($myArray);

echo "<h3>Indexing by id</h3>";
$myArray = InterestListDB::getArray($rowset, 'interestListID', 'interestListName');
print_r($myArray);


echo "<hr><h2>It should fetch the entire table as a id-name associative array</h2>";
$myArray= InterestListDB::getMap('interestListID', 'interestListName');
print_r($myArray);

echo "<hr><h2>It should fetch a name by id</h2>";
$myName = InterestListDB::getNameById(1);
echo "Name for Id 1 is $myName<br>";
$myName = InterestListDB::getNameById(2);
echo "Name for Id 2 is $myName<br>";
$myName = InterestListDB::getNameById(3);
echo "Name for Id 3 is $myName<br>";
$myName = InterestListDB::getNameById(4);
echo "Name for Id 4 is $myName<br>";
$myName = InterestListDB::getNameById(5);
echo "Name for Id 5 is $myName<br>";

echo "<hr><h2>It should fetch an id by name</h2>";
$myName = "ratVarieties";
$myId = InterestListDB::getIdByName($myName);
echo "Id for name $myName is $myId<br>";

$myName = "ratHousing";
$myId = InterestListDB::getIdByName($myName);
echo "Id for name $myName is $myId<br>";

$myName = "ratFood";
$myId = InterestListDB::getIdByName($myName);
echo "Id for name $myName is $myId<br>";

$myName = "ratToys";
$myId = InterestListDB::getIdByName($myName);
echo "Id for name $myName is $myId<br>";

$myName = "ratCare";
$myId = InterestListDB::getIdByName($myName);
echo "Id for name $myName is $myId<br>";

?>
