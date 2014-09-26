<?php 
class SurveyData {
	/* declare variables */
	private $firstName;
	
	/* constructor */
	public function __constructor($formInput) {
		$this->initialize($formInput);
	}
	
	/* get and return the firstName */
	public function getFirstName() {
		return $this->firstName;
	}
	
	/* print */
	public function printSurvey() {
		echo "<h1>URL NOSH Member Survey</h1>";
		echo "First name: $this->firstName<br>";
	}
	
	/* initialize variables */
	private function initialize($formInput) {
		if (isset($formInput['firstname']))
			$this->firstName = $formInput['firstname'];
	}
}
?>