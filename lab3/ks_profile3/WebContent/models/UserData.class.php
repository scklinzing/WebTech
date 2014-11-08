<?php
/**
 * username, email, password, phoneNum, website, color, bday, whyRatChat, ratsOwned, interestList
 * 
 * Responsibility: Holds data for user and performs validation
 * Constructor expects an associative array with field values for initialization
 */
class UserData {
	
	/* user variables */
	private $errorCount;
	private $errors;
	private $formInput;
	private $isAuthenticated;
	private $userID;
	private $username;
	private $password;
	private $email;
	private $phoneNum;
	private $website;
	private $favcolor;
	private $bday;
	private $whyRatChat;
	private $ratsOwned;
	private $interestList;
	private $userDateCreated;
	
	/* constructor */
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
	
	/* getters and setters for UserData */
	public function getIsAuthenticated() {
		return $this->isAuthenticated;
	}
	public function setIsAuthenticated($isAuth) {
		$this->isAuthenticated = $isAuth;
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
	public function getUserDateCreated() {
		return $this->userDateCreated;
	}
	
	/* be able to grab the parameters */
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("userID" => $this->userID,
				            "username" => $this->username,
				            "password" => $this->password,
							"email" => $this->email,
							"phoneNum" => $this->phoneNum,
							"website" => $this->website,
							"favcolor" => $this->favcolor,
							"bday" => $this->bday,
							"whyRatChat" => $this->whyRatChat,
							"ratsOwned" => $this->ratsOwned,
							"interestList" => $this->interestList,
				            "userDataCreated" => $this->userDateCreated,
				            "isAuthenticated" => $this->isAuthenticated
		                   );
		return $paramArray;
	}
	
	/* be able to print out the user data */
	public function __toString() {
		$str = "Id:[".$this->userID."] name:[".$this->username."] " .
				"password:[" .$this->password ."] . is authenticated:[" .
				$this->getIsAuthenticated(). "]" .
				"email:[".$this->email."]" .
				"phoneNum:[".$this->phoneNum."]" .
				"website:[".$this->website."]" .
				"favcolor:[".$this->favcolor."]" .
				"bday:[".$this->bday."]" .
				"whyRatChat:[".$this->whyRatChat."]" .
				"ratsOwned:[".$this->ratsOwned."]";
		return $str;
	}
	
	/* initialize all the variables */
	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		$this->isAuthenticated = false;
		$this->verifyUserID();	
		$this->verifyUsername();	
		$this->verifyPassword();
		$this->verifyEmail();
		$this->verifyPhoneNum();
		$this->verifyWebsite();
		$this->verifyFavcolor();
		$this->verifyBday();
		$this->verifyWhyRatChat();
		$this->verifyRatsOwned();
		$this->verifyInterestList();
		$this->verifyUserDateCreated();
	}
	
	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
		$this -> isAuthenticated = false;
		$this->userID = "";
		$this->username = "";
		$this->password = "";
		$this->email = "";
		$this->phoneNum = "";
		$this->website = "";
		$this->favcolor = "";
		$this->bday = "";
		$this->whyRatChat = "";
		$this->ratsOwned = "";
		$this->interestList = array();
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
		// The comment tag list should contain valid entries
		$this->interestList = array ();
		if (! isset ( $this->formInput ['interestList'] ))
			return;
		elseif (! is_array ( $this->formInput ['interestList'] )) {
			$this->errors ['interestList'] = "Interest list should be a list";
			$this->errorCount ++;
		} else { // Counts multiple bad tags as only one error, but lists all bad tags
			$list = $this->formInput ['interestList'];
			for($k = 0; $k < count ( $list ); $k ++) {
				$nextTag = $this->stripInput ( $list [$k] );
				array_push ( $this->interestList, $nextTag );
				if (! empty ( $this->interestListMap ) && ! array_key_exists ( $nextTag, $this->interestListMap )) {	
					if (isset ( $this->errors ['interestList'] ))
						$this->errors ['interestList'] = $this->errors ['interestList'] . "[$nextTag]";
					else {
						$this->errors ['interestList'] = "Invalid interest: [$nextTag]";
						$this->errorCount ++;
					}
				}
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