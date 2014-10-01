<?php 
	$dsn = 'mysql:host=localhost;dbname=urlnoshdb';
	$username = 'root';
	$password = '';
	/* be able to throw an error */
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	/* PDO = php data object */
	$db = new PDO($dsn, $username, $password, $options);
	
	echo "Executing Query<br>";
	/* select everything from comments */
	$query = "SELECT * FROM Comments";
	/* prepare the query */
	$statement = $db->prepare($query);
	/* execute the statement */
	$statement->execute();
	
	/* fetch everything from the statement (this will be an array) */
	$commentRows = $statement->fetchAll();
	/* print r comment rows */
	print_r($commentRows);
?>