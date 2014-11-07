<?php
require_once(dirname(__FILE__)."/../../WebContent/models/Database.class.php");
function makeTestDB($dbName = "temporary") {
	// Creates a database named $dbName for testing and returns connection
	$configPath = 'C:/xampp/myConfig.ini';
	$db = Database::getDB('', $configPath);
	try {
	   $db->query("DROP DATABASE if EXISTS $dbName;");
	   $db->query("CREATE DATABASE $dbName;");
	   $db->query("USE $dbName;");
	   
	   // Create the user table
	   $db->query("DROP TABLE if EXISTS user;");
	   $db->query("CREATE TABLE user (
			        userID		       	 int(11) NOT NULL AUTO_INCREMENT,
			        username         	 varchar(64) COLLATE utf8_unicode_ci NOT NULL,
			        email    		  	 varchar(100) not null,
			        userPasswordHash	 varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			        phoneNum			 int(10) not null,
			        website				 varchar(1024) not null,
			        favcolor		 	 varchar(7) not null,
			        bday				 varchar(7) not null,
			        whyRatChat			 int not null,
			        ratsOwned			 int not null,
			        userDateCreated		 TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			        PRIMARY KEY (userID),
			        UNIQUE KEY (username)
					)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;"); 	
	   

	   // Create the interestList table
	   $db->query("DROP TABLE if EXISTS interestList;");
	   $db->query("CREATE TABLE interestList (
			        interestListID             int PRIMARY KEY AUTO_INCREMENT,
			        interestListName           varchar (255) UNIQUE
					)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	   
	    $db->query("DROP TABLE IF EXISTS interestListMap;");
	    $db->query("CREATE TABLE interestListMap (
			        userID                	   int,
					interestListID             int,
					FOREIGN KEY (userID) REFERENCES user(userID),
			        FOREIGN KEY (interestListID) REFERENCES interestList(interestListID)
					)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	   
	   // Populate the user data in the database 
	   $userPasswordHash1 = password_hash("abc123", PASSWORD_DEFAULT);
	   $userPasswordHash2 = password_hash("abc456", PASSWORD_DEFAULT);
	   $userPasswordHash3 = password_hash("abc789", PASSWORD_DEFAULT);
	   
	   // Populate the database
	   $db->query("INSERT INTO user (userID, username, userPasswordHash, email, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned) VALUES 
				   (1, 
				   'SillyGirl', 
				   '".$userPasswordHash1."',
				   'SillyGirl@gmail.com', 
				   '2102344453', 
				   'http://www.google.com/', 
				   '#ab0021', 
				   '1990-10', 
				   '1', 
				   '3'
				   ); ");   
	   $db->query("INSERT INTO user (userID, username,  userPasswordHash, email, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned) VALUES 
				   (2, 
				   'MrAwesome', 
				   '".$userPasswordHash2."',
				   'mrawesome@gmail.com', 
				   '2442321353', 
				   'http://www.dapper.com.au/', 
				   '#ffffff', 
				   '1991-12', 
				   '2', 
				   '0'
				   );");
	   $db->query("INSERT INTO user (userID, username,  userPasswordHash, email, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned) VALUES 
				   (3, 
				   'RatLover345', 
				   '".$userPasswordHash3."',
				   'rat_lover_345@gmail.com', 
				   '3612244453', 
				   'www.gamestop.com/', 
				   '#f003ac', 
				   '1994-09', 
				   '3', 
				   '0'
				   );");
	   
	   $db->query("INSERT INTO interestList VALUES
  				    (1, 'Rat Varieties'), (2, 'Rat Housing'), (3, 'Rat Food'), (4, 'Rat Toys'), (5, 'Rat Care');");
	   
	   $db->query("INSERT INTO interestListMap (userID, interestListID) VALUES
       (1, 4), (2, 1), (2, 2), (2, 5), (3, 1);");
	} catch ( PDOException $e ) {
	   	echo $e->getMessage ();  // not final error handling
	}
	return $db;
}
?>