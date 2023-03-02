<!DOCTYPE HTML>
<html>
	<head>
		<title>PDO</title>
		
		<?php
			require 'db_connect.php';
		?>
	</head>
	<body>
		<h1>All Cars</h1>
		<a href="index.php">Home</a>
		<br>
		
		<?php
			try{
				$sql = "SELECT * ".
						"FROM tbl_cars ". 
						"ORDER BY Make, Model, CarYear";
				
				echo($output."<br><hr>");
				$ds = $pdo->query($sql);
				print_r($ds);
				echo("<hr><hr>");
				echo('<table border="1" style="margin-left: 50%; background: pink;">');
				echo('<th style="padding: 20px;">First Name</th>');
				echo('<th style="padding: 20px;">Last Name</th>');
				echo('<th style="padding: 20px;">Make</th>');
				echo('<th style="padding: 20px;">Model</th>');
				echo('<th style="padding: 20px;">Color</th>');
				echo('<th style="padding: 20px;">CarYear</th>');
				while(($row = $ds->fetch()) != null)
				{
					echo('<tr><td style="padding: 20px;">'.$row["OwnerFN"].'</td><td style="padding: 20px;">'.
					$row["OwnerLN"].'</td><td style="padding: 20px;">'.
					$row["Make"].'</td><td style="padding: 20px;">'.
					$row["Model"].'</td><td style="padding: 20px;">'.
					$row["Color"].'</td><td style="padding: 20px; background: red">'.
					$row["CarYear"].'</td></tr>');
				}
				echo('</table>');
			}
			catch(PDOEXCEPTION $e){
				echo("** ERROR **".$e->GetMessage());
			}
			
			echo('<a href="index.php"><button type="button">Add More</button></a>');
		?>
	</body>
</html>