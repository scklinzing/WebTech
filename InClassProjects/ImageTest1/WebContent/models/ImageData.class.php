<?php
// Responsibility: Holds an image -- either coming in from a true color image 
// in the 'image' entry or from a temporary file in the tmp_name file
class ImageData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $image;
	private $imageHeight;
	private $imageWidth;
	private $sizeLimit;

	public function __construct($formInput = null, $sizeLimit = 5000000) {
		$this->formInput = $formInput;
		$this->sizeLimit = $sizeLimit;
		if (is_null($formInput))
			$this->initializeEmpty();
	    else
		    $this->initialize();
	}
	
	public function getError($errorName) {
		if (isset($this->errors[$errorName]))
			return $this->errors[$errorName];
		else
			return "";
	}
	
	public function getErrorCount() {
		return $this->errorCount;
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
	public function getImage() {
		return $this->image;
	}
	
	public function setImage($image) {
		if (!imageistruecolor($image)) {
			setError("image", "Image is not a true color image");
			return;
		} 
		$this->imageWidth = imagesx($image);
		$this->imageHeight = imagesy($image);
		$this->image = $image;
	}
	
	public function getImageHeight() {
		return $this->imageHeight;
	}
	
	
	public function getImageWidth() {
		return $this->imageWidth;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("imageHeight" => $this->imageHeight,
		                    "imageWidth" => $this->imageWidth,
				            "image" => $this->image
		                   );
		return $paramArray;
	}
	

	public function __toString() {
		$str = "Image height:[".$this->imageHeight."]" . 
	    " Image width:[".$this->imageWidth."]";
		return $str;
	}
	
	public function readImage($path) {
		//Reads a true color image from $path
		$image = false;
		$imageInfo = getimageSize($path);
		if ($imageInfo)  {
			switch($imageInfo[2]) {
		       case IMAGETYPE_JPEG:
				   $image = imagecreatefromjpeg($path);
			       break;
		       case IMAGETYPE_GIF:
		       	   $image = imagecreatefromgif($path);
		       	   break;
		       case IMAGETYPE_PNG:
		       	   $image = imagecreatefrompng($path);
		       	   break;
			}
		}
		return $image;
	}

	private function initialize() {
		$this->initializeEmpty();
		if (isset($this->formInput['tmp_name']))  
		   $this->verifyFileImage();
		else
		   $this->setError('image', 'Invalid image');	
	}
	
	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
		$this->imageHeight = 0;
		$this->imageWidth = 0;
		$this->image = null;
	}
	
	private function verifyFileImage() {
		if (!file_exists($this->formInput['tmp_name'])) {
			$this->setError("image", "Image file does not exist");
			return;
		} elseif (!isset($this->formInput['size']) ||
			$this->formInput['size'] > $this->sizeLimit) {
			$this->setError("image", "Image must be less than ".$this->sizeLimit." bytes");
			return;
		}
		$image = $this->readImage($this->formInput['tmp_name']);
		if (!$image)
			$this->setError("image", "Image file does not contain a valid image");
		else
		    $this->setImage($image);
	}
	
	private function setError($type, $msg) {
		$this->errors[$type] = $msg;
		$this->errorCount++;
	}
	
	private function stripInput($data) {
		// Require most data be free of blanks, slashes and special characters
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
	}
	
}
?>