<?php
include_once(dirname(__FILE__)."/../models/CommentData.class.php");
include_once(dirname(__FILE__)."/../models/CommentDB.class.php");
include_once(dirname(__FILE__)."/../models/Database.class.php");
include_once(dirname(__FILE__)."/../views/showComment.php");
include_once(dirname(__FILE__)."/../views/commentForm.php");
include_once(dirname(__FILE__)."/../models/MemberClassesDB.class.php");
include_once(dirname(__FILE__)."/../models/CommentTagsDB.class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $comment = new CommentData($_POST);
   if ($comment->getErrorCount() == 0) {
	   //header('Location: http://www.yoursite.com/new_page.html' ))   
        $id = CommentDB::addComment($comment);
        $comment = CommentDB::getCommentById($id);
        showComment($comment);
    } else {
    	commentForm($comment);	
    }
} else {
	$comment = new CommentData();
	commentForm($comment);
}

?>