<!DOCTYPE HTML>
<html>
	<head>
		<title>PDO</title>
		
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
				background: #850000;
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
		<h1>Movie Database</h1>
		<a href="index.php">Home</a>
		<a href="page1.php">Movie Catalog</a>
		<br>
		<div id="fmData">
		<?php
			if(!isset($_POST["Name"]))
			{
				echo('
				<form method="POST" action="index.php">
					<table border="1">
						<th colspan="2">
							Movie Database
						</th>
						<tr>
							<td>Location</td>
							<td><input type="text" width="20" name="Location" placeholder="Block Buster" required></td>
						</tr>
						<tr>
							<td>Date</td>
							<td><input type="text" width="20" name="Date" placeholder="2022-01-24" required></td>
						</tr>
						<tr>
							<td>Name</td>
							<td><input type="text" width="20" name="Name" placeholder="Die Hard" required></td>
						</tr>
						<tr>
							<td>Length</td>
							<td><input type="text" width="20" name="Length" placeholder="2:12:00" required></td>
						</tr>
						<tr>
							<td>Cost</td>
							<td><input type="text" width="20" name="Cost" placeholder="19.99" required></td>
						</tr>
						<tr>
							<td>Quality</td>
							<td>
								<select name="Quality" id="Quality">
								  <option value="SD">SD</option>
								  <option value="HDX">HDX</option>
								  <option value="UHD">UHD</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Genre</td>
							<td><input type="text" width="20" name="Genre" placeholder="Christmas" required></td>
						</tr>
						<tr>
							<td>Year</td>
							<td><input type="text" width="20" name="Year" placeholder="1988" required></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Enter" id="submit"></td>
						</tr>
					</table>
				</form>
				');
			}
			else{
				try{
					$sql = 'INSERT INTO tbl_movies (Location, Date, Name, Length, Cost,Quality,Genre,Year) VALUES (:Location,:Date,:Name,:Length,:Cost,:Quality,:Genre,:Year)';
					$sql = $pdo->prepare($sql);
					
					$Location = filter_var($_POST["Location"],FILTER_SANITIZE_STRING);
					$Date = filter_var($_POST["Date"],FILTER_SANITIZE_STRING);
					$Name = filter_var($_POST["Name"],FILTER_SANITIZE_STRING);
					$Length = filter_var($_POST["Length"],FILTER_SANITIZE_STRING);
					$Cost = filter_var($_POST["Cost"],FILTER_SANITIZE_STRING);
					$Quality = filter_var($_POST["Quality"],FILTER_SANITIZE_STRING);
					$Genre = filter_var($_POST["Genre"],FILTER_SANITIZE_STRING);
					$Year = filter_var($_POST["Year"],FILTER_SANITIZE_STRING);
					
					$sql->bindparam(":Location",$Location);
					$sql->bindparam(":Date",$Date);
					$sql->bindparam(":Name",$Name);
					$sql->bindparam(":Length",$Length);
					$sql->bindparam(":Cost",$Cost);
					$sql->bindparam(":Quality",$Quality);
					$sql->bindparam(":Genre",$Genre);
					$sql->bindparam(":Year",$Year);
					
					$sql->execute();
					
					$sql_selectLastMovieEntered = "SELECT *".
												 "FROM tbl_Movies ".
												 "WHERE ID = (SELECT MAX(ID) From tbl_movies)";
					
					echo($output."<br><hr>");
					echo("<h2>Information Accepted</h2>");
					$ds = $pdo->query($sql_selectLastMovieEntered);
					
					echo('<table border="1">');
					echo('<th>Location</th>');
					echo('<th>Date</th>');
					echo('<th>Name</th>');
					echo('<th>Length</th>');
					echo('<th>Cost</th>');
					echo('<th>Quality</th>');
					echo('<th>Genre</th>');
					echo('<th>Year</th>');
					while($row = $ds->fetch())
					{
					echo('<tr>');
					echo('<td>'.$row["Location"].'</td>');
					echo('<td>'.$row["Date"].'</td>');
					echo('<td>'.$row["Name"].'</td>');
					echo('<td>'.$row["Length"].'</td>');
					echo('<td>'.$row["Cost"].'</td>');
					echo('<td>'.$row["Quality"].'</td>');
					echo('<td>'.$row["Genre"].'</td>');
					echo('<td>'.$row["Year"].'</td>');
					echo('</tr>');
					
					echo("<tr>");
						echo('<td colspan="8"><a href="index.php"><button type="button">Add More</button></a></td>');
					echo("</tr>");
					}
					echo("</table>");
					
					unset($_POST);
				}
				catch(PDOEXCEPTION $e){
					echo("** ERROR **".$e->GetMessage());
				}
			}
		?>
	</body>
</html>