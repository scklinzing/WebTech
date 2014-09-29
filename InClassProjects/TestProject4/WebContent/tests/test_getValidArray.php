<?php
include ("../utilities/getValidArray.php");
include ("../utilities/printList.php");

echo "<h1>Testing getValidArray</h1>";

echo "<h2>It should return an empty array when input array is empty</h2>";
$myReturn = getValidArray ( [ ], [ ] );
if (empty ( $myReturn )) {
	echo "It returned an empty array<br>";
} else {
	echo "Empty array test failed<br>";
}

echo "<h2>It should return only items that agree in case</h2>";
$validValues = array (
		"art",
		"music",
		"film",
		"anime" 
);
$test = array (
		"art",
		"ART",
		"Balony",
		"music" 
);
$testValid = getValidArray ( $test, $validValues );
printList ( $testValid, "The list should have art and music in it" );

?>