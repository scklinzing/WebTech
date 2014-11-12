<?php
require_once(dirname(__FILE__)."/models/ImageData.class.php");
$myPath = dirname(__FILE__)."/./images/temp.png";
echo $myPath."<br>";
$testData = array();
$testData['tmp_name'] = $myPath;
$testData['size'] = filesize($myPath);
print_r($testData);

$myImage = new ImageData($testData);
echo $myImage->getImageWidth()."<br>";
echo $myImage;
?>