<?php
// Responsibility: Holds data for comment and performs validation
// Constructor expects an associative array with field values for initialization
class CommentData {
	private $commentId;
	private $evaluationUrl;
	private $comment;
	
	public function __construct($formInput) {
		$this->initialize($formInput);
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
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("commentId" => $this->commentId,
		                    "evaluationUrl" => $this->evaluationUrl,
		                    "comment" => $this->comment
		                   );
		return $paramArray;
	}
	
	public function printComment() {
		echo "<h1>URL Nosh Member Comment</h1>";
		echo "Comment Id: $this->commentId<br>";
		echo "Evaluation url: $this->evaluationUrl<br>";
		echo "Comment: $this->comment<br>";
	}
	
	private function initialize($formInput) {
		if (isset($formInput['commentId']))
			$this->commentId = $formInput['commentId'];
		else 
			$this->commentId = 0;
		if (isset($formInput['evaluationUrl']))
			$this -> evaluationUrl = $formInput['evaluationUrl'];
		if (isset($formInput['comment']))
			$this->comment = $formInput['comment'];	
	}
}
?>