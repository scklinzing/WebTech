<?php
require_once('c:/Programs/simpletest/autorun.php');
require_once(dirname(__FILE__)."/../../WebContent/models/ImageData.class.php");
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
require_once(dirname(__FILE__)."/makeTestDB.php");

class ImageDataTest extends UnitTestCase {
	private $testData;
	
	function __construct() {
		parent::__construct();
		makeTestDB('temp1');
	}
	
	function setUp() { // create a 300 x 400 image and fill with blue
		$myPath = dirname(__FILE__)."/temp.png";
		$im = imagecreatetruecolor(300, 400);
		$mycolor = imagecolorallocate($im, 0, 0, 255);
		imagefill($im, 0, 0, $mycolor);
		imagepng($im, $myPath);
		$this->testData = array();
		$this->testData['tmp_name'] = $myPath;
		$this->testData['size'] = filesize($myPath);
		imagedestroy($im);
	}
	
	function tearDown() { // create a 300 x 400 image and fill with blue
		$myPath = dirname(__FILE__)."/temp.png";
		if (file_exists($myPath))
			unlink($myPath);
	}
	
	
	function test_emptyImageData() {
		// Tests that an empty ImageData object can be created
		$s1 = new ImageData();
		$this->assertNotNull($s1, "ImageData object for an empty constructor should not be null");
		$this->assertIsA($s1, 'ImageData', "Should be an ImageData object");
		$this->assertEqual($s1->getImageWidth(), 0,
				"width for an empty image should be 0 but is ".$s1->getImageWidth());
		$this->assertEqual($s1->getImageHeight(), 0,
				"Height for an empty image should be 0 but is ".$s1->getImageHeight());
		$this->assertEqual($s1->getErrorCount(), 0,
		        "It should not have errors but has ".$s1->getErrorCount()." errors");
	}
	
	function test_invalidEmptyInput() {
		// Tests that an invalid ImageData input 
		$inputData = array();
		$s1 = new ImageData($inputData);
		$this->assertNotNull($s1, "ImageData when no file name or image is provided");
		$this->assertIsA($s1, 'ImageData', "Should be an ImageData object");
		$this->assertEqual($s1->getErrorCount(), 1,
				"There should be 1 error, but there are ".$s1->getErrorCount(). " errors");
		$this->assertEqual($s1->getImageHeight(), 0,
				"Height for an invalid image should be 0 but is ".$s1->getImageHeight());
	}
	
	function test_read() {
		$s1 = new ImageData();
		print_r($this->testData);
		$image = $s1->readImage($this->testData['tmp_name']);
		print_r($image);
		$this->assertNotEqual($image, 0, "Shouldn't be 0");
	}
	
	function test_validInput() {
        //Tests valid ImageData
		$s1 = new ImageData($this->testData);
  		$this->assertNotNull($s1, "ImageData object $s1");
  		$this->assertTrue(is_a($s1, 'ImageData'), "Should be a ImageData object");
//   		$this->assertEqual($s1->getImageWidth(), 300, 
// 		      "It should have a width of 300, but has a width of ".$s1->getImageWidth());
  		print_r($s1);
  		$this->assertEqual($s1->getErrorCount(), 0, 
  				"It should not have errors, but has ".$s1->getErrorCount()." errors");
  		$this->assertNotEqual($s1->getImage(), "", "It should have a non-empty image");
        print_r($s1->getErrors());
	}
	
// 	function test_getParameters() {
// 		// Tests that UserProfileData returns a valid array when no errors
// 		$s1 = new UserProfileData($this->testData);
// 		$errorCount = $s1->getErrorCount();
// 		$this->assertEqual($errorCount, 0, 
// 				"It should have no errors for valid input, but has $errorCount errors");
// 		$params = $s1->getParameters();
// 		$this->assertEqual($params['userProfileEmail'], $this->testData['userProfileEmail'],
// 				"Returned userProfileEmail should be ".$this->testData['userProfileEmail'].
// 				" but is ".$params['userProfileEmail']);
// 		$this->assertEqual($params['userProfileFirstName'], $this->testData['userProfileFirstName'],
// 				"Returned userProfileFirstName should be ".$this->testData['userProfileFirstName']." but is ".
// 				$params['userProfileFirstName']);
// 		$this->assertEqual($params['userProfileLastName'], $this->testData['userProfileLastName'],
// 				"Returned userProfileLastName should be ".$this->testData['userProfileLastName']." but is ".
// 				$params['userProfileLastName']);
// 	}
	
// 	function test_invalidUserProfileEmail() {
// 		// Tests that UserData has an error when the email is invalid
// 		$this->testData['userProfileEmail'] = '$\xy^';
// 		$s1 = new UserProfileData($this->testData);
// 		$errorCount = $s1->getErrorCount();
// 		$this->assertTrue($errorCount > 0,
// 				"Error count should be greater than 0 for invalid email, but was ".
// 				$errorCount);
// 		$errors = $s1->getErrors();
// 		$this->assertTrue(isset($errors['userProfileEmail']),
// 				"Error message should be set for user profile email but was not");
// 		$this->assertFalse(empty($s1->getError('userProfileEmail')));
// 	}
	
	
}

?>