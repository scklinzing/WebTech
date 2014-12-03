<?php  
class PostCommentController {
	
  public static function run() {  	
	if ($_SERVER ["REQUEST_METHOD"] == "POST") {
		$memberClassMap = MemberClassesDB::getMap ( 'memberClassName', 'memberClassId' );
		$tagMap = CommentTagsDB::getMap ( 'commentTagName', 'commentTagId' );
		$comment = new CommentData ( $_POST, $memberClassMap, $tagMap );
		if ($comment->getErrorCount () == 0) {
			$id = CommentDB::addComment ( $comment );
			$comment = CommentDB::getCommentById ( $id );
			ShowComment::show ( $comment );
		} else {
			CommentForm::show ( $comment );
		}
	} else {
		$comment = new CommentData ();
		CommentForm::show ( $comment );
	}
  }
}
?>