<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
<title>URL Nosh homepage</title>
</head>
<body>
<?php if (isset($_SESSION['userLoginStatus']) &&
		    $_SESSION['userLoginStatus'] == 1) 
		  echo "Hello " . $_SESSION['userName'];
		    ?>
<h1>URL Nosh</h1>
<em>Discerning web evaluators come to complain and evaluate.</em>

<h3><a href="controllers/postCommentController.php">Make comment here </a></h3>

<h3><a href="controllers/commentsController.php">See comments</a></h3>

<h3><a href="controllers/lastCommentsController.php">See last 3 comments</a></h3>

<h3><a href="controllers/registerController.php">Register as a new user</a></h3>

<h3><a href="controllers/loginController.php">Login</a></h3>

<h3>The footer goes here</h3>

</body>
</html>