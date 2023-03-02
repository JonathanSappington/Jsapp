CREATE DATABASE turtle_tracker;
USE turtle_tracker;

CREATE TABLE IF NOT EXISTS species
(
	species_name VARCHAR(16) NOT NULL,
    average_weight DECIMAL(6,2) NOT NULL,
	average_size DECIMAL(4,2) NOT NULL,
	color VARCHAR(20) NOT NULL,
	constraint pk_species primary key (species_name)
);

CREATE TABLE IF NOT EXISTS food
(
	food_name VARCHAR(20) NOT NULL,
	food_inventory INT(5),
	constraint pk_food primary key (food_name)
);

CREATE TABLE IF NOT EXISTS biome
(
	biome_name VARCHAR(35) NOT NULL,
	constraint pk_biome primary key (biome_name)
);

CREATE TABLE IF NOT EXISTS state
(
	state_id CHAR(2) NOT NULL,
	state_name VARCHAR(20) NOT NULL,
	constraint pk_state primary key (state_id)
);

CREATE TABLE IF NOT EXISTS diet
(
	diet_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	food_amount DECIMAL(4,2) NOT NULL,
	water_amount DECIMAL(4,2) NOT NULL,
	food_name VARCHAR(20) NOT NULL,
	constraint pk_diet primary key (diet_id),
	constraint fk_food foreign key (food_name) references food(food_name)
);

CREATE TABLE IF NOT EXISTS habitat
(
	habitat_id CHAR(4) NOT NULL,
	habitat_name VARCHAR(35) NOT NULL,
	average_temp DECIMAL(5,2),
	average_humidity DECIMAL(5,2),
	sqft DECIMAL(6,2),
	biome_name VARCHAR(35) NOT NULL DEFAULT "Swamp",
	constraint pk_habitat primary key (habitat_id),
	constraint fk_biome foreign key (biome_name) references biome(biome_name)
);

CREATE TABLE IF NOT EXISTS caretaker
(
	caretaker_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	care_fname VARCHAR(20) NOT NULL,
	care_lname VARCHAR(20) NOT NULL,
	care_phone CHAR(10) NOT NULL,
	care_address VARCHAR(50) NOT NULL,
	care_email VARCHAR(50),
	hire_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, 
	city VARCHAR(20) NOT NULL, 
	zip CHAR(5) NOT NULL, 
	salary DECIMAL(8,2), 
	shift_start TIME NOT NULL,
	shift_end TIME NOT NULL,
	state_id CHAR(2) NOT NULL DEFAULT "MT", 
	constraint pk_caretaker primary key (caretaker_id),
	constraint fk_state foreign key (state_id) references state(state_id)
);

CREATE TABLE IF NOT EXISTS turtle
(
	turtle_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	turtle_name VARCHAR(16) NOT NULL,
	adoption_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    weight DECIMAL(6,2),
	size DECIMAL(4,2),
	gender ENUM("Male","Female") DEFAULT"Male", 
	habitat_id CHAR(4) NOT NULL,
	diet_id INT UNSIGNED NOT NULL,
	species_name VARCHAR(16) NOT NULL,
	constraint pk_turtle primary key (turtle_id),
	constraint fk_habitat foreign key (habitat_id) references habitat(habitat_id),
	constraint fk_diet foreign key (diet_id) references diet(diet_id),
	constraint fk_species foreign key (species_name) references species(species_name)
);

CREATE TABLE IF NOT EXISTS turtle_schedule
(
	caretaker_id INT UNSIGNED NOT NULL,
	turtle_id INT UNSIGNED NOT NULL,
	schedule_start TIME NOT NULL,
	schedule_end TIME NOT NULL,
	constraint pk_turtle_schedule primary key (caretaker_id,turtle_id),
	constraint fk_caretaker foreign key (caretaker_id) references caretaker(caretaker_id),
	constraint fk_turtle foreign key (turtle_id) references turtle(turtle_id)
);