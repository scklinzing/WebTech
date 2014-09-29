<h1>Responding to survey</h1>
<?php
require ("./models/SurveyData.class.php");
$survey = new SurveyData ( $_GET );
$survey->printSurvey ();
?>