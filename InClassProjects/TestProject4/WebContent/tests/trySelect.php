<?php
// Temporary code for trying out select
$dsn = 'mysql:host=localhost;dbname=urlnoshdb';
$username = 'root';
$password = '';
$options = array (
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
);
$db = new PDO ( $dsn, $username, $password, $options );
echo "<h1>Testing PDO before putting into code</h1>";
echo "<h3>Executing select all query to see if a user is in the database</h3>";
$query = "SELECT * FROM Comments WHERE firstName = :firstName";
$statement = $db->prepare ( $query );
$myParameters = array (
		"firstName" => "Elizabeth",
		"evaluationUrl" => "http://yahoo.com",
		"comment" => "Has a configurable user homepage" 
);
$firstName = "Elizabeth";
$statement->bindParam ( ":firstName", $firstName ); // Only binds at execute time
$statement->execute ();
$commentRows = $statement->fetchAll ();
foreach ( $commentRows as $commentRow ) {
	echo ("<p>");
	print_r ( $commentRow ); // Just temporary
	echo "</p>"; // Just temporary
}
echo "Number of rows: " . count ( $commentRows );
?> 