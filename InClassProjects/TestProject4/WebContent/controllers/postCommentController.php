<?php
include_once ("../models/CommentData.class.php");
include_once ("../models/CommentDB.class.php");
include_once ("../models/Database.class.php");
$s1 = new CommentData ( $_POST );
$parms = $s1->getParameters ();
$id = CommentDB::addComment ( $parms );
$s1->printComment ();
?>