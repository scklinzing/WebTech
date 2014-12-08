<?php
if (!isset($_SERVER['HTTPS'])) {
	$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	header("LOcation: " .$url);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Forcing a secure page</title>
</head>
<body>
<h1>This page doesn't do much except force connection through https</h1>

</body>
</html>