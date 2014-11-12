DROP DATABASE if EXISTS imagedb;
CREATE DATABASE imagedb;
USE imagedb;

DROP TABLE IF EXISTS userProfiles;
CREATE TABLE userProfiles (
        userProfileId   int(11) NOT NULL AUTO_INCREMENT,
        userProfileEmail varchar(64) COLLATE utf8_unicode_ci NOT NULL,
        userProfileFirstName varchar(20) COLLATE utf8_unicode_ci,
        userProfileLastName varchar(64) COLLATE utf8_unicode_ci,
        userProfileDateModified  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,       
      
        PRIMARY KEY (userProfileId),
        UNIQUE KEY (userProfileEmail),
        FOREIGN KEY (userId) REFERENCES users(userId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE userPictures (
        userPictureId   int(11) NOT NULL AUTO_INCREMENT,
        userPicture blob NOT NULL,
        userPictureIcon blob NOT NULL,
        userPictureType varchar(25) NOT NULL,
  image longblob NOT NULL,
  image_size varchar(25) NOT NULL,
    userProfilePicture longblob;
        
        image_type varchar(25) NOT NULL,
  image longblob NOT NULL,
  image_size varchar(25) NOT NULL,
        PRIMARY KEY (userProfileId),
        UNIQUE KEY (userProfileEmail),
        FOREIGN KEY (userId) REFERENCES users(userId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO users (userId, userName, userPasswordHash) VALUES 
	   (1, 'Kay', '$2y$10$TmIMGqe3o5JSQBw9v05qZ.qdNUBj0F7yWt1KpuS4rTNNFkYHWxiku');  
INSERT INTO users (userId, userName,  userPasswordHash) VALUES 
	   (2, 'John', '$2y$10$Dl7HMpsFn/nIoceQM1Cmsu70oC7CkqAhlW8HfVc9knYtHnK3UnUGC');

INSERT INTO userProfiles (userProfileId, userProfileEmail, userProfileFirstName, 
       userProfileLastName, userId) VALUES 
	   (1, 'John@yahoo.com', 'John', 'Doe', 2);  

INSERT INTO userProfiles (userProfileId, userProfileEmail, userProfileFirstName, 
       userProfileLastName, userId) VALUES 
	   (2, 'Kay@gmail.com', 'Kay', 'Robbins', 1);  

INSERT INTO commentTags VALUES
      (1, 'layout'), (2, 'colors'), (3, 'semantics'), (4, 'content');

INSERT INTO memberClasses VALUES
        (1, 'reader'), (2, 'nosher'), (3, 'moderator');

INSERT INTO comments (evaluationUrl, comment, memberClassId)
        VALUES ('http://www.npr.org/blogs/thetwo-way/2014/09/27/351986593/hiker-catches-volcanos-eruption-on-video-and-is-overtaken-by-ash', 'Shows the incredible power of nature', 1);
INSERT INTO comments (evaluationUrl, comment, memberClassId)
        VALUES ('http://validator.w3.org/', 'Why doesn\t the W3C semantic validator allow file upload?', 1);

INSERT INTO comments (evaluationUrl, comment, memberClassId)
        VALUES ('https://www.flickr.com/explore/', 'Flickr explore page always has some pheonomenal pictures', 3);
		
INSERT INTO comments (evaluationUrl, comment, memberClassId)
        VALUES ('http://www.cbc.ca/news/technology/bash-bug-aka-shellshock-has-no-easy-fix-1.2779383', 'The Bash shellshock has no easy fix', 2);


INSERT INTO commentTagMap (commentTagId, commentId) VALUES
       (1, 1), (1, 4), (1, 3), (2, 1), (2, 4), (4, 3);