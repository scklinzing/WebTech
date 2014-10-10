<h1>Responding to survey</h1>
<?php
require ("./models/SignUpData.class.php");
$signup = new SignUpData ( $_GET );
$signup->printSurvey ();
?>