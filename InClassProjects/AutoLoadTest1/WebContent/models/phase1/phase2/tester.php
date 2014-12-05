<!DOCTYPE html>
<html>
<head>
<title>Test autoloading</title>
</head>
<body>
<h1>Test of autoloading from the deeps</h1>

<?php
require_once dirname(__FILE__)."/../../../includer.php";

   $x = new User1();
   echo "User 1: $x <br>";
   $x = new User2();
   echo "User 2: $x <br>";
   $x = new User3();
   echo "User 3: $x <br>";
   $x = new User4();
   echo "User 4: $x <br>";
   $x = new User5();
   echo "User 5: $x <br>";
   $x = new User6();
   echo "User 6: $x <br>";
   $x = new User7();
   echo "User 7: $x <br>";
   $x = new User8();
   echo "User 8: $x <br>";
?>
</body>
</html>