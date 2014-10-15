DROP DATABASE if EXISTS urlnoshdbphase1;
CREATE DATABASE urlnoshdbphase1;
USE urlnoshdbphase1;


DROP TABLE IF EXISTS comments;
CREATE TABLE comments (
        commentId       	 int primary key auto_increment,
        evaluationUrl        varchar(1024) not null,
        comment	             varchar(2048)
);

INSERT INTO comments (evaluationUrl, comment)
        VALUES ('http://www.npr.org/blogs/thetwo-way/2014/09/27/351986593/hiker-catches-volcanos-eruption-on-video-and-is-overtaken-by-ash', 'Shows the incredible power of nature');
INSERT INTO comments (evaluationUrl, comment)
        VALUES ('http://validator.w3.org/', 'Why doesn\t the W3C semantic validator allow file upload?');

INSERT INTO comments (evaluationUrl, comment)
        VALUES ('https://www.flickr.com/explore/', 'Flickr explore page always has some pheonomenal pictures');
		
INSERT INTO comments (evaluationUrl, comment)
        VALUES ('http://www.cbc.ca/news/technology/bash-bug-aka-shellshock-has-no-easy-fix-1.2779383', 'The Bash shellshock has no easy fix');


