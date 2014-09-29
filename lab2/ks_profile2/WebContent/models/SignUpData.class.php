<?php
class SignUpData {
	private $firstName;
	public function __construct($formInput) {
		$this->initialize ( $formInput );
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function printSurvey() {
		echo "<h1>Rat Chat Member Sign Up</h1>";
		echo "First name: $this->firstName<br>";
	}
	private function initialize($formInput) {
		if (isset ( $formInput ['firstname'] ))
			$this->firstName = $formInput ['firstname'];
	}
}
?>