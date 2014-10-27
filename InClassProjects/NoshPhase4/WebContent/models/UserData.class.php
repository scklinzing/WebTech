<?php
// Responsibility: Holds data for user login/registration and performs validation
// Constructor expects an associative array with field values for initialization
class UserData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $isauthenticated;
	private $userDateCreated;
	private $userId;
	private $userName;
	private $userPassword;

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
	
	public function setError($errorName, $errorValue) {
		// Sets a particular error value and increments error count
		$this->errors[$errorName] = $errorValue;
		$this->errorCount ++;
	}
	
	public function getErrorCount() {
		return $this->errorCount;
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
	public function getIsAuthenticated() {
		return $this->isAuthenticated;
	}
	
	public function setIsAuthenticated($isAuth) {
		$this->isAuthenticated = $isAuth;
	}
	
	public function getUserDateCreated() {
		return $this->userDateCreated;
	}
	

	public function getUserId() {
		return $this->userId;
	}
	
	public function getUserName() {
		return $this->userName;
	}
	
	public function getUserPassword() {
		return $this->userPassword;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("userId" => $this->userId,
				            "userName" => $this->userName,
				            "userPassword" => $this->userPassword,
				            "userDataCreated" => $this->userDateCreated,
				            "isAuthenticated" => $this->isAuthenticated
		                   );
		return $paramArray;
	}
	
	public function printUser() {
		echo "<h1>URL Nosh Member</h1>";
		echo "User Id: $this->userId<br>";
		echo "User name: $this->userName<br>";
		echo "Date created: $this->userDateCreated<br>";
		echo "Is authenticated: $this->isAuthenticated<br>";
	}
	
	public function __toString() {
		$str = "Id:[".$this->userId."] name:[".$this->userName."] ".
		"password:[" .$this->userPassword ."] . is authenticated:[".
		$this->getIsAuthenticated(). "]";
		return $str;
	}

	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		$this->isAuthenticated = false;
		$this->verifyUserId();	
		$this->verifyUserName();	
		$this->verifyUserPassword();
		$this->verifyUserDateCreated();
	}
	
	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
		$this -> isAuthenticated = false;
		$this->userId = "";
		$this->userName = "";
		$this->userPassword = "";
		$this->userDateCreated = "";
	}
	
	private function stripInput($data) {
		// Require most data be free of blanks, slashes and special characters
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
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
	
	private function verifyUserName() {
		// The user name must be a non empty string
		if (! isset ($this->formInput['userName']) || 
		     empty($this->formInput['userName'])) {
			$this->userName = '';
			$this->errors ['userName'] = "User name is required";
			$this->errorCount ++;
		} else {
			$this->userName = $this->stripInput ( $this->formInput['userName']);
		}
	}
	
	private function verifyUserPassword() {
		// The user password should be a non-empty string if set.
		if (! isset ($this->formInput['userPassword']) ||
				empty($this->formInput['userPassword'])) {
					$this->userPassword = '';
				} else {
					$this->userPassword = $this->stripInput ( $this->formInput['userPassword']);
				}
	}
	
	private function verifyUserDateCreated() {
		// Just do base filtering at this point
		if (isset($this->formInput['userDateCreated']))
			$this->userDateCreated = 
		           $this->stripInput ($this->formInput['userDateCreated']);
	}
}
?>