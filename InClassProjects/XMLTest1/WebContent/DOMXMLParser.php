<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PhP DOM parser demo</title>
<link href="bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>PhP DOM parser examples</h1>

<p>These examples were adapted from the W3C tutorials at <a href="http://www.w3schools.com/php/php_xml_parsers.asp">
http://www.w3schools.com/php/php_xml_parsers.asp</a></p>
		
<h2>Top level from a string</h2>
<?php
$myXMLData =
"<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";


$xmlDoc = new DOMDocument();
$xmlDoc->loadXML($myXMLData);

print $xmlDoc->saveXML();
?> 


<h2>Multiple levels from a file</h2>

<?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("books.xml");

print $xmlDoc->saveXML();
?>

<h2>As child nodes</h2>

<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("books.xml");

$x = $xmlDoc->documentElement;
foreach ($x->childNodes AS $item) {
  print $item->nodeName . " = " . $item->nodeValue . "<br>";
}
?> 


</div>
</body>