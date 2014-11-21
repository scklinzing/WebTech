DROP DATABASE if EXISTS ks_data3;
CREATE DATABASE ks_data3;
USE ks_data3;

DROP TABLE if EXISTS user;
CREATE TABLE user (
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
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE if EXISTS interestList;
CREATE TABLE interestList (
        interestListID             int PRIMARY KEY AUTO_INCREMENT,
        interestListName           varchar (255) UNIQUE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS interestListMap;
CREATE TABLE interestListMap (
        userID                	   int,
		interestListID             int,
		FOREIGN KEY (userID) REFERENCES user(userID),
        FOREIGN KEY (interestListID) REFERENCES interestList(interestListID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO interestList VALUES
      (1, 'varieties'), (2, 'housing'), (3, 'food'), (4, 'toys'), (5, 'care');
      
INSERT INTO user (userID, username, userPasswordHash, email, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned) VALUES 
	   (1, 
	   'SillyGirl', 
	   '$2y$10$TmIMGqe3o5JSQBw9v05qZ.qdNUBj0F7yWt1KpuS4rTNNFkYHWxiku',
	   'SillyGirl@gmail.com', 
	   '2102344453', 
	   'http://www.google.com/', 
	   '#ab0021', 
	   '1990-10', 
	   '1', 
	   '3'
	   );  
INSERT INTO user (userID, username,  userPasswordHash, email, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned) VALUES 
	   (2, 
	   'MrAwesome', 
	   '$2y$10$TmIMGqe3o5JSQBw9v05qZ.qdNUBj0F7yWt1KpuS4rTNNFkYHWxiku',
	   'mrawesome@gmail.com', 
	   '2442321353', 
	   'http://www.dapper.com.au/', 
	   '#ffffff', 
	   '1991-12', 
	   '2', 
	   '0'
	   );
INSERT INTO user (userID, username,  userPasswordHash, email, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned) VALUES 
	   (3, 
	   'RatLover345', 
	   '$2y$10$TmIMGqe3o5JSQBw9v05qZ.qdNUBj0F7yWt1KpuS4rTNNFkYHWxiku',
	   'rat_lover_345@gmail.com', 
	   '3612244453', 
	   'http://www.gamestop.com/', 
	   '#f003ac', 
	   '1994-09', 
	   '3', 
	   '0'
	   );
        
/**
 * SillyGirl 	(userID 1): 	(4, 'ratToys')
 * MrAwesome 	(userID 2): 	(1, 'ratVarieties'), (2, 'ratHousing'), (5, 'ratCare')
 * RatLover345 	(userID 3): 	(1, 'ratVarieties')
 */
INSERT INTO interestListMap (userID, interestListID) VALUES
       (1, 4), (2, 1), (2, 2), (2, 5), (3, 1);