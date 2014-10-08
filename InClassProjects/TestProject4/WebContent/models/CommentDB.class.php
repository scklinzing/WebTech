<?php
// Responsibility: Holds data for comment and performs validation
// Constructor expects an associative array with field values for initialization
class CommentData {
	private $commentId;
	private $firstName;
	private $evaluationUrl;
	private $comment;
	private $memberClass;
	public function __construct($formInput) {
		$this->initialize ( $formInput );
	}
	public function getComment() {
		return $this->comment;
	}
	public function getCommentId() {
		return $this->commentId;
	}
	public function getEvaluationUrl() {
		return $this->evaluationUrl;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function getMemberClass() {
		return $this->memberClass;
	}
	public function getParameters() {
		$paramArray = array (
				"commentId" => $this->commentId,
				"firstName" => $this->firstName,
				"evaluationUrl" => $this->evaluationUrl,
				"comment" => $this->comment 
		);
		return $paramArray;
	}
	public function printComment() {
		echo "<h1>URL Nosh Member Survey</h1>";
		echo "Comment Id: $this->commentId<br>";
		echo "First name: $this->firstName<br>";
		echo "Evaluation url: $this->evaluationUrl<br>";
		echo "Comment: $this->comment<br>";
		echo "Member class: $this->memberClass<br>";
	}
	private function initialize($formInput) {
		if (isset ( $formInput ['commentId'] ))
			$this->commentId = $formInput ['commentId'];
		if (isset ( $formInput ['firstName'] ))
			$this->firstName = $formInput ['firstName'];
		if (isset ( $formInput ['evaluationUrl'] ))
			$this->evaluationUrl = $formInput ['evaluationUrl'];
		if (isset ( $formInput ['comment'] ))
			$this->comment = $formInput ['comment'];
		if (isset ( $formInput ['memberClass'] ))
			$this->memberClass = $formInput ['memberClass'];
	}
}
?>