<?php
// Responsibility: Holds data for user profile and performs validation
// Constructor expects an associative array with field values for initialization
class UserProfileData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $userProfileDateModified;
	private $userProfileEmail;
	private $userProfileFirstName;
	private $userProfileId;
	private $userProfileLastName;
	private $userId;


	public function __construct($formInput = null) {
		$this->formInput = $formInput;
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
	
	public function getUserId() {
		return $this->userId;
	}
	
	public function getUserProfileDateModified() {
		return $this->userProfileDateModified;
	}
	
	public function getUserProfileEmail() {
		return $this->userProfileEmail;
	}
	
	
	public function getUserProfileFirstName() {
		return $this->userProfileFirstName;
	}
		
	public function getUserProfileId() {
		return $this->userProfileId;
	}
	
	public function getUserProfileLastName() {
		return $this->userProfileLastName;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("userProfileId" => $this->userProfileId,
				            "userProfileEmail" => $this->userProfileEmail,
		                    "userProfileFirstName" => $this->userProfileFirstName,
				            "userProfileLastName" => $this->userProfileLastName,
				            "userId" => $this->userId,
				            "userProfileDataModified" => $this->userProfileDateModified
		                   );
		return $paramArray;
	}
	

	
	public function __toString() {
		$str = "User profile Id:[".$this->userProfileId. "]" .
		" First name:[".$this->userProfileFirstName."]" . 
	    " Last name:[".$this->userProfileLastName."]" .
		" Email:[".$this->userProfileEmail."]" .
		" User Id:[".$this->userId."]";
		return $str;
	}

	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		$this->verifyUserProfileId();	
		$this->verifyUserProfileEmail();
		$this->verifyUserProfileFirstName();
		$this->verifyUserProfileLastName();
		$this->verifyUserProfileDateModified();
		$this->verifyUserId();
	}
	
	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
		$this->userProfileId = "";
		$this->userEmail = "";
		$this->userProfileFirstName = "";
		$this->userProfileLastName = "";
		$this->userProfileDateModified = "";
		$this->userId = "";
	}
	
	private function stripInput($data) {
		// Require most data be free of blanks, slashes and special characters
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
	}
	
	private function verifyUserProfileId() {
		// If userProfileId is not empty it should be a positive integer
		if (!isset($this->formInput['userProfileId']))
			$this->userProfileId = '';
		else {
			$this->userProfileId = $this->stripInput($this->formInput['userProfileId']);
            if (!filter_var($this->userProfileId, FILTER_VALIDATE_INT)) {
            	$this->errors['userProfileId'] = "User profile Id is not a valid integer";
            	$this->errorCount++;
            } elseif ((int)$this->userProfileId <= 0) {
            	$this->errors['userProfileId'] = "User profile Id must be a positive integer";
            	$this->errorCount++;
            }
		}		
	}
	
	private function verifyUserId() {
		// If userId is not empty it should be a positive integer
		if (!isset($this->formInput['userId']))
			$this->userId = '';
		else {
			$this->userId = $this->stripInput($this->formInput['userId']);
			if (!filter_var($this->userId, FILTER_VALIDATE_INT)) {
				$this->errors['userId'] = "User Id is not a valid integer";
				$this->errorCount++;
			} elseif ((int)$this->userId <= 0) {
				$this->errors['userId'] = "User Id must be a positive integer";
				$this->errorCount++;
			}
		}
	}
	
	private function verifyUserProfileEmail() {
		// The user email must be a non-empty valid email
		if (! isset ( $this->formInput['userProfileEmail'] ) ||
				empty($this->formInput['userProfileEmail'])) {
					$this->userProfileEmail = '';
					$this->errors ['userProfileEmail'] = "User email is required";
					$this->errorCount ++;
				} else {
					$this->userProfileEmail = $this->stripInput ( $this->formInput['userProfileEmail'] );
					$this->userProfileEmail = strtolower($this->userProfileEmail);
					if (! filter_var ( $this->userProfileEmail, FILTER_VALIDATE_EMAIL )) {
						$this->errors ['userProfileEmail'] = "User email  is not valid";
						$this->errorCount ++;
					}
				}
	}
	
	private function verifyUserProfileFirstName() {
		// Just do base filtering at this point
		if (isset($this->formInput['userProfileFirstName']))
			$this->userProfileFirstName =
			$this->stripInput ($this->formInput['userProfileFirstName']);
	}
	
	private function verifyUserProfileLastName() {
		// Just do base filtering at this point
		if (isset($this->formInput['userProfileLastName']))
			$this->userProfileLastName =
			$this->stripInput ($this->formInput['userProfileLastName']);
	}
	
	private function verifyUserProfileDateModified() {
		// Just do base filtering at this point
		if (isset($this->formInput['userProfileDateModified']))
			$this->userProfileDateModified = 
		           $this->stripInput ($this->formInput['userProfileDateModified']);
	}
}
?>