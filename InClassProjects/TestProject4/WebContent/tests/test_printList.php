<?php
include ("../utilities/printList.php");
echo "<h1>Tests for printList</h1>";

echo "<h2>It should work when the list is empty</h2>";
printList ( [ ], "Empty array<br>" );
?>