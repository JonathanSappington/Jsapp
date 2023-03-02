<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>
	</head>
	<body>
		<h1>Form 4</h1>
		
		<nav id="Nav">
			<a href="index.html">Home</a>
			<a href="form1.html">Form 1</a>
			<a href="form2.html">Form 2</a>
			<a href="form3.php">Form 3</a>
			<a href="form4.php">Form 4</a>
		</nav>
		
		<script src="script.js"></script> 
		
		<?php
		if(!isset($_POST['stuName']) || empty($_POST['stuName'])){
		echo('
			<form action="form4.php" method="Post">
				<table border="1">
					<tr>
						<td>Name</td>
						<td><input type="text" name="stuName" value="Randy"></</td>
					</tr>
					
					<tr>
						<td>Major</td>
						<td><input type="text" name="stuMajor" value="Spy"></td>
					</tr>
					
					<tr>
						<td><input type="submit" value="Submit"></td>
					</tr>
				</table>
			</form>
			');
		}
		else{
			echo("Name: ".$_POST['stuName']."<br>");
			echo("Major: ".$_POST['stuMajor']."<br>");
		}
		?>
	</body>
</html>