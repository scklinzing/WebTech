<?php
// Responsibility: Holds data for user profile and performs validation
// Constructor expects an associative array with field values for initialization
class UserProfileData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $userProfileID;
	
	private $email;
	private $phoneNum;
	private $website;
	private $favcolor;
	private $bday;
	private $whyRatChat;
	private $ratsOwned;
	private $interestList;
	
	private $userProfileDateModified;

	public function __construct($formInput = null) {
		$this->formInput = $formInput;
		if (is_null($formInput))
			$this->initializeEmpty();
	    else
		    $this->initialize();
	}
	
	/* error handling functions */
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
	
	/* Getters and setters for UserProfileData */
	public function getuserProfileID() {
		return $this->userProfileID;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getPhoneNum() {
		return $this->phoneNum;
	}
	public function getWebsite() {
		return $this->website;
	}
	public function getFavColor() {
		return $this->favcolor;
	}
	public function getBDay() {
		return $this->bday;
	}
	public function getWhyRatChat() {
		return $this->whyRatChat;
	}
	public function getRatsOwned() {
		return $this->ratsOwned;
	}
	public function getInterestList() {
		return $this->interestList;
	}
	public function setInterestList($list) {
		$this->interestList = $list;
	}
	public function getUserProfileDateModified() {
		return $this->userProfileDateModified;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("userProfileID" => $this->userProfileID,
				            "email" => $this->email,
		                    "phoneNum" => $this->phoneNum,
							"website" => $this->website,
							"favcolor" => $this->favcolor,
							"bday" => $this->bday,
							"whyRatChat" => $this->whyRatChat,
							"ratsOwned" => $this->ratsOwned,
							"interestList" => $this->interestList,
				            "userProfileDataModified" => $this->userProfileDateModified
		                   );
		return $paramArray;
	}
	
	public function __toString() {
		$str = "ID:[".$this->userProfileID. "]" .
				"email:[".$this->email."]" .
				"phoneNum:[".$this->phoneNum."]" .
				"website:[".$this->website."]" .
				"favcolor:[".$this->favcolor."]" .
				"bday:[".$this->bday."]" .
				"whyRatChat:[".$this->whyRatChat."]" .
				"ratsOwned:[".$this->ratsOwned."]" .
				"interestList:[".$this->interestList."]";
		return $str;
	}
	
	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		$this->verifyUserProfileID();	
		$this->verifyEmail();
		$this->verifyPhoneNum();
		$this->verifyWebsite();
		$this->verifyFavcolor();
		$this->verifyBday();
		$this->verifyWhyRatChat();
		$this->verifyRatsOwned();
		$this->verifyInterestList();
		$this->verifyUserProfileDateModified();
	}
	
	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
		$this->userProfileID = "";
		$this->email = "";
		$this->phoneNum = "";
		$this->website = "";
		$this->favcolor = "";
		$this->bday = "";
		$this->whyRatChat = "";
		$this->ratsOwned = "";
		$this->interestList = "";
		$this->userProfileDateModified = "";
	}
	
	private function stripInput($data) {
		// Require most data be free of blanks, slashes and special characters
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
	}
	
	private function verifyUserProfileID() {
		// If userProfileID is not empty it should be a positive integer
		if (!isset($this->formInput['userProfileID']))
			$this->userProfileID = '';
		else {
			$this->userProfileID = $this->stripInput($this->formInput['userProfileID']);
            if (!filter_var($this->userProfileID, FILTER_VALIDATE_INT)) {
            	$this->errors['userProfileID'] = "User Id is not a valid integer";
            	$this->errorCount++;
            } elseif ((int)$this->userProfileID <= 0) {
            	$this->errors['userProfileID'] = "User profile Id must be a positive integer";
            	$this->errorCount++;
            }
		}		
	}
	
	/* --------------------- VERIFY THE INFORMATION FROM FORM --------------------- */
	private function verifyEmail() {
		// The user email must be a non-empty valid email
		if (! isset ( $this->formInput['email'] ) ||
				empty($this->formInput['email'])) {
					$this->email = '';
					$this->errors ['email'] = "User email is required";
					$this->errorCount ++;
				} else {
					$this->email = $this->stripInput ( $this->formInput['email'] );
					if (! filter_var ( $this->email, FILTER_VALIDATE_EMAIL )) {
						$this->errors ['email'] = "User email  is not valid";
						$this->errorCount ++;
					}
				}
	}
	private function verifyPhoneNum() {
		// Just do base filtering at this point
		if (isset($this->formInput['phoneNum']))
			$this->phoneNum =
			$this->stripInput ($this->formInput['phoneNum']);
	}
	private function verifyWebsite() {
		// Just do base filtering at this point
		if (isset($this->formInput['website']))
			$this->website =
			$this->stripInput ($this->formInput['website']);
	}
	private function verifyFavcolor() {
		// Just do base filtering at this point
		if (isset($this->formInput['favcolor']))
			$this->favcolor =
			$this->stripInput ($this->formInput['favcolor']);
	}
	private function verifyBday() {
		// Just do base filtering at this point
		if (isset($this->formInput['bday']))
			$this->bday =
			$this->stripInput ($this->formInput['bday']);
	}
	private function verifyWhyRatChat() {
		// Just do base filtering at this point
		if (isset($this->formInput['whyRatChat']))
			$this->whyRatChat =
			$this->stripInput ($this->formInput['whyRatChat']);
	}
	private function verifyRatsOwned() {
		// Just do base filtering at this point
		if (isset($this->formInput['ratsOwned']))
			$this->ratsOwned =
			$this->stripInput ($this->formInput['ratsOwned']);
	}
	private function verifyInterestList() {
		// Just do base filtering at this point
		if (isset($this->formInput['interestList']))
			$this->interestList =
			$this->stripInput ($this->formInput['interestList']);
	}
	private function verifyUserProfileDateModified() {
		// Just do base filtering at this point
		if (isset($this->formInput['userProfileDateModified']))
			$this->userProfileDateModified = 
		           $this->stripInput ($this->formInput['userProfileDateModified']);
	}
}
?>