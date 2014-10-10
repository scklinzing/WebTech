<?php
// Responsibility: Handles all queries pertaining to comment
class CommentDB {
	public static function fetchAll() {
		$comments = array();
		try {
			$db = Database::getDB ();
			$query = 'SELECT * FROM comments';
			$statement = $db->prepare($query);
			$statement->execute ();
			$comments = CommentDB::getCommentArray($statement->fetchAll(PDO::FETCH_ASSOC));
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error fetching comments ".$e->getMessage()."</p>";
		}
		return $comments;
	}
	
	public static function addComment($myComment) {
		// Inserts the comment contained in a CommentData object into DB
		$returnId = 0;
		try {
			$db = Database::getDB ();
			$evaluationUrl = $myComment->getEvaluationUrl();
			$comment = $myComment->getComment();
			$query = "INSERT INTO comments (evaluationUrl, comment)
		            VALUES(:evaluationUrl, :comment)";
			$statement = $db->prepare ( $query );
			$statement->bindValue(":evaluationUrl", $evaluationUrl);
			$statement->bindValue(":comment", $comment);
			$statement->execute ();
			$statement->closeCursor();
			$returnId = $db->lastInsertId("commentId");
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding comment ".$e->getMessage()."</p>";
		}
		return $returnId;
	}
	
	public static function getCommentById($commentId) {
		// Returns a comment object or null;
		$comment = null;
		try {
			$db = Database::getDB ();
			$query = "SELECT * FROM comments WHERE commentId = :commentId";
			$statement = $db->prepare($query);
			$statement->bindParam(":commentId", $commentId); // Only binds at execute time
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			if (!empty($result))
			   $comment = new CommentData($result);
			$statement->closeCursor();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error retrieving comments by commentId ".$e->getMessage()."</p>";
		}
		return $comment;
	}
	
	public static function getCommentArray($rowSet) {
		$comments = array ();
		foreach ( $rowSet as $commentRow ) {
			$comment = new CommentData ( $commentRow );
			array_push ( $comments, $comment );
		}
		return $comments;
	}
	
}
?>
