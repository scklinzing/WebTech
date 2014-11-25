<?php
// This controller processes a POST for the username and then returns if it is taken or not
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");

   $reply = array();
   if (isset($_POST['username'])) {
      $username = $_POST['username'];
      $exists = UserDB::getUserByName($username);
      if ($exists > "0")
      	   echo '<p>The username <b>'.$username.'</b> is already in use.</p>';
      else 
      	   echo 'OK';
   }
?>