/*
Created			20.7.2012
Modified		20.7.2012
Project		
Model		
Company		
Author			Sano Fužir
Version		
Database		mySQL 5 
*/

drop table IF EXISTS news;
drop table IF EXISTS category;
drop table IF EXISTS image;
drop table IF EXISTS user;
drop table IF EXISTS ad;


Create table ad (
	id_ad Int NOT NULL AUTO_INCREMENT,
	id_user Int NOT NULL,
	category Int NOT NULL,
	name Varchar(50),
	price Int,
	description Text,
	status Varchar(20),
	creation_date Date,
 Primary Key (id_ad)) ENGINE = MyISAM;

Create table user (
	id_user Int NOT NULL AUTO_INCREMENT,
	username Varchar(40) NOT NULL,
	password Varchar(20) NOT NULL,
	email Varchar(40) NOT NULL,
	status Varchar(20),
	name Varchar(40),
	surname Varchar(40),
	telephone Varchar(20),
	UNIQUE (username),
	UNIQUE (email),
 Primary Key (id_user)) ENGINE = MyISAM;

Create table image (
	id_image Int NOT NULL AUTO_INCREMENT,
	name Varchar(40),
	id_ad Int NOT NULL,
 Primary Key (id_image)) ENGINE = MyISAM;

Create table category (
	category Int NOT NULL AUTO_INCREMENT,
	name Varchar(20),
	UNIQUE (name),
 Primary Key (category)) ENGINE = MyISAM;

Create table news (
	id_news int NOT NULL AUTO_INCREMENT,
	name Varchar(40) NOT NULL,
	text Text,
	active Varchar(20),
	id_user Int NOT NULL,
 Primary Key (id_news)) ENGINE = MyISAM;


Alter table image add Foreign Key (id_ad) references ad (id_ad) on delete  restrict on update  restrict;
Alter table ad add Foreign Key (id_user) references user (id_user) on delete  restrict on update  restrict;
Alter table news add Foreign Key (id_user) references user (id_user) on delete  restrict on update  restrict;
Alter table ad add Foreign Key (category) references category (category) on delete  restrict on update  restrict;


