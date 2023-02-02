<?php
	try
	{
		$pdo_users = new PDO('mysql:host=localhost;dbname=wp_user','jsapp','');
		$pdo_users->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$pdo_users->exec('SET NAMES "utf8"');
		
		$pdo_turtle = new PDO('mysql:host=localhost;dbname=wp_turtle','jsapp','');
		$pdo_turtle->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$pdo_turtle->exec('SET NAMES "utf8"');
		
		$output = "<br>";
	}
	catch(PDOException $e)
	{
		$output = "Unable to Connect".$e->getMessage()."<br>";
		echo($output);
		die (mysql_error());
	}
	
	session_start();
?>