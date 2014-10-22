<?php
include_once(dirname(__FILE__)."/../models/CommentData.class.php");
include_once(dirname(__FILE__)."/../models/CommentDB.class.php");
include_once(dirname(__FILE__)."/../models/Database.class.php");
include_once(dirname(__FILE__)."/../views/showComment.php");
include_once(dirname(__FILE__)."/../models/MemberClassesDB.class.php");
include_once(dirname(__FILE__)."/../models/CommentTagsDB.class.php");

$s1 = new CommentData($_POST);
$id = CommentDB::addComment($s1);
$comment = CommentDB::getCommentById($id);
showComment($comment);
?>