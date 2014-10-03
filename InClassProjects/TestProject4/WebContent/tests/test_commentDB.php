<?php
include_once ("../models/CommentDB.class.php");
include_once ("../models/Database.class.php");
include_once ("../models/CommentData.class.php");
echo "<h1>Tests for CommentDB class";
echo "<h2>It should fetch the entire comment table</h2>";
$myComments = CommentDB::fetchAll ();
foreach ( $myComments as $comment )
	$comment->printComment ();
?>