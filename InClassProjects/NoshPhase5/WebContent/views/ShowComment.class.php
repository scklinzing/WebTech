<?php  
class ShowComment {
	
  public static function show($comment) {  	
?> 
	<!DOCTYPE html>
	<html>
	<head>
	<title>URL NOSH Register Form</title>
	<meta name= "keywords" content="URL NOSH, Members, Register">
	<meta name="description" content = "Register for URL Nosh">
	</head>
	<body> 
<?php 
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
	echo '<h3><a href="index.php">Back to home</a>';
	echo "</body></html>";
  }
}
?>