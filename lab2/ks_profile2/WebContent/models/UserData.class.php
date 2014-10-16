<?php
/**
 * username, email, password, phoneNum, website, color, bday, whyRatChat, ratsOwned
 * 
 * Responsibility: Holds data for user and performs validation
 * Constructor expects an associative array with field values for initialization
 */
class UserData {
	/* user variables */
	private $username;
	private $email;
	private $password;
	private $phoneNum;
	private $website;
	private $favcolor;
	private $bday;
	private $whyRatChat;
	private $ratsOwned;
	/* constructor */
	public function __construct($formInput) {
		$this->initialize ( $formInput );
	}
	/* get functions for UserData */
	public function getUsername() {
		return $this->username;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getPassword() {
		return $this->password;
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
	/* be able to grab the parameters */
	public function getParameters() {
		$paramArray = array (
				"username" => $this->username,
				"email" => $this->email,
				"password" => $this->password,
				"phoneNum" => $this->phoneNum,
				"website" => $this->website,
				"favcolor" => $this->favcolor,
				"bday" => $this->bday,
				"whyRatChat" => $this->whyRatChat,
				"ratsOwned" => $this->ratsOwned
		);
		return $paramArray;
	}
	/* be able to print out the user data */
	public function printUser() {
		echo "<h3>$this->username</h3><br>";
		echo "Email: $this->email<br>";
		echo "Password: $this->password<br>";
		echo "Phone Number: $this->phoneNum<br>";
		echo "Website: $this->website<br>";
		echo "Color: $this->favcolor<br>";
		echo "Birthday Month and Year: $this->bday<br>";
		echo "Reason on Rat Chat: ";
		switch($this->whyRatChat) {
			case 1:
				echo "I own rats.<br>";
				break;
			case 2:
				echo "I am looking into owning rats.<br>";
				break;
			default:
				echo "Other reason.<br>";
				break;
		}	
		echo "Rats Owned: $this->ratsOwned<br>";
	}
	/* initialize all the variables */
	private function initialize($formInput) {
		// debugging statements
		//echo "<br>Initial<br>";
		//print_r($formInput);
		if (isset ( $formInput ['username'] ))
			$this->username = $formInput ['username'];
		if (isset ( $formInput ['email'] ))
			$this->email = $formInput ['email'];
		if (isset ( $formInput ['password'] ))
			$this->password = $formInput ['password'];
		if (isset ( $formInput ['phoneNum'] ))
			$this->phoneNum = $formInput ['phoneNum'];
		if (isset ( $formInput ['website'] ))
			$this->website = $formInput ['website'];
		if (isset ( $formInput ['favcolor'] ))
			$this->favcolor = $formInput ['favcolor'];
		if (isset ( $formInput ['bday'] ))
			$this->bday = $formInput ['bday'];
		if (isset ( $formInput ['whyRatChat'] ))
			$this->whyRatChat = $formInput ['whyRatChat'];
		if (isset ( $formInput ['ratsOwned'] ))
			$this->ratsOwned = $formInput ['ratsOwned'];
	}
}
?>