<?php
// Responsibility: Holds data for user login ONLY and performs validation
// Constructor expects an associative array with field values for initialization
class ChangePswdData {
	private $errorCount;
	private $errors;
	private $formInput;
	private $isAuthenticated;
	private $username;
	private $newPassword;
	private $oldPassword;

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
	public function getUsername() {
		return $this->username;
	}
	public function getNewPassword() {
		return $this->newPassword;
	}
	public function getPassword() {
		return $this->oldPassword;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("username" => $this->username,
				            "newPassword" => $this->newPassword,
							"oldPassword" => $this->oldPassword
		                   );
		return $paramArray;
	}
	

	public function __toString() {
		$str = "name:[".$this->username."] ".
		"newPassword:[" .$this->newPassword ."] ".
		"oldPassword:[" .$this->oldPassword ."]";
		return $str;
	}

	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		$this->isAuthenticated = false;
		$this->verifyUsername();	
		$this->verifyNewPassword();
	}
	
	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
		$this -> isAuthenticated = false;
		$this->username = "";
		$this->newPassword = "";
		$this->oldPassword = "";
	}
	
	private function stripInput($data) {
		// Require most data be free of blanks, slashes and special characters
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
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
	
	private function verifyNewPassword() {
		// The user newPassword should be a non-empty string if set.
		if (! isset ($this->formInput['newPassword']) ||
				empty($this->formInput['newPassword'])) {
					$this->newPassword = '';
					$this->errors['newPassword'] = "Non empty newPassword required";
					$this->errorCount++;
				return;	
		}
		$this->newPassword = $this->stripInput ( $this->formInput['newPassword']);
	    if (isset($this->formInput['newPasswordRetyped'])) {
	    	$retyped = $this->stripInput ($this->formInput['newPasswordRetyped']);
	    	if ($retyped != $this->newPassword) {
	    		$this->errors['newPassword'] = "Retyped newPassword doesn't agree";
	    		$this->errorCount++;
	    	}
	    }
	}
	
	private function verifyOldPassword() {
		// The user newPassword should be a non-empty string if set.
		if (! isset ($this->formInput['oldPassword']) ||
				empty($this->formInput['oldPassword'])) {
					$this->oldPassword = '';
					$this->errors['oldPassword'] = "Non empty current password required";
					$this->errorCount++;
					return;
				}
				$this->oldPassword = $this->stripInput ( $this->formInput['oldPassword']);
	}
	
}
?>