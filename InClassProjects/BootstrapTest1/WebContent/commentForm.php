
<!DOCTYPE html>
<html>
<head>
<title>URL NOSH Comment Form</title>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name= "keywords" content="URL NOSH, Members, URL evaluation">
<meta name="description" content = "Evaluation form for URLs">
<link href="bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h1>NOSH URL Survey</h1>
<p>Give us your candid comments about a URL worth consideration.</p>


<form class="form-vertical" role="form" action ="../controllers/postCommentController.php" method="Post">

<div class="form-group">
<label for="evalUrl">URL for evaluation:</label>
<input class="form-control" type="url" name ="evaluationUrl" id="evalUrl"> 
<span class="error"></span>
</div>

<div class="form-group">
<label for="critique">Give us your critique: <span class="error"></span></label>
<textarea class="form-control" name = "comment" placeholder = "Your comments go here" id = "critique">
</textarea>
</div>



<p>This comment addresses:</p>
<div class="checkbox">
<label><input type="checkbox" name="commentTagList[]" value ="layout">Site layout</label> 
</div>
<div class="checkbox">
<label><input type="checkbox" name="commentTagList[]" value ="colors">Color scheme</label>
</div> 
<div class="checkbox">
<label><input type="checkbox" name="commentTagList[]" value ="semantics">Semantic organization</label>
</div>
<div class="checkbox">
<label><input type="checkbox" name="commentTagList[]" value ="content">Content</label>
</div>


<p> Nosh member type:</p>
<div class="radio-inline">
<label><input type="radio" name="memberClassName" value = "reader">Reader</label>
</div>
<div class="radio-inline">
<label><input type = "radio" name="memberClassName" value = "nosher">Nosher</label>
</div>
<div class="radio-inline">
<label><input type = "radio" name="memberClassName" value = "moderator">Moderator</label>
</div> 
<span class="error"></span>


<p><button class="btn btn-default" type = "submit" name = "submit" value="Submit">Submit</button></p>
</form>
</div>
</body>
   <script src="jquery/jquery-2.1.1.min.js"></script>
    <script src="bootstrap/3.3.0/js/bootstrap.min.js"></script>
</html>
