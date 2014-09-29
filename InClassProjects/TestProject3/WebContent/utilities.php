<?php
// Outputs message ($msg) followed by unordered list with $myarray values
function printList($myarray, $msg) {
	echo $msg;
	echo "<ul>";
	foreach ( $myarray as $myparam => $myvalue ) {
		echo "<li>$myparam: $myvalue</li>";
	}
	echo "</ul>";
}
// Returns an array with the values in $vTest that are in $validNames
function getValidArray($vTest, $validNames = array("art", "music")) {
	$returnValues = array ();
	if (empty ( $vTest ) || empty ( $validNames )) {
		return $returnValues;
	}
	for($k = 0; $k < count ( $vTest ); $k ++) {
		if (in_array ( $vTest [$k], $validNames ))
			array_push ( $returnValues, $vTest [$k] );
	}
	return $returnValues;
}
?>