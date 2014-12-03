<?php  
class CommentForm {
	
  public static function show($c) {  	
?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>URL NOSH Comment Form</title>
	<meta name= "keywords" content="URL NOSH, Members, URL evaluation">
	<meta name="description" content = "Evaluation form for URLs">
	</head>
	<body>
	
	<h1>NOSH URL Survey</h1>
	<p>Give us your candidate comments about a URL worth consideration.</p>
	<section>
	<form action ="PostCommentController" method="Post">
	URL for Evaluation:<input type="url" name ="evaluationUrl" 
	<?php if (!empty($c->getEvaluationUrl())) {echo 'value = "'. $c->getEvaluationUrl() .'"';}?>> 
	<span class="error"><?php echo $c->getError("evaluationUrl")?></span>
	
	<p>
	Give us your critique: <span class="error"><?php echo $c->getError("comment")?></span><br>
	<textarea name = "comment" placeholder = "Your comments go here" 
	<?php if (!empty($c->getComment())) {echo 'value = "'. $c->getComment() .'"';}?>
	 rows = "20" cols="60" >
	</textarea>
	
	</p>
	<fieldset>
	<legend>This comment addresses:</legend>
	<input type="checkbox" name="commentTagList[]" value ="layout">Site layout 
	<input type="checkbox" name="commentTagList[]" value ="colors">Color scheme 
	<input type="checkbox" name="commentTagList[]" value ="semantics">Semantic organization 
	<input type="checkbox" name="commentTagList[]" value ="content">Content 
	</fieldset>
	
	<p> Nosh member type:
	<input type="radio" name="memberClassName" value = "reader" 
	<?php if ($c->getMemberClassName() == "reader") {echo '"checked"';}?>>Reader 
	<input type = "radio" name="memberClassName" value = "nosher"
	<?php if ($c->getMemberClassName() == "nosher") {echo '"checked"';}?>>Nosher 
	<input type = "radio" name="memberClassName" value = "moderator"
	<?php if ($c->getMemberClassName() == "moderator") {echo '"checked"';}?>>Moderator 
	<span class="error"><?php echo $c->getError("memberClassName")?></span>
	</p>
	
	<p><input type = "submit" name = "submit" value="Submit"></p>
	</form>
	</section>
	</body>
	</html>
<?php 
}
}
?>