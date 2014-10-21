DROP DATABASE if EXISTS ks_data;
CREATE DATABASE ks_data;
USE ks_data;

DROP TABLE if EXISTS user;
CREATE TABLE user (
        userID		       	 int primary key auto_increment,
        username         	 varchar(40) not null UNIQUE,
        email    		  	 varchar(100) not null,
        password             varchar(40) not null,
        phoneNum			 int(10) not null,
        website				 varchar(1024) not null,
        favcolor		 	 varchar(7) not null,
        bday				 varchar(7) not null,
        whyRatChat			 int not null,
        ratsOwned			 int not null,
        userDateJoined		 TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE if EXISTS interestList;
CREATE TABLE interestList (
        interestListID             int PRIMARY KEY AUTO_INCREMENT,
        interestListName           varchar (255) UNIQUE
);

DROP TABLE IF EXISTS interestListMap;
CREATE TABLE interestListMap (
        userID                	   int,
		interestListID             int,
		FOREIGN KEY (userID) REFERENCES user(userID),
        FOREIGN KEY (interestListID) REFERENCES interestList(interestListID)
);

INSERT INTO interestList VALUES
      (1, 'ratVarieties'), (2, 'ratHousing'), (3, 'ratFood'), (4, 'ratToys'), (5, 'ratCare');

insert into user (username, email, password, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned)
        values ('SillyGirl','sillyGirl@mail.com', 'password', '2102344453', 'http://www.google.com/', '#ab0021', '1990-10', '1', '3');
        
insert into user (username, email, password, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned)
        values ('MrAwesome','mrawesome@mail.com', 'password', '2442321353', 'http://www.dapper.com.au/', '#ffffff', '1991-12', '2', '0');
        
insert into user (username, email, password, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned)
        values ('RatLover345','rat_lover_345@mail.com', 'password', '3612244453', 'www.gamestop.com/', '#f003ac', '1994-09', '3', '0');
        
/**
 * SillyGirl 	(userID 1): 	(4, 'ratToys')
 * MrAwesome 	(userID 2): 	(1, 'ratVarieties'), (2, 'ratHousing'), (5, 'ratCare')
 * RatLover345 	(userID 3): 	(1, 'ratVarieties')
 */
INSERT INTO interestListMap (userID, interestListID) VALUES
       (1, 4), (2, 1), (2, 2), (2, 5), (3, 1);