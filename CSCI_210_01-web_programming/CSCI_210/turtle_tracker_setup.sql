CREATE DATABASE wp_turtle;
USE wp_turtle;

CREATE TABLE IF NOT EXISTS species
(
	species_name VARCHAR(30) NOT NULL,
	average_size DECIMAL(6,2) NOT NULL,
	average_weight DECIMAL(6,2) NOT NULL,
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
	habitat_room CHAR(4) NOT NULL,
	habitat_name CHAR(35) NOT NULL,
	average_temp DECIMAL(5,2),
	average_humidity DECIMAL(5,2),
	sqft DECIMAL(6,2),
	biome_name VARCHAR(35) NOT NULL,
	constraint pk_habitat primary key (habitat_room),
	constraint fk_biome foreign key (biome_name) references biome(biome_name)
);

CREATE TABLE IF NOT EXISTS turtle
(
	turtle_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	turtle_name VARCHAR(16) NOT NULL,
	adoption_date DATE NOT NULL,
	weight DECIMAL(6,2),
	size DECIMAL(5,2),
	gender ENUM("Male","Female") DEFAULT"Male", 
	habitat_room CHAR(4) NOT NULL,
	diet_id INT UNSIGNED NOT NULL,
	species_name VARCHAR(16) NOT NULL,
	turtle_image LONGBLOB,
	image_size INT(255),
	image_type VARCHAR(25),
	constraint pk_turtle primary key (turtle_id),
	constraint fk_habitat foreign key (habitat_room) references habitat(habitat_room),
	constraint fk_diet foreign key (diet_id) references diet(diet_id),
	constraint fk_species foreign key (species_name) references species(species_name)
);