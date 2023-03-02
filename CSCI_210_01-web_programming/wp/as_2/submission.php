<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>
	</head>
	<body>
		<h1>Submission</h1>
		
		<nav id="Nav">
			<a href="index.html">Home</a>
			<a href="form1.html">Form 1</a>
			<a href="form2.php">Form 2</a>
		</nav>
	</body>
</html>

<?php
	if((!isset($_POST['fName']) || empty($_POST['fName'])) ||
	(!isset($_POST['lName']) || empty($_POST['lName'])) ||
	(!isset($_POST['Address']) || empty($_POST['Address'])) ||
	(!isset($_POST['City']) || empty($_POST['City'])) ||	
	(!isset($_POST['Zip']) || empty($_POST['Zip']))){
		echo('Your information is incomplete return to <a href="form1.html">Form 1</a>');
	}
	else{
		echo("Welcome! ".$_POST['Title'].$_POST['fName']." ".$_POST['lName']."<br>");
		echo("Address: ".$_POST['Address'].", ".$_POST['City'].", ".$_POST['State'].", ".$_POST['Zip']."<br>");
		echo("Gender: ".$_POST['Gender']."<br>");
		if(!empty($_POST['recieve']))
			echo("Billing Address: ".$_POST['recieve']);
		else
			echo("Billing Address: False");
	}
?>