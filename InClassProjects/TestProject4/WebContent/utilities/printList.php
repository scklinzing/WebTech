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
?>