<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>
	</head>
	<body>
		<h1>Results</h1>
		
		<nav id="Nav">
			<a href="index.html">Home</a>
			<a href="form1.html">Form 1</a>
			<a href="form2.html">Form 2</a>
			<a href="form3.php">Form 3</a>
		</nav>
		
		</form>
		
		<script src="script.js"></script> 
	</body>
</html>

<?php
	echo("<br>Var Dump<br>");
	var_dump($_GET);
	
	echo("<br><hr>");	
	echo("Print R<br>");
	print_r($_GET);
	
	echo("<br><hr>");
	echo '<script>';
	echo 'console.log('. json_encode($_GET) .')';
	echo '</script>';
	
	echo("Name: ".$_GET['stuName']."<br>");
	echo("Major: ".$_GET['stuMajor']."<br>");
	
	//echo("<br><hr>");
	//echo("Name: ".htmlspecialchars($_POST["stuName"])."<br>");
	//echo("Major: ".htmlspecialchars($_POST["stuMajor"]));
?>