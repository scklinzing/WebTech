<?php
include ("../models/CommentData.class.php");
echo "<h1>You entered</h1>";
$s1 = new CommentData ( $_POST );
$s1->printComment ();
?>