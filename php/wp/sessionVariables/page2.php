<!DOCTYPE HTML>
<html>
	<head>
		<title>Session Variables</title>
		
		<?php
			session_start();
		?>
	</head>
	<body>
		<h1>Page 2</h1>
		<h2>Session</h2>
		
		<nav>
			<a href="index.php">Home</a>
			<a href="page2.php">Page 2</a>
			<a href="page3.php">Page 3</a>
			<a href="page4.php">Destroy</a>
			<a href="page5.php">Delete</a>
		</nav>
		
		<?php
			echo($_SESSION["stooges"][1]."<br>");
			echo($_SESSION["managers"]["CFO"]."<br>");
			echo("<br><hr>");
			
			echo("<h2>Managers</h2>");
			foreach($_SESSION["managers"] as $key => $value) {
				echo("Title: ".$key."<br>"."Name: ".$value."<br>");
			}
		?>
		
		<br><hr>
		<?php
			print_r($_SESSION);
		?>
	</body>
</html>