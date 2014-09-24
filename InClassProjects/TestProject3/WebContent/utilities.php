<?php
function printList($myarray, $msg) {
	echo $msg;
	echo "<ul>";
	foreach ( $myarray as $myparam => $myvalue ) {
		echo "<li>$myparam has value: $myvalue</li>";
	}
	echo "</ul>";
}

function getValidArray($vTest, $validNames = array("art", "music")) {
	$returnValues = array();
	/* make sure that the variables are not empty */
	if (empty($vTest) || empty($validNames)) {
		return $returnValues;
	}
}
?>