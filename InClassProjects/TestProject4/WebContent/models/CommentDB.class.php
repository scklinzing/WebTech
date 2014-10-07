<?php
// Responsibility: Handles all queries pertaining to comment
class CommentDB {
	public static function fetchAll() {
		$comments = array ();
		try {
			$db = Database::getDB ();
			$query = 'SELECT * FROM Comments';
			$statement = $db->prepare ( $query );
			$statement->execute ();
			$commentRows = $statement->fetchAll ();
			foreach ( $commentRows as $commentRow ) {
				print_r ( $commentRow ); // Just temporary
				echo "<br>"; // Just temporary
				$comment = new CommentData ( $commentRow );
				array_push ( $comments, $comment );
			}
			$statement->closeCursor ();
			return $comments;
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error fetching comments $e->getMessage()</p>";
		}
		return $comments;
	}
	public static function addComment($myComment) {
		try {
			$db = Database::getDB ();
			$query = "INSERT INTO Comments (firstName, evaluationUrl, comment)
				VALUES(:firstName, :evaluationUrl, :comment)";
			$statement = $db->prepare ( $query );
			$statement->execute ($myComment);
			
			return "I did it";
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error adding comments $e->getMessage()</p>";
		}
		return $comments;
	}
}
?>