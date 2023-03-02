USE turtle_tracker;

-- Turtle Information [Start]
SELECT turtle_name,
		CONCAT(weight," oz") AS "Weight (in ounces)",
        CONCAT(size,'″') AS "Size (in inches)"
FROM turtle;

SELECT species_name AS "Species Name", 
		COUNT(*) AS "Total Species"
FROM turtle
GROUP BY species_name;

SELECT turtle_name,
        DATE_FORMAT(adoption_date, "%m/%d/%Y") AS "Date Adopted"
FROM turtle;

SELECT t.turtle_name AS "Name",
		CONCAT(t.weight," oz") AS "Weight (in ounces)",
        CONCAT(t.size,'″') AS "Size (in inches)",
        CONCAT(s.average_weight," oz") AS "Average Weight (in ounces)",
        CONCAT(s.average_size,'″') AS "Average Size (in inches)",
		t.species_name AS "Species"
FROM turtle t INNER JOIN species s
ON t.species_name = s.species_name;

SELECT t.turtle_name, d.food_name AS "Favorite Food"
FROM turtle t INNER JOIN diet d
ON t.diet_id = d.diet_id
ORDER BY t.turtle_name;

SELECT d.food_name AS "Food", COUNT(*) AS "Total Turtles"
FROM turtle t INNER JOIN diet d
ON t.diet_id = d.diet_id
GROUP BY d.food_name;
-- Turtle Information [End]

SELECT *
FROM caretaker;

SELECT care_lname AS "Last Name",
    care_fname AS "First Name",
	CONCAT('$', FORMAT(salary, 2)) AS "Salary (Monthly)",
    CONCAT('$', FORMAT(salary * 12, 2)) AS "Salary (Yearly)"
FROM caretaker;

SELECT care_lname AS "Last Name",
    care_fname AS "First Name",
    CONCAT("(",left(care_phone,3), ")", mid(care_phone,4,3) , "-", right(care_phone,4)) AS "Phone Number",
    care_email AS "E-Mail"
FROM caretaker;

SELECT c.care_lname AS "Last Name",
    c.care_fname AS "First Name",
    c.care_phone AS "First Name",
    c.care_email AS "E-Mail",
    c.care_address AS "Address",
	c.city AS "City",
    c.zip AS "Zip",
    s.state_name AS "State"
FROM caretaker c INNER JOIN state s
ON c.state_id = s.state_id;

SELECT food_name,
	CONCAT(food_inventory," Bags") AS "Inventory"
FROM food;

SELECT t.turtle_name, ts.caretaker_id, ts.turtle_id
FROM turtle t LEFT JOIN turtle_schedule ts
ON t.turtle_id = ts.turtle_id
WHERE ts.caretaker_id IS NULL;

SELECT c.caretaker_id, ts.caretaker_id, ts.turtle_id
FROM caretaker c LEFT JOIN turtle_schedule ts
ON c.caretaker_id = ts.caretaker_id
WHERE ts.turtle_id IS NULL;

-- View Queries
SELECT * 
FROM v_turtle_species
WHERE species_name = "Sea Turtles";

SELECT turtle_name, weight, avg_weight, species_name
FROM v_turtle_species
WHERE CAST(weight AS DECIMAL) <= avg_weight
ORDER BY CAST(weight AS DECIMAL);

SELECT turtle_name, weight, avg_weight, species_name
FROM v_turtle_species
WHERE CAST(weight AS DECIMAL) <= avg_weight
ORDER BY CAST(weight AS DECIMAL);

SELECT turtle_name, size, avg_size, species_name
FROM v_turtle_species
WHERE CAST(size AS DECIMAL) <= CAST(avg_size AS DECIMAL)
ORDER BY CAST(size AS DECIMAL);

SELECT turtle_name, size, avg_size, species_name
FROM v_turtle_species
WHERE CAST(size AS DECIMAL) >= CAST(avg_size AS DECIMAL)
ORDER BY CAST(size AS DECIMAL);

SELECT * 
FROM v_check_caretaker;

SELECT * 
FROM v_check_turtle;

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