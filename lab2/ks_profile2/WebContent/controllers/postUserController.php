<?php
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
$s1 = new UserData ( $_POST );
$parms = $s1->getParameters ();
$id = UserDB::addUser ( $parms );
$s1->printUser ();
?>