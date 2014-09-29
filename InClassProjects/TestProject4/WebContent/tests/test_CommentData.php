<?php
include ("../models/CommentData.class.php");
echo "<h1>Tests for CommentData class";

echo "<h2>It should create a valid object when all input is provided</h2>";

$validTest = array (
		"firstName" => "Kay",
		"evaluationUrl" => "http://npr.org",
		"comment" => "Interesting site" 
);
$s1 = new CommentData ( $validTest );
$s1->printComment ();
?>