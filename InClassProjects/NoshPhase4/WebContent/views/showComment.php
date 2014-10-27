<?php
// Displays a comment Input: CommentData object
function showComment($comment) {
    $comment->printComment();
	echo '<h3><a href="../index.php">Back to home</a>';
}
?>