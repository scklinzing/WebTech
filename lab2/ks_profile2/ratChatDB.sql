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
        color				 varchar(7) not null,
        bday				 varchar(7) not null,
        reason				 int(1) not null,
        ratsOwned			 int(1) not null
);

insert into user (username, email, password, phoneNum, website, color, bday, reason, ratsOwned)
        values ('SillyGirl','sillyGirl@mail.com', 'password', '2102344453', 'http://www.google.com/', '#000000', '1990-10', '1', '3');
        
insert into user (username, email, password, phoneNum, website, color, bday, reason, ratsOwned)
        values ('MrAwesome','mrawesome@mail.com', 'password', '2442321353', 'http://www.dapper.com.au/', '#000000', '1991-12', '2', '0');
        
insert into user (username, email, password, phoneNum, website, color, bday, reason, ratsOwned)
        values ('RatLover345','rat_lover_345@mail.com', 'password', '3612244453', 'www.gamestop.com/', '#000000', '1994-09', '0', '0');