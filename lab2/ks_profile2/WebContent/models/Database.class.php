<?php
// Responsibility: maintains open DB connection (singleton)
class Database {
	private static $db;
	private static $dsn = 'mysql:host=localhost;dbname=ks_data';
	/*
	private static $username = 'cs4413student';
	private static $password = 'cs4413###database';
	*/
	private static $username = 'root';
	private static $password = '';
	private static $options = array (
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
	);
	public static function getDB() {
		if (! isset ( self::$db )) {
			try {
				self::$db = new PDO ( self::$dsn, self::$username, self::$password, self::$options );
			} catch ( PDOException $e ) {
				echo "<p>Error with getDB function in Database.class.php " . $e->getMessage () . "</p>";
			}
		}
		return self::$db;
	}
}
?>