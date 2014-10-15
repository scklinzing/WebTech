<?php
include_once("../models/MemberClassesDB.class.php");

echo "<h1>Tests for postCommentController </h1><hr>";

echo "<hr><h2>It should add a comment to the database when a valid form is filled out</h2><hr>";

$_POST = array("evaluationUrl" => "http://npr.org",
		        "comment" => "This is my comment",
		        "memberClassName" => "reader",
                "commentTagList" => array("colors", "layout"));
print_r($_POST);
include_once("../controllers/postcommentController.php"); //Make sure you understand

?>