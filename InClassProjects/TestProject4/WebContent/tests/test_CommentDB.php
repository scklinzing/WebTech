<?php
include_once ("../models/CommentDB.class.php");
include_once ("../models/Database.class.php");
include_once ("../models/CommentData.class.php");
echo "<h1>Tests for CommentDB class";
$testComment = array (
		"firstName" => "Granger",
		"evaluationUrl" => "http://yahoo1.com",
		"comment" => "Not here" 
);
$testComments = array (
		$testComment,
		$testComment 
);
echo "<h2>It should convert an array of associative arrays to an array of CommentData</h2>";
$testResults = CommentDB::getCommentArray ( $testComments );
echo "<hr>";
print_r ( $testResults );
echo "<hr><h2>It should fetch the entire comment table</h2>";
$myComments = CommentDB::fetchAll ();
foreach ( $myComments as $comment )
	$comment->printComment ();
echo "<hr>";
echo "<h2>It should insert a new comment</h2>";
$testComment = array (
		"firstName" => "Elizabeth",
		"evaluationUrl" => "http://yahoo.com",
		"comment" => "Has a configurable user homepage" 
);
$returnValue = commentDB::addComment ( $testComment );
echo "Adding a comment with ID " . strval ( $returnValue ) . "<br>";
echo "<hr><h2>It should get comments by first name</h2>";
$name = "Elizabeth";
$comments = commentDB::getCommentsByFirstName ( $name );
echo "<p>It returned " . count ( $comments ) . " comments by $name</p>";
echo "<hr><h2>It should get comments by Id</h2>";
for($k = 1; $k <= 10; $k ++) {
	$comment = commentDB::getCommentById ( $k );
	if (! is_null ( $comment )) {
		echo "$k: " . $comment->getFirstName () . "<br>";
	}
}
?>