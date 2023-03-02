<!DOCTYPE HTML>
<html>
	<head>
		<title>Login Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
		?>
		
		<style>
			#fmData table{
				margin: auto;
				width: 50%;
			}
			td{
				text-align: center;
			}
			
			th{
				color: white;
				padding: 20px;
			}
			
			td input{
				text-align: left;
				width: 99%;
				padding-top: 10px;
				padding-bottom: 10px;
			}
			
			td select, #submit, button{
				text-align: left;
				width: 100%;
				padding-top: 10px;
				padding-bottom: 10px;
				text-align: center;
			}
			
			#submit{
				text-align: center;
			}
		</style>
	</head>
	<body>
	<div id="wrapper">
		<main>
		<h1>Password Demo</h1>

		<br>
		<div id="fmData">

			<?php 
				include 'menu.php';
				echo($output);
				error_reporting(0);
			
				unset($_SESSION['LoginStatus']);
				header("location: index.php");
			?>
		</div>
		</main>
	</body>
</html>