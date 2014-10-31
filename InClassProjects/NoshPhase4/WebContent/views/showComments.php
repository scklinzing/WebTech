<?php
// Displays a list of all comments 
// Input: an array of CommentData objects
function showComments($commentList, $msg) {
	echo "<h1>" . $msg . "</h1>";
	
	foreach ( $commentList as $comment ) {
		echo "<h1>URL Nosh Member Comment</h1>";
		echo "Comment Id: ".$comment->getCommentId()."<br>";
		echo "Evaluation url: ".$comment->getEvaluationUrl()."<br>";
		echo "Comment: ".$comment->getComment()."<br>";
		echo "Member class: ".$comment->getMemberClassName()."<br>";
		$tags = $comment->getCommentTagList ();
		echo "Comment tags: [ ";
		for($k = 0; $k < count ( $tags ); $k ++)
			echo $tags [$k] . " ";
		echo "]<br>";
		echo "Date created: ".$comment->getCommentDateCreated()."<br>";
	}
	
	echo '<h3><a href="../index.php">Back to home</a>';
}
?>