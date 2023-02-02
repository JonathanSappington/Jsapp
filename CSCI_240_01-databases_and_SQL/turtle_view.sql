USE turtle_tracker;

CREATE OR REPLACE VIEW v_turtle_species
(
	turtle_name,
    weight,
    size,
    avg_weight,
    avg_size,
    species_name
)
AS
SELECT t.turtle_name,
		CONCAT(t.weight," oz") AS "Weight (in ounces)",
        CONCAT(t.size,'″') AS "Size (in inches)",
        CONCAT(s.average_weight," oz") AS "Average Weight (in ounces)",
        CONCAT(s.average_size,'″') AS "Average Size (in inches)",
		t.species_name AS "Species"
FROM turtle t INNER JOIN species s
ON t.species_name = s.species_name;

CREATE OR REPLACE VIEW v_turtle_habitat
(
	turtle_name,
	habitat_name,
	average_temp,
	average_humidity,
	sqft,
	biome_name
)
AS
SELECT t.turtle_name,
        h.habitat_name,
        CONCAT(h.average_temp,"°F") AS "Average Tempature",
        CONCAT(h.average_humidity,"%") AS "Average Humdity",
        CONCAT(h.sqft,"ft²") AS "Average Humdity",
        h.biome_name
FROM turtle t INNER JOIN habitat h
ON t.habitat_id = h.habitat_id;

CREATE OR REPLACE VIEW v_caretaker_salary
(
	last_name,
    first_name,
    salary_monthly,
    salary_yearly
)
AS
SELECT care_lname,
    care_fname AS "First Name",
	CONCAT('$', FORMAT(salary, 2)) AS "Salary (Monthly)",
    CONCAT('$', FORMAT(salary * 12, 2)) AS "Salary (Yearly)"
FROM caretaker;

CREATE OR REPLACE VIEW v_caretaker_shift
(
	last_name,
    first_name,
    shift_start,
    shift_end
)
AS
SELECT care_lname,
    care_fname,
	shift_start,
    shift_end
FROM caretaker;

CREATE OR REPLACE VIEW v_care_hours
(
	last_name,
    first_name,
    turtle_name,
    schedule_start,
    schedule_end
)
AS
SELECT care_lname,
    care_fname,
    t.turtle_name,
	schedule_start,
    schedule_end
FROM caretaker c INNER JOIN turtle_schedule ts
ON ts.caretaker_id = c.caretaker_id
INNER JOIN turtle t
ON t.turtle_id = ts.turtle_id;

CREATE OR REPLACE VIEW v_caretaker_info
(
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
SELECT c.care_lname,
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

CREATE OR REPLACE VIEW v_turtle_info
AS
SELECT 
	t.turtle_id,
	t.turtle_name,
	t.adoption_date,
    t.gender,
	CONCAT(t.weight," oz") AS "Weight (in ounces)",
	CONCAT(t.size,'″') AS "Size (in inches)",
    h.habitat_name,
    d.food_name,
    s.species_name,
    s.color
FROM turtle t INNER JOIN diet d
ON t.diet_id = d.diet_id
INNER JOIN habitat h
ON t.habitat_id = h.habitat_id
INNER JOIN species s
ON t.species_name = s.species_name
ORDER BY turtle_id;

CREATE OR REPLACE VIEW v_species_count
AS
SELECT species_name AS "Species Name", 
		COUNT(*) AS "Total Species"
FROM turtle
GROUP BY species_name;

CREATE OR REPLACE VIEW v_check_turtle
AS
SELECT t.turtle_id, t.turtle_name, ts.caretaker_id
FROM turtle t LEFT JOIN turtle_schedule ts
ON t.turtle_id = ts.turtle_id
WHERE ts.caretaker_id IS NULL;

CREATE OR REPLACE VIEW v_check_caretaker
AS
SELECT c.caretaker_id, c.care_lname, c.care_fname, ts.turtle_id
FROM caretaker c LEFT JOIN turtle_schedule ts
ON c.caretaker_id = ts.caretaker_id
WHERE ts.turtle_id IS NULL;