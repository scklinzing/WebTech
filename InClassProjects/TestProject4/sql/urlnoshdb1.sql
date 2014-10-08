DROP DATABASE if EXISTS urlnoshdb1;
CREATE DATABASE urlnoshdb1;
USE urlnoshdb1;

DROP TABLE if EXISTS memberClasses;
CREATE TABLE memberClasses (
        memberClassId             int PRIMARY KEY,
        memberClassName           varchar (255) UNIQUE
);

DROP TABLE if EXISTS comments;
CREATE TABLE comments (
        commentId       	 int PRIMARY KEY AUTO_INCREMENT,
        firstName         	 varchar(40) NOT NULL,
        memberClassId        int NOT NULL REFERENCES memberClasses(memberClassId) ON DELETE RESTRICT,
        evaluationUrl        varchar(1024) NOT NULL,
        comment	             varchar(2048)
);

INSERT INTO memberClasses VALUES
        (1, 'reader'), (2, 'nosher'), (3, 'moderator');
        
INSERT INTO comments (firstName, evaluationUrl, memberClassId, comment)
        VALUES ('Kay','http://www.npr.org/blogs/thetwo-way/2014/09/27/351986593/hiker-catches-volcanos-eruption-on-video-and-is-overtaken-by-ash', 1, 'Shows the incredible power of nature');
INSERT INTO comments (firstName, evaluationUrl, memberClassId, comment)
        VALUES ('George', 'http://validator.w3.org/', 1, 'Why doesn\t the W3C semantic validator allow file upload?');

INSERT INTO comments (firstName, evaluationUrl, memberClassId, comment)
        VALUES ('Hero1', 'https://www.flickr.com/explore/', 2, 'Flickr explore page always has some pheonomenal pictures');
		
INSERT INTO comments (firstName, evaluationUrl, memberClassId, comment)
        VALUES ('VoidBringer', 'http://www.cbc.ca/news/technology/bash-bug-aka-shellshock-has-no-easy-fix-1.2779383', 3, 'The Bash shellshock has no easy fix');
        