drop database if exists ks_data;
create database ks_data;
use ks_data;

drop table if exists user;
create table user (
        userID		       	 int primary key auto_increment,
        username         	 varchar(40) not null,
        email    		  	 varchar(100) not null,
        password             varchar(40) not null,
        phoneNum			 int(10) not null,
        website				 varchar(1024) not null,
        favcolor				 varchar(7) not null,
        bday				 varchar(7) not null,
        whyRatChat			 int not null,
        ratsOwned			 int not null
);

insert into user (username, email, password, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned)
        values ('SillyGirl','sillyGirl@mail.com', 'password', '2102344453', 'http://www.google.com/', '#ab0021', '1990-10', '1', '3');
        
insert into user (username, email, password, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned)
        values ('MrAwesome','mrawesome@mail.com', 'password', '2442321353', 'http://www.dapper.com.au/', '#ffffff', '1991-12', '2', '0');
        
insert into user (username, email, password, phoneNum, website, favcolor, bday, whyRatChat, ratsOwned)
        values ('RatLover345','rat_lover_345@mail.com', 'password', '3612244453', 'www.gamestop.com/', '#f003ac', '1994-09', '3', '0');