<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>XML simplexml demo</title>
<link href="bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h1>PhP simpleXML parser examples</h1>

<p>These examples were adapted from the W3C tutorials at <a href="http://www.w3schools.com/php/php_xml_parsers.asp">
http://www.w3schools.com/php/php_xml_parsers.asp</a></p>

<h2>Top level from a string</h2>
<?php
$myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";

$xml = simplexml_load_string ( $myXMLData );
print_r ( $xml );
?>

<h2>Multiple levels from a file</h2>

<?php
$xml = simplexml_load_file ( "books.xml" );
echo $xml->book [0]->title . "<br>";
echo $xml->book [1]->title . "<br>";

echo "<h3>Here is the entire array</h3>";
print_r ( $xml );
?> 

<h2>As child nodes</h2>

<?php
$xml = simplexml_load_file ( "books.xml" );
foreach ( $xml->children () as $books ) {
	echo $books->title . ", ";
	echo $books->author . ", ";
	echo $books->year . ", ";
	echo $books->price . "<br>";
}
?> 

<h2>Extracting attributes</h2>

<?php
$xml = simplexml_load_file ( "books.xml" );
echo $xml->book [0] ['category'] . "<br>";
echo $xml->book [1]->title ['lang'];
?> 

<h2>Attributes in a loop</h2>

<?php
$xml = simplexml_load_file ( "books.xml" ) or die ( "Error: Cannot create object" );
foreach ( $xml->children () as $books ) {
	echo $books->title . " is in language " . $books->title ['lang'];
	echo "<br>";
}
?> 
</div>
</body>