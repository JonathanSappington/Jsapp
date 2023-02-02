/* 
-- CSCI 240 Databases and SQL
-- Final Views
-- Written by Jonathan J Sappington
-- Instructor Arthur Bennett
-- Date 05/11/2022
*/


USE turtle_tracker;

-- Get a turtles id, name, weight and size, and the corrosponding species name, weight average and size average
-- Order by turtle_id
CREATE OR REPLACE VIEW v_turtle_species
AS
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

-- Get turtle id, name, habitat room number, habitat name, average habitat tempature, average habitat humidity, and habitat measurements in sqft
CREATE OR REPLACE VIEW v_turtle_habitat
AS
SELECT t.turtle_id AS "ID",
		t.turtle_name AS "Name",
		h.habitat_id AS "Room Number",
        h.habitat_name AS "Habitat Name",
        CONCAT(h.average_temp,"°F") AS "Average Tempature",
        CONCAT(h.average_humidity,"%") AS "Average Humdity",
        CONCAT(h.sqft,"ft²") AS "Habitat Measurements",
        h.biome_name
FROM turtle t INNER JOIN habitat h
ON t.habitat_id = h.habitat_id
ORDER BY t.turtle_id;

-- Caretaker Information [Start]
-- Get caretaker id, last name, first name, and salary in monthly and yearly amounts
CREATE OR REPLACE VIEW v_caretaker_salary
AS
SELECT caretaker_id AS "ID" ,
	care_lname AS "Last Name",
    care_fname AS "First Name",
	CONCAT('$', FORMAT(salary, 2)) AS "Salary (Monthly)",
    CONCAT('$', FORMAT(salary * 12, 2)) AS "Salary (Yearly)"
FROM caretaker;

-- Get caretaker id, last name, first name, shift start, shift end
CREATE OR REPLACE VIEW v_caretaker_shift
AS
SELECT caretaker_id AS "ID" ,
	care_lname AS "Last Name",
    care_fname AS "First Name",
	shift_start AS "Shift Start",
    shift_end AS "Shift End"
FROM caretaker;

-- Get caretaker id, last name, first name, turtle name, schedule start, schedule end
CREATE OR REPLACE VIEW v_care_hours
AS
SELECT c.caretaker_id AS "ID" ,
	c.care_lname AS "Last Name",
    c.care_fname AS "First Name",
    t.turtle_name AS "Turtle Name",
	schedule_start AS "Schedule Start",
    schedule_end AS "Schedule End"
FROM caretaker c INNER JOIN turtle_schedule ts
ON ts.caretaker_id = c.caretaker_id
INNER JOIN turtle t
ON t.turtle_id = ts.turtle_id;

-- Get caretaker id, last name, first name, phone number, email, salary, address, city, zip, state
CREATE OR REPLACE VIEW v_caretaker_info
(
	caretaker_id,
	last_name,
	first_name,
    phone,
    email,
    salary,
    address,
    city,
    zip,
    state
)
AS
SELECT c.caretaker_id,
	c.care_lname,
    c.care_fname,
    CONCAT("(",left(c.care_phone,3), ")", mid(c.care_phone,4,3) , "-", right(care_phone,4)),
    c.care_email,
    CONCAT('$', FORMAT(c.salary, 2)) AS "Salary",
    c.care_address,
	c.city,
    c.zip,
    s.state_name
FROM caretaker c INNER JOIN state s
ON c.state_id = s.state_id;

-- Get turtle id, name, adoption date formatted to MM/DD/YYYY, gender, weight, size, habitat room number, habitat name, favorite food, species name, species color
CREATE OR REPLACE VIEW v_turtle_info
AS
SELECT 
	t.turtle_id AS "ID",
	t.turtle_name AS "Name",
	DATE_FORMAT(t.adoption_date, "%m/%d/%Y") AS "Date Adopted",
    t.gender AS "Gender",
	CONCAT(t.weight," oz") AS "Weight (in ounces)",
	CONCAT(t.size,'″') AS "Size (in inches)",
    h.habitat_id AS "Room Number",
    h.habitat_name AS "Habitat Name",
    d.food_name AS "Favorite Food",
    s.species_name AS "Species Name",
    s.color AS "Species Color"
FROM turtle t INNER JOIN diet d
ON t.diet_id = d.diet_id
INNER JOIN habitat h
ON t.habitat_id = h.habitat_id
INNER JOIN species s
ON t.species_name = s.species_name
ORDER BY turtle_id;

-- Get total number of turtles associated with individual species
CREATE OR REPLACE VIEW v_species_count
AS
SELECT species_name AS "Species Name", 
		COUNT(*) AS "Total Species"
FROM turtle
GROUP BY species_name;

-- Check if a turtle is not associated with a caretaker
CREATE OR REPLACE VIEW v_check_turtle
AS
SELECT t.turtle_id AS "Turtle ID", 
		t.turtle_name AS "Turtle Name", 
        ts.caretaker_id AS "Caretaker ID"
FROM turtle t LEFT JOIN turtle_schedule ts
ON t.turtle_id = ts.turtle_id
WHERE ts.caretaker_id IS NULL;

-- Check if a caretaker is not associated with a turtle
CREATE OR REPLACE VIEW v_check_caretaker
AS
SELECT c.caretaker_id AS "Caretaker ID", 
		c.care_lname AS "Last Name", 
        c.care_fname AS "First Name", 
        ts.turtle_id AS "Turtle ID"
FROM caretaker c LEFT JOIN turtle_schedule ts
ON c.caretaker_id = ts.caretaker_id
WHERE ts.turtle_id IS NULL;