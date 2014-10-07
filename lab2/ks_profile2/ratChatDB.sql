drop database if exists ratChatDB;
create database ratChatDB;
use ratChatDB;

drop table if exists user;
create table user (
        userID		       	 int primary key auto_increment,
        username         	 varchar(40) not null,
        email    		  	 varchar(100) not null,
        password             varchar(40) not null,
        phoneNum			 int(10) not null,
        website				 varchar(1024) not null,
        color				 varchar(10) not null,
        birthMO				 int(2) not null,
        birthYR				 int(4) not null,
        reason				 int(1) not null,
        ratsOwned			 int(1) not null
);

insert into user (username, email, password, phoneNum, website, color, birthMO, birthYR, reason, ratsOwned)
        values ('SillyGirl','sillyGirl@mail.com', 'password', '2102344453', 'www.google.com', 'pink', '6', '1992', '1', '3');
        
