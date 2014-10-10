<?php
include_once("../models/CommentData.class.php");
include_once("../models/CommentDB.class.php");
include_once("../models/Database.class.php");
include_once("../views/showComment.php");
echo "In comment controller<br>";
print_r($_POST);
$s1 = new CommentData($_POST);
$id = CommentDB::addComment($s1);
$comment = CommentDB::getCommentById($id);
showComment($comment);
?>