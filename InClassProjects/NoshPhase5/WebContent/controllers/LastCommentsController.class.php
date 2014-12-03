<?php  
class LastCommentsController {
	
  public static function run() {  	
	$myComments = CommentDB::getLastNComments(3);
	ShowComments::show($myComments, "Last 3 comments");
  }
}
?>