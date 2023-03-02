<!DOCTYPE HTML>
<html>
	<head>
		<title>PDO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
		?>
	</head>
	<body>
		<?php 
			include 'menu.php';
		?>
		
		<?php
			try{
				$sql = "SELECT * ".
						"FROM tbl_cars ". 
						"ORDER BY Make, Model, CarYear";
				$ds = $pdo->query($sql);

				echo("<hr><hr>");
				echo('<table>');
				echo('<th>First Name</th>');
				echo('<th>Last Name</th>');
				echo('<th>Make</th>');
				echo('<th>Model</th>');
				echo('<th>Color</th>');
				echo('<th>Car Year</th>');
				echo('<th>Car Image</th>');
				while(($row = $ds->fetch()) != null)
				{
					echo('<tr><td>'.$row["OwnerFN"].'</td><td >'.
					$row["OwnerLN"].'</td><td>'.
					$row["Make"].'</td><td>'.
					$row["Model"].'</td><td>'.
					$row["Color"].'</td><td>'.
					$row["CarYear"].'</td><td>'.
					'<img src="data:'.$row['Image_Type'].';base64,'.$row["Car_Image"].'">'.'</td></tr>');
				}
				echo('<tr><td colspan="7"><a href="index.php"><button type="button">Add More</button></a></td></tr>');
				echo('</table>');
			}
			catch(PDOEXCEPTION $e){
				echo("** ERROR **".$e->GetMessage());
			}
		?>
	</body>
</html>