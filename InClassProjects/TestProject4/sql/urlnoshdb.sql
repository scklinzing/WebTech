drop database if exists urlnoshdb;
create database urlnoshdb;
use urlnoshdb;

drop table if exists comments;
create table comments (
        commentId       	 int primary key auto_increment,
        firstName         	 varchar(40) not null,
        evaluationUrl        varchar(1024) not null,
        comment	             varchar(2048)
);

insert into comments (firstName, evaluationUrl, comment)
        values ('Kay','http://www.npr.org/blogs/thetwo-way/2014/09/27/351986593/hiker-catches-volcanos-eruption-on-video-and-is-overtaken-by-ash', 'Shows the incredible power of nature');
insert into comments (firstName, evaluationUrl, comment)
        values ('George', 'http://validator.w3.org/', 'Why doesn\t the W3C semantic validator allow file upload?');

insert into comments (firstName, evaluationUrl, comment)
        values ('Hero1', 'https://www.flickr.com/explore/', 'Flickr explore page always has some pheonomenal pictures');
		
insert into comments (firstName, evaluationUrl, comment)
        values ('VoidBringer', 'http://www.cbc.ca/news/technology/bash-bug-aka-shellshock-has-no-easy-fix-1.2779383', 'The Bash shellshock has no easy fix');