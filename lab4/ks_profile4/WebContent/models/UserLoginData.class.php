<?php
// Responsibility: Holds data for user login ONLY and performs validation
// Constructor expects an associative array with field values for initialization
class UserLoginData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $isAuthenticated;
	private $userDateCreated;
	private $userID;
	private $username;
	private $password;

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
	

	public function getUserID() {
		return $this->userID;
	}
	
	public function getUsername() {
		return $this->username;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("userID" => $this->userID,
				            "username" => $this->username,
				            "password" => $this->password,
				            "userDateCreated" => $this->userDateCreated,
				            "isAuthenticated" => $this->isAuthenticated
		                   );
		return $paramArray;
	}
	

	public function __toString() {
		$str = "Id:[".$this->userID."] name:[".$this->username."] ".
		"password:[" .$this->password ."] . is authenticated:[".
		$this->getIsAuthenticated(). "]";
		return $str;
	}

	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		$this->isAuthenticated = false;
		$this->verifyUserID();	
		$this->verifyUsername();	
		$this->verifyPassword();
		$this->verifyUserDateCreated();
	}
	
	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
		$this -> isAuthenticated = false;
		$this->userID = "";
		$this->username = "";
		$this->password = "";
		$this->userDateCreated = "";
	}
	
	private function stripInput($data) {
		// Require most data be free of blanks, slashes and special characters
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
	}
	
	private function verifyUserID() {
		// If userID is not empty it should be a positive integer
		if (!isset($this->formInput['userID']))
			$this->userID = '';
		else {
			$this->userID = $this->stripInput($this->formInput['userID']);
            if (!filter_var($this->userID, FILTER_VALIDATE_INT)) {
            	$this->errors['userID'] = "User Id is not a valid integer";
            	$this->errorCount++;
            } elseif ((int)$this->userID <= 0) {
            	$this->errors['userID'] = "User Id must be a positive integer";
            	$this->errorCount++;
            }
		}		
	}
	
	private function verifyUsername() {
		// The user name must be a non empty string with only alpha numeric characters, dashes and underscores
		if (! isset ($this->formInput['username']) || 
		     empty($this->formInput['username'])) {
			$this->username = '';
			$this->errors ['username'] = "User name is required";
			$this->errorCount ++;
		} else {
			$this->username = $this->stripInput ( $this->formInput['username']);
			if (! filter_var ( $this->username, FILTER_VALIDATE_REGEXP,
		                       array("options"=>array("regexp" =>"/^([a-zA-Z0-9\-\_])+$/i")) )) {
				$this->errors ['username'] = "User name can only contain letters, numbers, dashes and underscores";
				$this->errorCount ++;
		    }
		}
	}
	
	private function verifyPassword() {
		// The user password should be a non-empty string if set.
		if (! isset ($this->formInput['password']) ||
				empty($this->formInput['password'])) {
					$this->password = '';
					$this->errors['password'] = "Non empty password required";
					$this->errorCount++;
				return;	
		}
		$this->password = $this->stripInput ( $this->formInput['password']);
	    if (isset($this->formInput['passwordRetyped'])) {
	    	$retyped = $this->stripInput ($this->formInput['passwordRetyped']);
	    	if ($retyped != $this->password) {
	    		$this->errors['password'] = "Retyped password doesn't agree";
	    		$this->errorCount++;
	    	}
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