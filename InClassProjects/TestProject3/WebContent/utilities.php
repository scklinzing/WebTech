<?php
function printList($myarray, $msg) {
	echo $msg;
	echo "<ul>";
	foreach ( $myarray as $myparam => $myvalue ) {
		echo "<li>$myparam has value: $myvalue</li>";
	}
	echo "</ul>";
}
?>