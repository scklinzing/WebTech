<?php
include ("../models/SignUpData.class.php");
echo "<h1>Tests for SignUpData class";
echo "<h2>It should create a valid object when all input is provided</h2>";
$validTest = array (
		"firstname" => "Shelley",
);
$s1 = new signUpData ( $validTest );
$s1->printSurvey ();
?>