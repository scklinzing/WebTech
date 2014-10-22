<?php
// Responsibility: maintains open DB connection (singleton)
class Database {
	private static $db;
	private static $dsn = 'mysql:host=localhost;dbname=';
	private static $dbName = 'ks_data';
	private static $options = array (
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
	/* private static $username = 'root';
	private static $password = ''; */
	public static function getDB($dbName = 'ks_data', $configPath ="../../myConfig.ini") {
		if (! isset ( self::$db )) {
			try {
				$passArray = parse_ini_file($configPath);
				$username = $passArray["username"];
				$password = $passArray["password"];
				self::$dbName = $dbName;
				$dbspec = self::$dsn.self::$dbName;
				//self::$db = new PDO ( self::$dsn, $username, $password, self::$options );
				self::$db = new PDO ( $dbspec, $username, $password, self::$options );
			} catch ( PDOException $e ) {
				echo "<p>Error with getDB function in Database.class.php " . $e->getMessage () . "</p>";
			}
		}
		return self::$db;
	}
}
?>