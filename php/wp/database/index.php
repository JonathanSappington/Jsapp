<!DOCTYPE HTML>
<html>
	<head>
		<title>PDO</title>
		
		<?php
				include 'db_connect.php';
		?>
	</head>
	<body>
		<h1>PDO Access</h1>
		<?php
			echo($output."<br><hr>");
			$sql = 'SELECT firstname, lastname, city FROM tbl_person WHERE city like "D%" ORDER BY lastname';
			$ds = $pdo->query($sql);
			print_r($ds);
			echo("<hr><hr>");
			while($row = $ds->fetch())
			{
				echo($row["firstname"]." | ".
				$row["lastname"]." | ".
				$row["city"]."<br>");
			}
		?>
	</body>
</html>