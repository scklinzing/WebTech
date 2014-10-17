<?php
// Responsibility: Implements a list of available interests
class InterestListDB {

	public static function getMap($keyName, $valueName) {
		// Returns an associative array key versus value
		$query = "SELECT * 
				     FROM interestList";
		$interestList = array ();
		try {
			$db = Database::getDB ();
			$statement = $db->prepare ($query);
			$statement->execute();
			$rowsets = $statement->fetchAll( PDO::FETCH_ASSOC );
			$interestList = InterestListDB::getArray($rowsets, $keyName, $valueName);
			$statement->closeCursor ();
		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting map of $keyName to $valueName in getMap() ". $e->getMessage()."</p>";
		}
		return $interestList;
	}

	public static function getNameById ($Id) {
		// Returns the name given id or null if no item exists
		$Id = strval($Id);
		$query = "SELECT interestListName 
				     FROM interestList
			         WHERE interestListID = :id";
		$name = null;
		try {
			$db = Database::getDB ();
			$statement = $db->prepare($query);
			$statement->bindParam(":id", $Id); // Only binds at execute time
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			$name = $results[0]['interestListName'];
			$statement->closeCursor();

		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting name from $id in getNameById()".$e->getMessage()."</p>";
		}
		return $name;
	}

	public static function getIdByName ($name) {
		// Returns the id given name or null if no item exists
		$query = "SELECT interestListID FROM interestList 
				     WHERE interestListName = :name";
		$id = null;
		try {
			$db = Database::getDB ();
			$query = 'SELECT interestListID 
					     FROM interestList 
					     WHERE interestListName = :name';
			$statement = $db->prepare($query);
			$statement->bindParam(":name", $name); // Only binds at execute time
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			$id = $results[0]['interestListID'];
			$statement->closeCursor();

		} catch ( PDOException $e ) { // Not permanent error handling
			echo "<p>Error getting ID from $name in getIdByName()".$e->getMessage()."</p>";
		}
		return $id;
	}

	public static function getArray($rowset, $keyName, $valueName) {
		// Returns an associative array from $rowset based on item names
		$index = array();
		for ($k = 0; $k < count($rowset); $k++) {
			$item = $rowset[$k];
			$key = strval($item[$keyName]);
			$value = $item[$valueName];
			$index[$key] = strtolower($value);
		}
		return $index;
	}
	
}
?>