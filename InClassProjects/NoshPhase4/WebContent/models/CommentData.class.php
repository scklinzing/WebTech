<?php
// Responsibility: Holds data for comment and performs validation
// Constructor expects an associative array with field values for initialization
class CommentData {
	private $comment;
	private $commentDateCreated;
	private $commentId;
	private $commentTagList;
	private $evaluationUrl;
	private $memberClassName;
    private $memberClassMap;
    private $commentTagMap;
	private $errorCount;
	private $errors;
	private $formInput;
	
	public function __construct($formInput = null, $memberClassMap = array(), $commentTagMap = array()) {
		$this->memberClassMap = $memberClassMap;
		$this->commentTagMap = $commentTagMap;
		$this->formInput = $formInput;
		if (is_null($formInput))
			$this->initializeEmpty();
	    else
		    $this->initialize();
	}
	
	public function getComment() {
		return $this->comment;
	}
	
	public function getCommentDateCreated() {
		return $this->commentDateCreated;
	}
	
	public function getCommentId() {
		return $this->commentId;
	}
	
	public function getCommentTagList() {
		return $this->commentTagList;
	}
	
	public function setCommentTagList($list) {
		$this->commentTagList = $list;
	}
	
	public function getCommentTagNames() {
		return $this->commentTagNames;
	}
	
	public function getError($errorName) {
		if (isset($this->errors[$errorName]))
			return $this->errors[$errorName];
		else
			return "";
	}
	
	public function getErrorCount() {
		return $this->errorCount;
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
	public function getEvaluationUrl() {
		return $this->evaluationUrl;
	}
	
	public function getFormInput() {
		return $this->formInput;
	}
	
	public function getMemberClassNames() {
		return $this->memberClassNames;
	}
	
	public function getMemberClassName() {
		return $this->memberClassName;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("commentId" => $this->commentId,
		                    "evaluationUrl" => $this->evaluationUrl,
		                    "comment" => $this->comment,
				            "memberClassName" => $this->memberClassName,
				            "commentTagList" => $this->commentTagList,
				            "commentDataCreated" => $this->commentDateCreated
		                   );
		return $paramArray;
	}
	
	public function isTag($tagName) {
		//Return true if the tagname is in the comment tag list
		return in_array($tagName, $this->commentTagList);
	}
	
	public function printComment() {
		echo "<h1>URL Nosh Member Comment</h1>";
		echo "Comment Id: $this->commentId<br>";
		echo "Evaluation url: $this->evaluationUrl<br>";
		echo "Comment: $this->comment<br>";
		echo "Member class: $this->memberClassName<br>";
		echo "Comment tags: [ ";
		for ($k = 0; $k < count($this->commentTagList); $k++)
	         echo $this->commentTagList[$k]." ";
		echo "]<br>";
		echo "Date created: $this->commentDateCreated<br>";
	}
	
	public function __toString() {
		$str = "Id:[".$this->commentId."] url:[".$this->evaluationUrl."] ".
		"class:[".$this->memberClassName."] comment:[".$this->comment."] tags:[ ";
		for ($k = 0; $k < count($this->commentTagList); $k++)
	         $str = $str.$this->commentTagList[$k]." ";
		$str = $str ."]";
		return $str;
	}

	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		$this->verifyCommentId();	
		$this->verifyEvaluationUrl();
		$this->verifyComment();	
		$this->verifyMemberClassName();
		$this->verifyCommentTagList();
		$this->verifyCommentDateCreated();
	}
	
	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
		$this->commentId = "";
		$this->evaluationUrl = "";
		$this->comment = "";
		$this->memberClassName = "";
		$this->commentTagList = array();
		$this->commentDateCreated = "";
	}
	
	private function stripInput($data) {
		// Require most data be free of blanks, slashes and special characters
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
	}
	
	private function verifyCommentId() {
		// If commentId is not empty it should be a positive integer
		if (!isset($this->formInput['commentId']))
			$this->commentId = '';
		else {
			$this->commentId = $this->stripInput($this->formInput['commentId']);
            if (!filter_var($this->commentId, FILTER_VALIDATE_INT)) {
            	$this->errors['commentId'] = "Comment Id is not a valid integer";
            	$this->errorCount++;
            } elseif ((int)$this->commentId <= 0) {
            	$this->errors['commentId'] = "Comment Id must be a positive integer";
            	$this->errorCount++;
            }
		}		
	}
	
	private function verifyEvaluationUrl() {
		// The evaluation URL must be a non-empty valid URL
		if (! isset ( $this->formInput['evaluationUrl'] ) || 
		              empty($this->formInput['evaluationUrl'])) {
			$this->evaluationUrl = '';
			$this->errors ['evaluationUrl'] = "Evaluation URL is required";
			$this->errorCount ++;
		} else {
			$this->evaluationUrl = $this->stripInput ( $this->formInput['evaluationUrl'] );
			if (! filter_var ( $this->evaluationUrl, FILTER_VALIDATE_URL )) {
				$this->errors ['evaluationUrl'] = "Evaluation URL is not valid";
				$this->errorCount ++;
			}
		}
	}
	
	private function verifyComment() {
		// The comment must be a non empty string
		if (! isset ($this->formInput['comment']) || 
		     empty($this->formInput['comment'])) {
			$this->comment = '';
			$this->errors ['comment'] = "Comment field is required";
			$this->errorCount ++;
		} else {
			$this->comment = $this->stripInput ( $this->formInput['comment']);
		}
	}
	
	private function verifyMemberClassName() {
		// The member class name must be a non empty valid member class    
		if (! isset ( $this->formInput['memberClassName'] ) || 
		     empty($this->formInput['memberClassName'])) {
			$this->memberClassName = '';
			$this->errors ['memberClassName'] = "Member class name is required";
			$this->errorCount ++;
		} else {
			$this->memberClassName = $this->stripInput ($this->formInput['memberClassName']);
			if (!empty($this->memberClassMap) && 
			     !array_key_exists($this->memberClassName, $this->memberClassMap)) {
				$this->errors['memberClassName'] = "Member class name must be valid";
				$this->errorCount++;
				$this->memberClassName = "";
			}
		}
	}
	private function verifyCommentTagList() {
		// The comment tag list should contain valid entries
		$this->commentTagList = array ();
		if (! isset ( $this->formInput ['commentTagList'] ))
			return;
		elseif (! is_array ( $this->formInput ['commentTagList'] )) {
			$this->errors ['commentTagList'] = "Comment tags should be a list";
			$this->errorCount ++;
		} else { // Counts multiple bad tags as only one error, but lists all bad tags
			$list = $this->formInput ['commentTagList'];
			for($k = 0; $k < count ( $list ); $k ++) {
				$nextTag = $this->stripInput ( $list [$k] );
				array_push ( $this->commentTagList, $nextTag );
				if (! empty ( $this->commentTagMap ) && ! array_key_exists ( $nextTag, $this->commentTagMap )) {	
					if (isset ( $this->errors ['commentTagList'] ))
						$this->errors ['commentTagList'] = $this->errors ['commentTagList'] . "[$nextTag]";
					else {
						$this->errors ['commentTagList'] = "Invalid comment tag: [$nextTag]";
						$this->errorCount ++;
					}
				}
			}
		}
	}
	
	private function verifyCommentDateCreated() {
		// Just do base filtering at this point
		if (isset($this->formInput['commentDateCreated']))
			$this->commentDateCreated = 
		           $this->stripInput ($this->formInput['commentDateCreated']);
	}
}
?>