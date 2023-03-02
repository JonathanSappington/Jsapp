<!DOCTYPE HTML>
<html>
	<head>
		<title>Session Variables</title>
		
		<?php
			session_start();
		?>
	</head>
	<body>
		<?php
			$_SESSION["firstName"] = "Bubba";
			$_SESSION["lastName"] = "Walker";
			$myArray1 = Array("Larry","Curly","Moe");
			
			$myArray2 = Array("CEO" => "Wayne",
								"COO" => "Bowser",
								"CFO" => "Jeb",
								"CSO" => "Bruce");
								
			array_push($myArray1,"Shemp");
			$myArray1[4] = "CurlyJoe";
			$myArray1[count($myArray1)] = "Jimbo";
			
			$_SESSION["stooges"] = $myArray1;
			$_SESSION["managers"] = $myArray2;
		?>
		<h1>Session Variables</h1>
		<h2>Session</h2>
		
		<nav>
			<a href="index.php">Home</a>
			<a href="page2.php">Page 2</a>
			<a href="page3.php">Page 3</a>
			<a href="page4.php">Destroy</a>
			<a href="page5.php">Delete</a>
		</nav>
		
		<?php
			print_r('$_SESSION<br>');
			print_r($_SESSION);
			echo("<br><hr>");
			print_r($myArray1);
			echo("<br><hr>");
			print_r($myArray2);
			echo("<br><hr>");
			var_dump($_SESSION);
		?>
		
		<h2>People</h2>
		
		<?php
			echo($_SESSION["stooges"][1]."<br>");
			echo($_SESSION["managers"]["CFO"]."<br>");
			
			echo("<h3>Stooges</h3>");
			$outStooges = $_SESSION["stooges"];
			print_r($outStooges);
			
			foreach($outStooges as $key => $value) {
				echo($value."<br>");
			}
			echo("<br><hr>");
			foreach($_SESSION["stooges"] as $key => $value) 
			{
				echo($value."<br>");
			}
		?>
	</body>
</html>