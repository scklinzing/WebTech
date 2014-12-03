<?php  
require_once(dirname(__FILE__)."/../../WebContent/includer.php");
function makeTestDB($dbName = "temporary") {
	// Creates a database named $dbName for testing and returns connection
	$configPath = 'C:/xampp/myConfig.ini';
	$db = Database::getDB('', $configPath);
	try {
	   $db->query("DROP DATABASE if EXISTS $dbName;");
	   $db->query("CREATE DATABASE $dbName;");
	   $db->query("USE $dbName;");
	   
	   // Create the memberClasses table
	   $db->query("DROP TABLE if EXISTS memberClasses;");
	   $db->query("CREATE TABLE memberClasses 
	   	  	       (memberClassId int PRIMARY KEY, memberClassName  varchar (255) UNIQUE
                   COLLATE utf8_unicode_ci)
	   		       ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;"); 	
	   

	   // Create the users table
	   $db->query("DROP TABLE IF EXISTS users");
	   $db->query("CREATE TABLE users (
	              userId   int(11) NOT NULL AUTO_INCREMENT,
	              userName varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	   		      userPasswordHash varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	              userDateCreated  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	   		      PRIMARY KEY (userId),
	              UNIQUE KEY (userName)
	              ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	   
	    $db->query("DROP TABLE IF EXISTS userProfiles");
	    $db->query("CREATE TABLE userProfiles (
	                userProfileId   int(11) NOT NULL AUTO_INCREMENT,
	    		    userProfileEmail varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	                userProfileFirstName varchar(20) COLLATE utf8_unicode_ci,
	                userProfileLastName varchar(64) COLLATE utf8_unicode_ci,
	                userProfileDateModified  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	                userId int(11) NOT NULL,
	                PRIMARY KEY (userProfileId),
	    		    UNIQUE KEY (userProfileEmail),
	                FOREIGN KEY (userId) REFERENCES users(userId)
	                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	    
	    // Create the commentTags table
	    $db->query("DROP TABLE if EXISTS commentTags;");
	    $db->query("CREATE TABLE commentTags
	   		       (commentTagId  int PRIMARY KEY AUTO_INCREMENT, 
	    		    commentTagName varchar (255) UNIQUE COLLATE utf8_unicode_ci
                   )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	    
	   // Create the comments table
	   $db->query("DROP TABLE IF EXISTS comments;");
	   $db->query("CREATE TABLE comments (commentId int PRIMARY KEY AUTO_INCREMENT,
	               evaluationUrl  varchar(1024) COLLATE utf8_unicode_ci NOT NULL, 
	   		       comment varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
	               memberClassId  int NOT NULL,
	               commentDateCreated   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	               FOREIGN KEY (memberClassId) REFERENCES memberClasses(memberClassId)
                   )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	   
	   // Create the commentTagMap table
	   $db->query("	DROP TABLE IF EXISTS commentTagMap;"); 
	   $db->query("CREATE TABLE commentTagMap (
	   		       commentTagId int,
	               commentId  int,
	               FOREIGN KEY (commentTagId) REFERENCES commentTags(commentTagId),
	               FOREIGN KEY (commentTagId) REFERENCES comments(commentId)
                   )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	   
	   // Populate the user data in the database 
	   $userPasswordHash1 = password_hash("abc123", PASSWORD_DEFAULT);
	   $userPasswordHash2 = password_hash("abc456", PASSWORD_DEFAULT);
	   
	   // Populate the database
	   $db->query("INSERT INTO users (userId, userName,  userPasswordHash) VALUES ".
	              "(1, 'Kay', '".$userPasswordHash1. "');");   
	   $db->query("INSERT INTO users (userId, userName,  userPasswordHash) VALUES ".
	              "(2, 'John',  '".$userPasswordHash2."');");
	   $db->query("INSERT INTO users (userId, userName,  userPasswordHash) VALUES ".
	   		"(3, 'Annie', '".$userPasswordHash1. "');");
	   
	   $db->query("INSERT INTO userProfiles (userProfileId, userProfileEmail, userProfileFirstName,
	              userProfileLastName, userId) VALUES ". "(1, 'john@yahoo.com', 'John', 'Doe', 2);");
	   
	   $db->query("INSERT INTO userProfiles (userProfileId, userProfileEmail, userProfileFirstName,
	              userProfileLastName, userId) VALUES " . "(2, 'kay@gmail.com', 'Kay', 'Robbins', 1);");
	   	   
	   $db->query("INSERT INTO commentTags VALUES
	              (1, 'layout'), (2, 'colors'), (3, 'semantics'), (4, 'content');");
	   $db->query("INSERT INTO memberClasses VALUES
	              (1, 'reader'), (2, 'nosher'), (3, 'moderator');");
	   $db->query("INSERT INTO comments (evaluationUrl, comment, memberClassId)
	              VALUES ('http://www.npr.org/blogs/thetwo-way/2014/09/27/351986593/hiker-catches-volcanos-eruption-on-video-and-is-overtaken-by-ash', 'Shows the incredible power of nature', 1);");
	   $db->query("INSERT INTO comments (evaluationUrl, comment, memberClassId)
	               VALUES ('http://validator.w3.org/', 'Why doesn\t the W3C semantic validator allow file upload?', 1);)");
	   $db->query("INSERT INTO comments (evaluationUrl, comment, memberClassId)
	              VALUES ('http://www.npr.org/blogs/thetwo-way/2014/09/27/351986593/hiker-catches-volcanos-eruption-on-video-and-is-overtaken-by-ash', 'Shows the incredible power of nature', 1);");
	   $db->query("INSERT INTO comments (evaluationUrl, comment, memberClassId)
	               VALUES ('http://validator.w3.org/', 'Why doesn\t the W3C semantic validator allow file upload?', 1);");	   
	   $db->query("INSERT INTO comments (evaluationUrl, comment, memberClassId)
	               VALUES ('https://www.flickr.com/explore/', 'Flickr explore page always has some pheonomenal pictures', 3);");   
	   $db->query("INSERT INTO comments (evaluationUrl, comment, memberClassId)
	              VALUES ('http://www.cbc.ca/news/technology/bash-bug-aka-shellshock-has-no-easy-fix-1.2779383', 'The Bash shellshock has no easy fix', 2);");	   
	   
	   $db->query("INSERT INTO commentTagMap (commentTagId, commentId) VALUES
	              (1, 1), (1, 4), (1, 3), (2, 1), (2, 4), (4, 3);");
	} catch ( PDOException $e ) {
	   	echo $e->getMessage ();  // not final error handling
	}
	  
	return $db;
}
?>