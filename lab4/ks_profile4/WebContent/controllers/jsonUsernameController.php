<?php
// This controller processes a POST for the username and then returns if it is taken or not
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");

   $reply = array();
   if (!isset($_POST['username']) || empty($_POST['username'])) 
       $reply['error'] = 'No user name';
   else {
      $reply['username'] = $_POST['username'];
      $exists = UserDB::getUserByName($reply['username']);
      if ($exists > "0")
      	   echo '<font color="red">The nickname <STRONG>'.$reply['username'].'</STRONG> is already in use.</font>';
      else 
      	   echo "OK";
   }
     
   //echo json_encode($reply);
?>

