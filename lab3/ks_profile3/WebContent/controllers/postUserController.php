<?php
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");

echo "In user controller<br>";
print_r($_POST);
$user = new UserData ( $_POST );
$id = UserDB::addUser ( $user );
echo "<hr><br>Add the user to the database and print out the information<br>";
$user->printUser ();
?>