<?php
// Temporary code for trying out insert
$dsn = 'mysql:host=localhost;dbname=urlnoshdb';
$username = 'root';
$password = '';
$options = array (
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
);
$db = new PDO ( $dsn, $username, $password, $options );
echo "<h1>Testing PDO before putting into code</h1>";
echo "<h3>Executing select all query to see what is in Database</h3>";
$query = "SELECT * FROM Comments";
$statement = $db->prepare ( $query );
$statement->execute ();
$commentRows = $statement->fetchAll ();
foreach ( $commentRows as $commentRow ) {
	echo ("<p>");
	print_r ( $commentRow ); // Just temporary
	echo "</p>"; // Just temporary
}
echo "<hr><h3>Executing insert query</h3>";
$myParameters = array (
		"firstName" => "Elizabeth",
		"evaluationUrl" => "http://yahoo.com",
		"comment" => "Has a configurable user homepage" 
);
$query = "INSERT INTO Comments (firstName, evaluationUrl, comment)
VALUES(:firstName, :evaluationUrl, :comment)";
$statement = $db->prepare ( $query );
$statement->execute ( $myParameters );
echo "<h3>Executing select all query to see if inserted</h3><hr>";
$query = "SELECT * FROM Comments";
$statement = $db->prepare ( $query );
$statement->execute ();
$commentRows = $statement->fetchAll ();
foreach ( $commentRows as $commentRow ) {
	echo ("<p>");
	print_r ( $commentRow ); // Just temporary
	echo "</p>"; // Just temporary
}
?> 