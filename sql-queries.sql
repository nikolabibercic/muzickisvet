CREATE TABLE users(
	user_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(100) character set utf8 not null,
    email varchar(100) character set utf8 not null unique,
    password varchar(100) character set utf8 not null,
    country varchar(100) character set utf8 null,
    city varchar(100) character set utf8 null,
    profile_image varchar(100) character set utf8 null,
	date_created datetime not null
);

CREATE TABLE sf_role(
	role_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
);

CREATE TABLE user_role(
	user_role_id int AUTO_INCREMENT PRIMARY KEY,
	user_id int not null,
	role_id int not null,
	FOREIGN KEY (user_id) REFERENCES users(user_id),
	FOREIGN KEY (role_id) REFERENCES sf_role(role_id)
);

CREATE TABLE sf_ad_category(
	ad_category_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
);

CREATE TABLE sf_ad_type(
	ad_type_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
);

CREATE TABLE sf_tag(
	tag_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
);

CREATE TABLE sf_currency(
	currency_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
);

CREATE TABLE sf_country(
	country_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
);

CREATE TABLE ads(
	ad_id int AUTO_INCREMENT PRIMARY KEY,
	title varchar(50) character set utf8 not null,
	text varchar(300) character set utf8 not null,
	country_id int not null,
    city varchar(100) character set utf8 not null,
	ad_category_id int not null,
	ad_type_id int not null,
	price int not null,
	currency_id int not null,
	seen int not null,
	date_created datetime not null,
	user_id int not null,
	FOREIGN KEY (country_id) REFERENCES sf_country(country_id),
	FOREIGN KEY (ad_category_id) REFERENCES sf_ad_category(ad_category_id),
	FOREIGN KEY (ad_type_id) REFERENCES sf_ad_type(ad_type_id),
	FOREIGN KEY (currency_id) REFERENCES sf_currency(currency_id),
	FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE ad_tag(
	ad_tag_id int AUTO_INCREMENT PRIMARY KEY,
	ad_id int not null,
	tag_id int not null,
	FOREIGN KEY (ad_id) REFERENCES ads(ad_id),
	FOREIGN KEY (tag_id) REFERENCES sf_tag(tag_id)
);

CREATE TABLE ad_image(
	ad_image_id int AUTO_INCREMENT PRIMARY KEY,
	ad_id int not null,
	image_path varchar(250) character set utf8 not null,
	FOREIGN KEY (ad_id) REFERENCES ads(ad_id)
);
-------------------------------------------------------------------------------------------------
---OBAVEZNI INSERTI
-------------------------------------------------------------------------------------------------
insert into sf_role values(null,'Admin');

insert into sf_ad_category values(null,'Vokal');
insert into sf_ad_category values(null,'Gitara');
insert into sf_ad_category values(null,'Bas gitara');
insert into sf_ad_category values(null,'Klavijatura');
insert into sf_ad_category values(null,'Harmonika');
insert into sf_ad_category values(null,'Bubnjevi');
insert into sf_ad_category values(null,'Gudački instrumenti');
insert into sf_ad_category values(null,'Duvački instrumenti');
insert into sf_ad_category values(null,'Perkusije');
insert into sf_ad_category values(null,'Bend');
insert into sf_ad_category values(null,'Studio');

insert into sf_ad_type values(null,'Standard');
insert into sf_ad_type values(null,'Premium');

insert into sf_currency values(null,'EUR');
insert into sf_currency values(null,'RSD');

insert into sf_country values(null,'Srbija');
insert into sf_country values(null,'Hrvatska');
insert into sf_country values(null,'Bosna i Hercegovina');
insert into sf_country values(null,'Crna Gora');

insert into sf_tag values(null,'Pop');
insert into sf_tag values(null,'Rock');
insert into sf_tag values(null,'Folk');
insert into sf_tag values(null,'Jazz');
insert into sf_tag values(null,'Metal');
insert into sf_tag values(null,'Rhythm & blues (R&B)');
insert into sf_tag values(null,'Rap/Hip-hop');
insert into sf_tag values(null,'Funk/Soul');
insert into sf_tag values(null,'Electronic');
-------------------------------------------------------------------------------------------------
---OPCIONI INSERTI
-------------------------------------------------------------------------------------------------
insert into users values(null,'Nikola Bibercic','nikolabibercic@gmail.com','123','','','',CURRENT_TIMESTAMP());
insert into user_role values(null,1,1);