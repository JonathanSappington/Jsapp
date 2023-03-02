<?php
	/*1. 15 pts Display a message on a web page that displays your name and favorite hobby.
	Do this 2 times using 2 different methods. "IF" the second one displayed correctly,
	write a message stating it display on the page.*/
	echo("<h2>Display Name</h2>");
	echo("Name: Jonathan Sappington"."<br>"."Hobby: Playing Games"."<br><br>");
	
	echo('<br><h3>Check if statement prints</h3>');
	$check = print("Name: Jonathan Sappington"."<br>"."Hobby: Playing Games"."<br><br>");
	
	if($check == 1)
		echo("The message has been displayed!<br><br>");
	
	/*2. 5 pts Use a while loop to diplay the message "PHP is fun" twenty times on the page.*/
	echo('<br><h2>Iterate Statement 20 Times (Using While Loop)</h2>');
	$iter = 0;
	
	while ($iter < 20)
	{
		echo(($iter + 1).": PHP is cool! <br>");
		$iter++;
	}
	
	echo("<br><br>");
	
	/*3. 5 pts Use a for lop to display display the message "Web programming is great 15 times
	on the page.*/
	echo('<br><h2>Iterate Statement 15 Times (Using For Loop)</h2>');
	for($i = 0; $i < 15; $i++)
	{
		echo(($i + 1).": Web programming is great!<br>");
	}
	
	echo("<br><br>");
	
	/*4. 10 pts Create an array that stores for people of your choice with their name, city, st, and
	phone number. Make the data fictious. Print the data in a table with a header header
	row.*/
	// Initializes person array
	echo('<br><h2>Display Information</h2>');
	$person = array(array("Name"=>"Jeff", "City"=>"Kalispell", "st"=>"356 4th Street", "PhoneNumber" => "(406)213-4560"),
				array("Name"=>"Sarah", "City"=>"Missoula", "st"=>"125 Main Street", "PhoneNumber" => "(406)458-4682"),
				array("Name"=>"Mike", "City"=>"Whitefish", "st"=>"489 Road Street", "PhoneNumber" => "(406)974-3456"),
				array("Name"=>"Max", "City"=>"New York City", "st"=>"256 Corner Avenue", "PhoneNumber" => "(865)687-8961"));
	
	// Displays person array as a table
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Name</th><th>City</th><th>st</th><th>Phone Number</th></tr>');
	
	foreach($person as $key => $value) {
		echo('<tr><td>'.$value["Name"].'</td><td>'.
						$value["City"].'</td><td>'.
						$value["st"].'</td><td>'.
						$value["PhoneNumber"].'</td></tr>');
	}
	echo('</table>');
	
	/*5. 10 pts Create an array that stores 5 dog breeds in random order. Print the array and
	then sort the array and reprint the sorted array.*/
	// Initializes pet breeds array
	$breed = array("German Shepard","Lab","Golden Retriever","Corgi","Poodle");
	
	// Displays array
	echo("<br><h2>Display Breeds</h2>");
	for($i = 0; $i < count($breed);$i++)
		echo($breed[$i]."<br>");
	
	echo("<br>");
	
	// Sorts and displays array
	sort($breed);
	echo("<br><h3>Sort Breeds</h3>");
	for($i = 0; $i < count($breed);$i++)
		echo($breed[$i]."<br>");
	echo("<br>");
	
	/*6. 15 pts .Create an associative array that stores 5 football teams of your choosing and
	their home state. Print the array in a table. Sort the array by key and then print the table.
	Sort the array by state and print the table. The last method must use a foreach
	statement utilizing the key and value.*/
	// Initalizes team array
	$team = array("Grizzlies"=>"Montana",
					"Green Bay Packers"=>"Wisconsin",
					"Jets"=>"New York",
					"Seahawks"=>"Washington",
					"Denver Broncos"=>"Colorado");
	
	echo("<br><h2>Print Team</h2>");
	
	// Prints team as a table
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Name</th><th>State</th></tr>');
	
	foreach($team as $key => $value) {
		echo('<tr><td>'.$key.'</td><td>'.
						$value.'</td></tr>');
	}
	echo('</table>');
	
	echo("<br><h3>Sort Team by Name</h3>");
	
	// Sorts team by Key
	ksort($team);
	
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Name</th><th>State</th></tr>');
	
	foreach($team as $key => $value) {
		echo('<tr><td>'.$key.'</td><td>'.
						$value.'</td></tr>');
	}
	echo('</table>');
	
	// Sorts team by Value
	asort($team);
	
	echo("<br><h3>Sort Team by State</h3>");
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Name</th><th>State</th></tr>');
	
	foreach($team as $key => $value) {
		echo('<tr><td>'.$key.'</td><td>'.
						$value.'</td></tr>');
	}
	echo('</table>');
?>