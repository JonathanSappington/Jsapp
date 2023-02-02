/* 
-- CSCI 240 Databases and SQL
-- Final Select Statements
-- Written by Jonathan J Sappington
-- Instructor Arthur Bennett
-- Date 05/11/2022
*/


USE turtle_tracker;

-- Turtle Information [Start]
-- Get turtle name weight in ounces and size in inches
SELECT turtle_id,
		turtle_name,
		CONCAT(weight," oz") AS "Weight (in ounces)",
        CONCAT(size,'″') AS "Size (in inches)"
FROM turtle;

-- Get total number of turtles associated with individual species
SELECT species_name AS "Species Name", 
		COUNT(*) AS "Total Species"
FROM turtle
GROUP BY species_name;

-- Get turtle id, name and adoption date in mm/dd/yy format
SELECT turtle_id,
		turtle_name,
        DATE_FORMAT(adoption_date, "%m/%d/%Y") AS "Date Adopted"
FROM turtle;

-- Get a turtles id, name, weight and size, and the corrosponding species name, weight average and size average
-- Order by turtle_id
SELECT t.turtle_id AS "ID",
		t.turtle_name AS "Name",
        t.species_name AS "Species",
		CONCAT(t.weight," oz") AS "Weight (in ounces)",
        CONCAT(t.size,'″') AS "Size (in inches)",
        CONCAT(s.average_weight," oz") AS "Average Weight (in ounces)",
        CONCAT(s.average_size,'″') AS "Average Size (in inches)"
FROM turtle t INNER JOIN species s
ON t.species_name = s.species_name
ORDER BY turtle_id;

-- Get the turtles id, name and favorite food
-- Order by turtle_id
SELECT t.turtle_id, t.turtle_name, d.food_name AS "Favorite Food"
FROM turtle t INNER JOIN diet d
ON t.diet_id = d.diet_id
ORDER BY t.turtle_id;

-- Get total number of turtles that eat each food item
-- Order by turtle_id
SELECT d.food_name AS "Food", COUNT(*) AS "Total Turtles"
FROM turtle t INNER JOIN diet d
ON t.diet_id = d.diet_id
GROUP BY d.food_name;

-- food quantity for each food product
SELECT food_name,
	CONCAT(food_inventory," Bags") AS "Inventory"
FROM food;

-- Turtle Information [End]

-- Caretaker Information [Start]
-- Get caretaker id, last name, first name, and salary in monthly and yearly amounts
SELECT caretaker_id AS "ID" ,
	care_lname AS "Last Name",
    care_fname AS "First Name",
	CONCAT('$', FORMAT(salary, 2)) AS "Salary (Monthly)",
    CONCAT('$', FORMAT(salary * 12, 2)) AS "Salary (Yearly)"
FROM caretaker;

-- Get caretaker id, last name, first name, phone number and email
SELECT caretaker_id AS "ID" ,
	care_lname AS "Last Name",
    care_fname AS "First Name",
    CONCAT("(",left(care_phone,3), ")", mid(care_phone,4,3) , "-", right(care_phone,4)) AS "Phone Number",
    care_email AS "E-Mail"
FROM caretaker;

-- Get caretaker id, last name, first name, address, city, zip, and state
SELECT c.caretaker_id AS "ID" ,
	c.care_lname AS "Last Name",
    c.care_fname AS "First Name",
    c.care_address AS "Address",
	c.city AS "City",
    c.zip AS "Zip",
    s.state_name AS "State"
FROM caretaker c INNER JOIN state s
ON c.state_id = s.state_id;

-- View Queries
SELECT * 
FROM v_turtle_species
WHERE Species = "Sea Turtles";

SELECT * 
FROM v_turtle_habitat;

SELECT * 
FROM v_caretaker_salary;

SELECT * 
FROM v_caretaker_shift;

SELECT * 
FROM v_care_hours;

SELECT * 
FROM v_caretaker_info;

SELECT * 
FROM v_turtle_info;

SELECT * 
FROM v_species_count;

SELECT * 
FROM v_check_turtle;

SELECT * 
FROM v_check_caretaker;