<?php
class SurveyData {
	private $firstName;
	private $specialDate;
	public function __construct($formInput) {
		$this->initialize ( $formInput );
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function getSpecialDate() {
		return $this->specialDate;
	}
	public function printSurvey() {
		echo "<h1>URL Nosh Member Survey</h1>";
		echo "First name: $this->firstName<br>";
		echo "Special date: " . date ( 'Y-m-d', $this->specialDate ) . "<br>";
	}
	private function initialize($formInput) {
		if (isset ( $formInput ['firstname'] ))
			$this->firstName = $formInput ['firstname'];
		if (isset ( $formInput ['specialdate'] ))
			$this->specialDate = strtotime ( $formInput ['specialdate'] );
	}
}
?>