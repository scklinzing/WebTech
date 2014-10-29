<?php 
	$dsn = 'mysql:host=localhost;dbname=ks_data';
	$username = 'root';
	$password = '';
	/* be able to throw an error */
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	/* PDO = php data object */
	$db = new PDO($dsn, $username, $password, $options);
	
	echo "Executing Query<br>";
	/* select everything from users */
	$query = "SELECT * FROM User";
	/* prepare the query */
	$statement = $db->prepare($query);
	/* execute the statement */
	$statement->execute();
	
	/* fetch everything from the statement (this will be an array) */
	$userRows = $statement->fetchAll();
	/* print r user rows */
	print_r($userRows);
?>