create table users(
	user_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(100) character set utf8 not null,
    email varchar(100) character set utf8 not null unique,
    password varchar(100) character set utf8 not null,
    country varchar(100) character set utf8 null,
    city varchar(100) character set utf8 null,
    profile_image varchar(100) character set utf8 null
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
-------------------------------------------------------------------------------------------------
---OBAVEZNI INSERTI
-------------------------------------------------------------------------------------------------
insert into sf_role values(null,'Admin');
-------------------------------------------------------------------------------------------------
---OPCIONI INSERTI
-------------------------------------------------------------------------------------------------
insert into users values(null,'Nikola Bibercic','nikolabibercic@gmail.com','123','','','');
insert into user_role values(null,1,1);