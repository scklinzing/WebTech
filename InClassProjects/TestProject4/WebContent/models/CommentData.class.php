<?php
class CommentData {
	private $firstName;
	private $evaluationUrl;
	private $comment;
	public function __construct($formInput) {
		$this->initialize ( $formInput );
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function getComment() {
		return $this->comment;
	}
	public function getEvaluationUrl() {
		return $this->evaluationUrl;
	}
	public function printComment() {
		echo "<h1>URL Nosh Member Survey</h1>";
		echo "First name: $this->firstName<br>";
		echo "Evaluation url: $this->evaluationUrl<br>";
		echo "Comment: $this->comment<br>";
	}
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