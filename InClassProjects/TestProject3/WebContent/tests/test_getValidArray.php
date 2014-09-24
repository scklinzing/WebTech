<?php 
include("../utilities.php");

echo "Testing getValidArray<br>";

echo "It should return an empty array when input array is empty.<br>";

$myReturn = getValidArray([], []);

if (empty($myREturn)) {
	echo "It returned an empty array.<br>";
} else {
	echo "It's not working.<br>";
}
?>