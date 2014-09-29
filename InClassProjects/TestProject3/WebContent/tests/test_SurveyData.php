<?php
include ("../models/SurveyData.class.php");
echo "<h1>Tests for SurveyData class";
echo "<h2>It should create a valid object when all input is provided</h2>";
$validTest = array (
		"firstname" => "Kay",
		"specialdate" => "2014-05-31" 
);
$s1 = new surveyData ( $validTest );
$s1->printSurvey ();
?>