<?php
// Displays a list of all comments
// Input: an array of CommentData objects
function showComments($commentList) {
	echo "<h1>Here are the comments we have so far</h1>";
	foreach ( $commentList as $comment ) {
		$comment->printComment ();
	}
}
?>