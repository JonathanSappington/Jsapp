<!DOCTYPE HTML>
<html>
	<head>
		<title>Results</title>
		
		<?php
			require 'db_connect.php';
		?>
		
		<style>
			#tblData table{
				margin: auto;
			}
			th, td{
				padding: 20px;
			}
			
			button{
				text-align: left;
				width: 100%;
				padding-top: 10px;
				padding-bottom: 10px;
				text-align: center;
			}
			
			th{
				background: #850000;
				color: white;
			}
		</style>
	</head>
	<body>
		<h1>Movie Catalog</h1>
		<a href="index.php">Home</a>
		<a href="page1.php">Movie Catalog</a>
		<br>
		<div id="tblData">
		<?php
			try{
				$sql = "SELECT Location, Date, Name, Length, Cost, Quality, Genre, Year ".
						"FROM tbl_movies ". 
						"ORDER BY Date desc, Year,Genre,Quality";
				
				echo($output."<br><hr>");
				echo('<table border="1">');
				echo('<th>Location</th>');
				echo('<th>Date</th>');
				echo('<th>Name</th>');
				echo('<th>Length</th>');
				echo('<th>Cost</th>');
				echo('<th>Quality</th>');
				echo('<th>Genre</th>');
				echo('<th>Year</th>');
				$ds = $pdo->query($sql);
					
				while(($row = $ds->fetch()) != null)
				{
					echo('<tr>');
					echo('<td>'.$row["Location"].'</td>');
					echo('<td>'.$row["Date"].'</td>');
					echo('<td>'.$row["Name"].'</td>');
					echo('<td>'.$row["Length"].'</td>');
					echo('<td>$'.$row["Cost"].'</td>');
					echo('<td>'.$row["Quality"].'</td>');
					echo('<td>'.$row["Genre"].'</td>');
					echo('<td>'.$row["Year"].'</td>');
					echo('</tr>');
				}
				echo("<tr>");
					echo('<td colspan="8"><a href="index.php"><button type="button">Add More</button></a></td>');
				echo("</tr>");
				echo('</table>');
				echo('<table border="1">');
				echo('<th>Total Cost</th>');
				$sql = "SELECT ROUND(SUM(Cost),2) as 'Cost' ".
						"FROM tbl_movies ";
						
				$ds = $pdo->query($sql);
				
				while(($row = $ds->fetch()) != null)
				{
					echo('<tr>');
					echo('<td>$'.$row["Cost"].'</td>');
					echo('</tr>');
				}
				
				echo('</table>');
			}
			catch(PDOEXCEPTION $e){
				echo("** ERROR **".$e->GetMessage());
			}
		?>
		</div>
	</body>
</html>