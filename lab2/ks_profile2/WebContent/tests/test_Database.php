<?php
/**
 * Responsibility: Testing the Database Connection
 */
include ("../models/Database.class.php");
echo "<h1>Tests for Database class";

echo "<h2>It should create a database connection the first time called</h2>";

$myDb = Database::getDB ();

echo "<h2>It should not open another connection if called again</h2>";
$myDb = Database::getDB ();
echo "<h2>It should not open another connection if called another time</h2>";
$myDb = Database::getDB ();
?>