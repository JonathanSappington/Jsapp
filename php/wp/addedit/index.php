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
		<h1>Dog Database</h1>

		<br>
		<div id="fmData">
		
		<?php
			include 'menu.php';
			echo($output);
			$sql_st = "SELECT * ".
						"FROM tbl_State ".
						"ORDER BY st";
						
			$dataset_st = $pdo->query($sql_st);
		?>
		
				<form method="POST" action="InputData_DisplayData.php">
					<table border="1">
						<th colspan="2">
							Dog Information
						</th>
						<tr>
							<td>Dog Name</td>
							<td><input type="text" width="20" name="dogname" placeholder="Buster" required></td>
						</tr>
						<tr>
							<td>Dog Breed</td>
							<td><input type="text" width="20" name="dogbreed" placeholder="Pit Bull" required></td>
						</tr>
						<tr>
							<td>Owner First Name</td>
							<td><input type="text" width="20" name="ownerfirstname" placeholder="John" required></td>
						</tr>
						<tr>
							<td>Owner Last Name</td>
							<td><input type="text" width="20" name="ownerlastname" placeholder="Doe" required></td>
						</tr>
						<tr>
							<td>City</td>
							<td><input type="text" width="20" name="city" placeholder="Kalispell" required></td>
						</tr>
						<tr>
							<td>State</td>
							<td>
								<select name="st" id="st">
									<?php
									  while($row = $dataset_st->fetch())
										{
											echo('<option value="'.$row["st"].'">'.$row["st"].'</option>');
										}
									?>
								</select>
							</td>
						</tr>
							<td colspan="2"><input type="submit" value="Enter" id="submit"></td>
						</tr>
					</table>
				</form>
	</body>
</html>