<?php
include_once(dirname(__FILE__)."/../views/showComments.php");
include_once(dirname(__FILE__)."/../models/CommentDB.class.php");
include_once(dirname(__FILE__)."/../models/CommentData.class.php");
include_once(dirname(__FILE__)."/../models/Database.class.php");

$myComments = CommentDB::getLastNComments(3);
showComments($myComments, "Last 3 comments");
?>