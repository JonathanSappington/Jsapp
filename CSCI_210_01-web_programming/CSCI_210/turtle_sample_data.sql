USE wp_turtle;

insert into species
(species_name, average_size, average_weight, color)
values
("Mud Turtle", 4, 9.3, "yellow"),
("Musk Turtle", 7, 48, "black"),
("Pitted Shell Turtle", 22, 705.47, "brown"),
("Pond Turtle", 9, 38.4, "yellow"),
("Chicken Turtle", 9, 34.35, "grey"),
("Painted Turtle", 6, 17.63, "orange"),
("Terrapin", 12, 8.5, "grey"),
("Sea Turtles", 48, 6720, "light-grey"),
("Tortoise", 18, 384, "grey"),
("Snapping Turtle", 12, 368, "brown"),
("Spotted Turtle", 4.5, 12, "green"),
("Wood Turtle", 8, 40, "brown");

insert into food
(food_name, food_inventory)
values
('Marsh Mush', 25),
('Diet Kelp', 32),
('Sea Side Sauttee', 45),
('Ocean BBQ', 12),
('Mello Lagoon', 65),
('Snapping Kibble', 44),
('Shell Food', 38),
('Seaweed Bites', 76);

insert into biome
(biome_name)
values
('Grass Lands'),
('Swamp'),
('Plains'),
('Ocean'),
('Lake'),
('Pond');

insert into diet
(food_amount, water_amount, food_name)
values
(25,30,"Marsh Mush"),
(10,20,"Ocean BBQ"),
(20,10,"Shell Food"),
(25,34,"Seaweed Bites"),
(12,42,"Diet Kelp"),
(24,35,"Snapping Kibble");

insert into habitat
(habitat_room, habitat_name, average_temp, average_humidity, sqft, biome_name)
values
("0001","Kelpy Islands",1,5,200,"Ocean"),
("0002","Turtle Towers",20,5,200,"Swamp"),
("0003","Clam Town",10,3,200,"Plains"),
("0004","Salty Shores",34,8,200,"Lake"),
("0005","Swampy Getaway",42,6,200,"Pond"),
("0006","Marsh Land",56,35,200,"Grass Lands");

insert into turtle
(turtle_name, adoption_date, weight, size, gender, habitat_room, diet_id, species_name)
values
("Veronika", "2022-07-11", 12, 28, "Male", "0006", 1, "Mud Turtle"),
("Clute", "2020-02-23", 26, 16, "Female", "0002", 2, "Pond Turtle"),
("Wanda", "2018-08-14", 14, 5, "Male", "0004", 6, "Musk Turtle"),
("Dagall", "2022-08-02", 1, 48, "Female", "0003", 2, "Tortoise"),
("Alberta", "2019-08-16", 32, 19, "Female", "0003", 1, "Sea Turtles"),
("Adaiha", "2022-11-15", 38, 37, "Male", "0004", 1, "Sea Turtles"),
("Steffie", "2022-09-23", 32, 2, "Female", "0001", 1, "Sea Turtles"),
("Rainger", CURRENT_TIMESTAMP, 10, 1, "Male", "0001", 4, "Mud Turtle"),
("Crudden", "2018-11-09", 2, 11, "Male", "0001", 5, "Spotted Turtle"),
("Manheim", "2022-07-13", 36, 11, "Male", "0004", 2, "Mud Turtle"),
("Filip", "2022-04-08", 2, 8, "Female", "0001", 1, "Tortoise"),
("Hulen", "2022-09-24", 27, 20, "Male", "0003", 5, "Mud Turtle"),
("Cesar", "2021-09-13", 3, 6, "Male", "0006", 6, "Musk Turtle"),
("Kryska", "2022-08-02", 26, 7, "Female", "0003", 2, "Chicken Turtle"),
("Silden", "2019-01-29", 1, 3, "Female", "0001", 5, "Sea Turtles"),
("Woodall", "2018-08-14", 22, 9, "Female", "0001", 5, "Mud Turtle"),
("Albertina", "2022-06-23", 15, 9, "Male", "0003", 5, "Spotted Turtle"),
("Cas", "2022-02-13", 39, 37, "Male", "0006", 4, "Sea Turtles"),
("Iormina", "2018-04-29", 16, 5, "Female", "0002", 6, "Pond Turtle"),
("Wilber", "2019-09-05", 14, 3, "Male", "0006", 6, "Musk Turtle");