CREATE DATABASE wp_user;
USE wp_user;

CREATE TABLE IF NOT EXISTS state
(
	state_id CHAR(2) NOT NULL,
	state_name VARCHAR(50) NOT NULL,
	constraint pk_state primary key (state_id)
);

CREATE TABLE IF NOT EXISTS new_user
(
	user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	user_fname VARCHAR(20) NOT NULL,
	user_lname VARCHAR(20) NOT NULL,
	user_phone CHAR(10) NOT NULL,
	user_address VARCHAR(50) NOT NULL,
	user_email VARCHAR(50),
	creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, 
	city VARCHAR(20) NOT NULL, 
	zip CHAR(5) NOT NULL, 
	username VARCHAR(100) NOT NULL,
	password VARCHAR(255) NOT NULL,
	state_id CHAR(2) NOT NULL,
	constraint pk_user primary key (user_id),
	constraint fk_state foreign key (state_id) references state(state_id)
);