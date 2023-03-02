/* 
-- CSCI 240 Databases and SQL
-- Final Insert Data
-- Written by Jonathan J Sappington
-- Instructor Arthur Bennett
-- Date 05/11/2022
*/

USE turtle_tracker;

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

insert into state
(state_id, state_name)
values
("AL", "Alabama"),
("AK", "Alaska"),
("AS", "American Samoa"),
("AZ", "Arizona"),
("AR", "Arkansas"),
("CA", "California"),
("CO", "Colorado"),
("CT", "Connecticut"),
("DE", "Delaware"),
("DC", "District Of Columbia"),
("FM", "Federated States Of Micronesia"),
("FL", "Florida"),
("GA", "Georgia"),
("GU", "Guam"),
("HI", "Hawaii"),
("ID", "Idaho"),
("IL", "Illinois"),
("IN", "Indiana"),
("IA", "Iowa"),
("KS", "Kansas"),
("KY", "Kentucky"),
("LA", "Louisiana"),
("ME", "Maine"),
("MH", "Marshall Islands"),
("MD", "Maryland"),
("MA", "Massachusetts"),
("MI", "Michigan"),
("MN", "Minnesota"),
("MS", "Mississippi"),
("MO", "Missouri"),
("MT", "Montana"),
("NE", "Nebraska"),
("NV", "Nevada"),
("NH", "New Hampshire"),
("NJ", "New Jersey"),
("NM", "New Mexico"),
("NY", "New York"),
("NC", "North Carolina"),
("ND", "North Dakota"),
("MP", "Northern Mariana Islands"),
("OH", "Ohio"),
("OK", "Oklahoma"),
("OR", "Oregon"),
("PW", "Palau"),
("PA", "Pennsylvania"),
("PR", "Puerto Rico"),
("RI", "Rhode Island"),
("SC", "South Carolina"),
("SD", "South Dakota"),
("TN", "Tennessee"),
("TX", "Texas"),
("UT", "Utah"),
("VT", "Vermont"),
("VI", "Virgin Islands"),
("VA", "Virginia"),
("WA", "Washington"),
("WV", "West Virginia"),
("WI", "Wisconsin"),
("WY", "Wyoming");

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
(habitat_id, habitat_name, average_temp, average_humidity, sqft, biome_name)
values
("0001","Kelpy Islands",1,5,152,"Ocean"),
("0002","Turtle Towers",20,5,256,"Swamp"),
("0003","Clam Town",10,3,135,"Plains"),
("0004","Salty Shores",34,8,89,"Lake"),
("0005","Swampy Getaway",42,6,232,"Pond"),
("0006","Marsh Land",56,35,169,"Grass Lands");

insert into caretaker
(care_fname, care_lname, care_phone, care_address, care_email, hire_date, city,zip,salary,shift_start,shift_end,state_id)
values
("Colly", "Clift", "4066653305","72 Carson St.", "CollyVClift@gmail.com", "2021-12-20", "Nashua", "03060", 263.16, "09:00:00", "17:00:00", "NH"),
("Trina", "Jaclyn", "4066253436","7 Sherman Ave.", "TrinaBJaclyn@gmail.com", "2019-10-25", "Friendswood", "77546", 66.41, "09:00:00", "17:00:00", "TX"),
("Gwendolyn", "Janela", "4064404606","7962 East High St.", "GwendolynWJanela@gmail.com", "2019-06-12", "Macon", "31204", 383.87, "09:00:00", "17:00:00", "GA"),
("Edith", "Cosme", "4065406455","7402 Addison Ave.", "EdithECosme@gmail.com", "2018-02-15", "Bozeman", "59715", 218.68, "08:00:00", "16:00:00", "MT"),
("Timi", "Airlie", "4061641115","688 Gartner Avenue", "TimiDAirlie@gmail.com", CURRENT_TIMESTAMP, "Denver", "80202", 131.69, "08:00:00", "16:00:00", "CO"),
("Jillian", "Wetzel", "4064513232","98 Amherst Court", "JillianRWetzel@gmail.com", CURRENT_TIMESTAMP, "Franklin", "37064", 355.86, "10:00:00", "18:00:00", "TN"),
("Riki", "Marras", "4065545035","9538 Courtland St.", "RikiEMarras@gmail.com", "2021-08-05", "Charleston", "25301", 305.62, "10:00:00", "18:00:00", "WV"),
("Rosabella", "Chretien", "4063234226","7228 Canal Drive", "RosabellaBChretien@gmail.com", CURRENT_TIMESTAMP, "Harrisonburg", "22801", 190.55, "11:00:00", "19:00:00", "VA"),
("Ursala", "Cardinal", "4062056245","8150 Meadow St.", "UrsalaDCardinal@gmail.com", "2018-07-01", "Ocoee", "34761", 42.72, "08:00:00", "16:00:00", "FL"),
("Cilka", "Carolin", "4063124610","33 Marlborough Lane", "CilkaBCarolin@gmail.com", CURRENT_TIMESTAMP, "New Berlin", "53146", 136.42, "09:00:00", "17:00:00", "WI"),
("Karel", "Lucier", "4062350122","9671 Jennings Street", "KarelTLucier@gmail.com", "2021-03-13", "Anchorage", "99501", 180.18, "11:00:00", "19:00:00", "AK"),
("Athena", "Tori", "4065425303","44 S. Hudson St.", "AthenaGTori@gmail.com", CURRENT_TIMESTAMP, "Thornton", "80229", 241.86, "08:00:00", "16:00:00", "CO"),
("Rene", "Higinbotham", "4063430414","7175 SW. Woodside Lane", "ReneKHiginbotham@gmail.com", "2018-04-11", "Wilmington", "19801", 120.11, "10:00:00", "18:00:00", "DE"),
("Darice", "Stine", "4061114016","9584 Brook St.", "DariceMStine@gmail.com", CURRENT_TIMESTAMP, "Annapolis", "21403", 218.24, "09:00:00", "17:00:00", "MD");

