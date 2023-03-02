<?php
	try
	{
		$pdo = new PDO('mysql:host=localhost;dbname=wp_data1','jsapp','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');
		
		$output = "Database Connected: ";
	}
	catch(PDOException $e)
	{
		$output = "Unable to Connect".$e->getMessage();
		echo($output);
		die (mysql_error());
	}
	
	session_start();
?>