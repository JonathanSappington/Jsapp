<!DOCTYPE HTML>
<html>
	<head>
		<title>Information</title>
		
		<?php
			session_start();
		?>
	</head>
	<body>
		<h1>Infromation Accepted</h1>
		
		<nav id="Nav">
			<a href="index.html">Home</a>
			<a href="logout.php">Logout</a>
		</nav>
		<?php
			if((!isset($_POST['fName']) || empty($_POST['fName'])) ||
			(!isset($_POST['lName']) || empty($_POST['lName'])) ||
			(!isset($_POST['Address']) || empty($_POST['Address'])) ||
			(!isset($_POST['City']) || empty($_POST['City'])) ||	
			(!isset($_POST['Zip']) || empty($_POST['Zip']))){
				header("location: index.html");
			}
			else{
				$count = count($_SESSION);
				$_SESSION["slot ".$count] = array();
				$_SESSION["slot ".$count]["fName"] = $_POST['fName'];
				$_SESSION["slot ".$count]["lName"] = $_POST['lName'];
				$_SESSION["slot ".$count]["Address"] = $_POST['Address'];
				$_SESSION["slot ".$count]["City"] = $_POST['City'];
				$_SESSION["slot ".$count]["State"] = $_POST['State'];
				$_SESSION["slot ".$count]["Zip"] = $_POST['Zip'];
				$_SESSION["slot ".$count]["tName"] = $_POST['tName'];
				
				echo("Welcome! ".$_POST['fName']." ".$_POST['lName']."<br><br>");
				echo("Address: ".$_POST['Address'].", ".$_POST['City'].", ".$_POST['State'].", ".$_POST['Zip']."<br><br>");
				echo("Team Name: ".$_POST['tName']."<br><br>");
			}
		?>
		<a href="index.html"><input type="button" value="Back"></a>
		<a href="page3.php"><input type="button" value="View Roster"></a>
	</body>
</html>