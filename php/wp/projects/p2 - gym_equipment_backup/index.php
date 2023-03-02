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
		<h1>Gym Database</h1>

		<br>
		<div id="fmData">
		
		<?php
			include 'menu.php';
			echo($output);
		?>
		
				<form method="POST" action="InputData_DisplayData.php">
					<table border="1">
						<th colspan="2">
							Gym Equipment
						</th>
						<tr>
							<td>Name</td>
							<td><input type="text" width="20" name="name" placeholder="Workout" required></td>
						</tr>
						<tr>
							<td>State</td>
							<td>
								<select name="condition" id="condition">
									<option value="Good">Good</option>
									<option value="Fair">Fair</option>
									<option value="Replace">Replace</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Quantity</td>
							<td><input type="text" width="20" name="quantity" placeholder="24" required></td>
						</tr>
						<tr>
							<td>Memo</td>
							<td><input type="text" width="20" name="memo" placeholder="TOJOGAINHGSDNOISBGDBOISDB" required></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Enter" id="submit"></td>
						</tr>
					</table>
				</form>
	</body>
</html>