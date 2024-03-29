<?php
include_once(dirname(__FILE__)."/../models/CommentData.class.php");
include_once(dirname(__FILE__)."/../models/CommentDB.class.php");
include_once(dirname(__FILE__)."/../models/Database.class.php");
include_once(dirname(__FILE__)."/../views/showComment.php");
include_once(dirname(__FILE__)."/../views/commentForm.php");
include_once(dirname(__FILE__)."/../models/MemberClassesDB.class.php");
include_once(dirname(__FILE__)."/../models/CommentTagsDB.class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $memberClassMap = MemberClassesDB::getMap('memberClassName', 'memberClassId');
   $tagMap = CommentTagsDB::getMap('commentTagName', 'commentTagId');	
   $comment = new CommentData($_POST, $memberClassMap, $tagMap);
   if ($comment->getErrorCount() == 0) {  
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