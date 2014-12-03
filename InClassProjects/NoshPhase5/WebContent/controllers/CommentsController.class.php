<?php  
class CommentsController {
	
  public static function run() {  	
	$myComments = CommentDB::getAll();
	ShowComments::show($myComments, "All comments");
  }
}
?>