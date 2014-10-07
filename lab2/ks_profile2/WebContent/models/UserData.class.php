<?php
/**
 * username, email, password, phoneNum, website, color, bday, reason, ratsOwned
 * 
 * Responsibility: Holds data for user and performs validation
 * Constructor expects an associative array with field values for initialization
 */
class UserData {
	private $username;
	private $email;
	private $password;
	private $phoneNum;
	private $website;
	private $color;
	private $bday;
	private $reason;
	private $ratsOwned;
	public function __construct($formInput) {
		$this->initialize ( $formInput );
	}
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
	public function getColor() {
		return $this->color;
	}
	public function getBDay() {
		return $this->bday;
	}
	public function getReason() {
		return $this->reason;
	}
	public function getRatsOwned() {
		return $this->ratsOwned;
	}
	public function printUser() {
		echo "<h1>Rat Chat Sign Up</h1>";
		echo "Username: $this->username<br>";
		echo "Email: $this->email<br>";
		echo "Password: $this->password<br>";
		echo "Phone Number: $this->phoneNum<br>";
		echo "Website: $this->website<br>";
		echo "Color: $this->color<br>";
		echo "Birthday Month and Year: $this->bday<br>";
		echo "Reason on Rat Chat: ";
		switch($this->reason) {
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
		if (isset ( $formInput ['username'] ))
			$this->username = $formInput ['username'];
		if (isset ( $formInput ['email'] ))
			$this->email = $formInput ['email'];
		if (isset ( $formInput ['pass2'] ))
			$this->password = $formInput ['pass2'];
		if (isset ( $formInput ['phoneNum'] ))
			$this->phoneNum = $formInput ['phoneNum'];
		if (isset ( $formInput ['website'] ))
			$this->website = $formInput ['website'];
		if (isset ( $formInput ['favcolor'] ))
			$this->color = $formInput ['favcolor'];
		if (isset ( $formInput ['bday'] ))
			$this->bday = $formInput ['bday'];
		if (isset ( $formInput ['whyRatChat'] ))
			$this->reason = $formInput ['whyRatChat'];
		if (isset ( $formInput ['ratsOwned'] ))
			$this->ratsOwned = $formInput ['ratsOwned'];
	}
}
?>