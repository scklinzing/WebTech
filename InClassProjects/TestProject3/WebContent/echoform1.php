<?php
echo "Thank you for responding to URL Nosh";
echo "<br>";
print_r ( $_GET ); // get array
echo "<br>";
?>

<?php
echo "Example 1: All in PHP<br>";
// $variable are UNTYPED
// print out values of array
foreach ( $_GET as $myparam => $myvalue ) {
	// double quotes evaluate a variable in the line
	// single quotes is ONLY a string
	echo "$myparam has value $myvalue<br>";
}
?>