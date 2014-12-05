<?php 
session_start();

if (isset($_SESSION['userLoginStatus']) &&
		    $_SESSION['userLoginStatus'] == 1) 
		  echo "Hello " . $_SESSION['userName'];
include("includer.php");   
$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
//echo "URL: $url <br>";
$urlPieces = split("/", $url);

//print_r($urlPieces);
if (count($urlPieces) < 2)
	$control = "none";
else 
	$control = $urlPieces[2];

switch ($control) {
	case "PostComment": 
		PostCommentController::run();
		break;
	case "CommentsController":
		CommentsController::run();
		break;
	case "LastCommentsController":
		LastCommentsController::run();
		break;
	case "RegisterController":
		RegisterController::run();
		break;
	case "LoginController":
		LoginController::run();
		break;
	default:
		ShowHome::show();
}
?>	


