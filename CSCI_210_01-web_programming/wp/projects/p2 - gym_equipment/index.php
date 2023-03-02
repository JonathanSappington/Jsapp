<!DOCTYPE HTML>
<html>
	<head>
		<title>Workout Equipment Database</title>
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
			
			#item_memo{
				
			}
			
			#submit{
				text-align: center;
			}
		</style>
	</head>
	<body>
	<div id="wrapper">
		<main>
		<h1>Gym Database</h1>

		<br>
		<div id="fmData">
		
		<?php
			include 'menu.php';
			echo($output);
		?>
		
				<form method="POST" action="display_data.php">
					<table>
						<th colspan="2">
							Gym Equipment
						</th>
						<tr>
							<td>Name</td>
							<td><input type="text" width="20" name="item_name" placeholder="Treadmill" required></td>
						</tr>
						<tr>
							<td>Condition</td>
							<td>
								<select name="item_condition" id="item_condition">
									<option value="Good">Good</option>
									<option value="Fair">Fair</option>
									<option value="Replace">Replace</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Quantity</td>
							<td><input type="text" width="20" name="item_quantity" placeholder="24" required></td>
						</tr>
						<tr>
							<td>Memo</td>
							<td><textarea width="20" name="item_memo" id="item_memo" placeholder="Needs repairs..." rows="5" cols="120" required></textarea></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Enter" id="submit"></td>
						</tr>
					</table>
				</form>
			</main>
		</div>
	</body>
</html>