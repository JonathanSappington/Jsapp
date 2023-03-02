<!DOCTYPE HTML>
<html>
	<head>
		<title>Session Variables</title>
		
		<?php
			session_start();
			session_destroy();
			
			header("Location: page2.php");
			
			die();
		?>
	</head>
	<body>
		<h1>Page 4</h1>
		<h2>Session</h2>
		
		<nav>
			<a href="index.php">Home</a>
			<a href="page2.php">Page 2</a>
			<a href="page3.php">Page 3</a>
			<a href="page4.php">Destroy</a>
			<a href="page5.php">Delete</a>
		</nav>
	</body>
</html>