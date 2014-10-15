<?php
include_once("../models/CommentData.class.php");
include_once("../models/CommentDB.class.php");
include_once("../models/Database.class.php");
include_once("../views/showComment.php");
include_once("../models/MemberClassesDB.class.php");
echo "In comment controller<br>";   // temporary
print_r($_POST);                    // temporary
$s1 = new CommentData($_POST);
$s1->printComment();                // temporary
echo "Now adding to database...<br>"; // temporary
$id = CommentDB::addComment($s1);
$comment = CommentDB::getCommentById($id);
showComment($comment);
?>