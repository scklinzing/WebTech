<?php
echo $_POST["username"]."<br>";
$options = array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$db = new PDO("mysql:host=localhost;dbname=userdb", "root", "", $options);
$rows = $db->query("SELECT email FROM users WHERE username = '" .$_POST["username"] ."'");
foreach ($rows as $row) {
	print_r($row);
}
