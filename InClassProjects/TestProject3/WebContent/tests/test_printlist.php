<?php
echo "<h1>Tests for printList</h1>";
include ("../utilities.php");
echo "<h2>It should work when the list is empty</h2>";
printList ( [ ], "Empty array<br>" );
?>