<?php 
/**
 * Responsibility: Maintains open DB connection (singleton)
 */
class Database {
	private static $db;
	private static $dsn = 'mysql:host=localhost;dbname=urlnoshdb';
	private static $username = 'root';
	private static $password = '';
	private static $options = array (
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);

	public static function getDB() {
		if (! isset ( self::$db )) {
			echo "opening<br>";
			try {
				self::$db = new PDO ( self::$dsn, self::$username,
						self::$password, self::$options );
			} catch ( PDOException $e ) {
				echo $e->getMessage ();
			}
		}
		echo "Got it";
		return self::$db;
	}
}
?>