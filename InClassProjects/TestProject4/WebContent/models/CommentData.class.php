<?php
/**
 * This class does complete input validation.
 * This will not be a requirement for Lab2.
 * Responsibility: Holds data for comment and performs validation
 * Constructor expects an associative array with field values for initialization
 */
class CommentData {
	private $firstName;
	private $evaluationUrl;
	private $comment;
	/* constructor */
	public function __construct($formInput) {
		$this->initialize ( $formInput );
	}
	/* get first name */
	public function getFirstName() {
		return $this->firstName;
	}
	/* get comment */
	public function getComment() {
		return $this->comment;
	}
	/* get evaluation url */
	public function getEvaluationUrl() {
		return $this->evaluationUrl;
	}
	/* print the first name, evaluation url, and comment */
	public function printComment() {
		echo "<h1>URL Nosh Member Survey</h1>";
		echo "First name: $this->firstName<br>";
		echo "Evaluation url: $this->evaluationUrl<br>";
		echo "Comment: $this->comment<br>";
	}
	/* initialize variables */
	private function initialize($formInput) {
		if (isset ( $formInput ['firstName'] ))
			$this->firstName = $formInput ['firstName'];
		if (isset ( $formInput ['evaluationUrl'] ))
			$this->evaluationUrl = $formInput ['evaluationUrl'];
		if (isset ( $formInput ['comment'] ))
			$this->comment = $formInput ['comment'];
	}
}
?>