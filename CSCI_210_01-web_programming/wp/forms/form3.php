<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>

	</head>
	<body>
		<h1>Form 3</h1>
		
		<nav id="Nav">
			<a href="index.html">Home</a>
			<a href="form1.html">Form 1</a>
			<a href="form2.html">Form 2</a>
			<a href="form3.php">Form 3</a>
		</nav>
		
		<form action="form3.php" method="Post">
			<table border="1">
				<tr>
					<td>Name</td>
					<td><input type="text" name="stuName" value="Aleski"></</td>
				</tr>
				
				<tr>
					<td>Major</td>
					<td><input type="text" name="stuMajor" value="Operator"></td>
				</tr>
				
				<tr>
					<td><input type="submit" value="Submit"></td>
				</tr>
			</table>
		</form>
		<script src="script.js"></script> 
		<?php
			
			echo("<br>Var Dump<br>");
			var_dump($_POST);
			
			echo("<br><hr>");	
			echo("Print R<br>");
			print_r($_POST);
			
			echo("<h3>isset</h3>");
			if(isset($_POST["stuName"]))
			{
				echo("Name: ".$_POST['stuName']."<br>");
				echo("Major: ".$_POST['stuMajor']."<br>");
			}
			echo("<br><hr>");
			
			echo("<h3>Not Empty</h3>");
			if(!empty($_POST["stuName"]))
			{
				echo("Name: ".$_POST['stuName']."<br>");
				echo("Major: ".$_POST['stuMajor']."<br>");
			}
			
		?>
	</body>
</html>