insert into turtle
(turtle_name, adoption_date, weight, size, gender, habitat_id, diet_id, species_name)
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
("Filip", "2022-04-08", 2, 8, "Female", "0005", 1, "Tortoise"),
("Hulen", "2022-09-24", 27, 20, "Male", "0003", 5, "Mud Turtle"),
("Cesar", "2021-09-13", 3, 6, "Male", "0006", 6, "Musk Turtle"),
("Kryska", "2022-08-02", 26, 7, "Female", "0003", 2, "Chicken Turtle"),
("Silden", "2019-01-29", 1, 3, "Female", "0001", 5, "Sea Turtles"),
("Woodall", "2018-08-14", 22, 9, "Female", "0001", 5, "Mud Turtle"),
("Albertina", "2022-06-23", 15, 9, "Male", "0003", 5, "Spotted Turtle"),
("Cas", "2022-02-13", 39, 37, "Male", "0005", 4, "Sea Turtles"),
("Iormina", "2018-04-29", 16, 5, "Female", "0002", 6, "Pond Turtle"),
("Wilber", "2019-09-05", 14, 3, "Male", "0006", 6, "Musk Turtle");

insert into turtle_schedule
(caretaker_id, turtle_id, schedule_start, schedule_end)
values
(1, 1, "9:00:00", "11:00:00"),
(1, 2, "11:00:00", "13:00:00"),
(1, 4, "13:00:00", "15:00:00"),
(1, 20, "15:00:00", "17:00:00"),
(2, 19, "9:00:00", "11:00:00"),
(2, 5, "11:00:00", "14:00:00"),
(2, 2, "14:00:00", "17:00:00"),
(3, 1, "9:00:00", "11:00:00"),
(3, 8, "11:00:00", "13:00:00"),
(3, 20, "13:00:00", "15:00:00"),
(3, 17, "15:00:00", "17:00:00"),
(5, 15, "8:00:00", "12:00:00"),
(5, 6, "12:00:00", "16:00:00"),
(6, 18, "10:00:00", "14:00:00"),
(6, 3, "14:00:00", "18:00:00"),
(7, 7, "10:00:00", "14:00:00"),
(7, 17, "14:00:00", "18:00:00"),
(8, 4, "11:00:00", "13:00:00"),
(8, 19, "13:00:00", "15:00:00"),
(8, 5, "15:00:00", "17:00:00"),
(8, 16, "17:00:00", "19:00:00"),
(9, 19, "8:00:00", "12:00:00"),
(9, 17, "12:00:00", "16:00:00"),
(10, 16, "9:00:00", "11:00:00"),
(10, 4, "11:00:00", "14:00:00"),
(10, 18, "14:00:00", "17:00:00"),
(11, 8, "11:00:00", "13:00:00"),
(11, 20, "13:00:00", "15:00:00"),
(11, 19, "15:00:00", "17:00:00"),
(11, 5, "17:00:00", "19:00:00"),
(12, 15, "8:00:00", "10:00:00"),
(12, 6, "10:00:00", "13:00:00"),
(12, 10, "13:00:00", "15:00:00"),
(13, 8, "10:00:00", "12:00:00"),
(13, 9, "12:00:00", "14:00:00"),
(13, 7, "14:00:00", "16:00:00"),
(13, 6, "16:00:00", "18:00:00"),
(14, 5, "9:00:00", "11:00:00"),
(14, 11, "11:00:00", "14:00:00"),
(14, 9, "14:00:00", "17:00:00");