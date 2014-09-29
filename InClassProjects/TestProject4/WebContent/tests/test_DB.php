<?php 
	$dsn = 'mysql:host=localhost;dbname=urlnoshdb';
	$username = 'root';
	$password = '';
	/* be able to throw an error */
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	/* PDO = php data object */
	$db = new PDO($dsn, $username, $password, $options);
	echo "Did it";
?>