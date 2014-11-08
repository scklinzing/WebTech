<?php
// Responsibility: maintains open DB connection (singleton)
class Database {
	private static $db;
	private static $dsn = 'mysql:host=localhost;dbname=';
	private static $dbName = 'ks_data3';
	private static $options = array (
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
	public static function getDB($dbName = 'ks_data3', $configPath ="../../myConfig.ini") {
		if (! isset ( self::$db )) {
			try {
				$configPath = dirname(__FILE__). "/" . $configPath;
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