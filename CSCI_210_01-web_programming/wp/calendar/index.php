<!DOCTYPE HTML>
<html>
	<head>
		<title>Event - Demo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
			$sql_where = "";
			
			if(isset($_POST))
			{
				if(!empty($_POST['action']))
				{
					$sql_where = "WHERE"." EventDate Like ".(($_POST["EventDate"] == "-") ? '"%"' : '"'.$_POST["EventDate"].'"').
					" AND GroupTitle Like ".(($_POST["GroupTitle"] == "-") ? '"%"' : '"'.$_POST["GroupTitle"].'"').
					" AND EventType Like ".(($_POST["EventType"] == "-") ? '"%"' : '"'.$_POST["EventType"].'"');
				}
			}
		?>
	</head>
	<body>
	<div id="wrapper">
		<main>
			<h1>Event Pages - Demo</h1>
			
			<div id="tblData">
				<?php			
					try{
						$sql = "SELECT MonthName(EventDate) as Month, DATE_FORMAT(EventDate,'%m-%d-%Y') as EventDate, ".
						"CONCAT(EventTime,' ',EventPeriod) AS EventTime, GroupTitle, EventType, EventID ".
						"FROM tbl_events ".
						$sql_where.
						" ORDER BY EventDate, EventPeriod, EventTime, GroupTitle, EventType ";
						
						echo('<table><tr>
							<th>Event Date</th>
							<th>Time Of Event</th>
							<th>Group Title</th>
							<th>Event Type</th></tr>');
						
						echo('<form method="POST" action="index.php">');
						echo('<tr>
						<td>
							<SELECT name="EventDate">
							<option>-</option>');
								$subSQL = "SELECT EventDate ".
								"FROM tbl_events Group By EventDate";
								$ds = $pdo->query($subSQL);

								while(($row = $ds->fetch()) != null)
								{
									echo('<option>'.$row["EventDate"].'</option>');
								}
							echo('
							</SELECT>
						</td>
						<td>
							
						</td>
						<td>
							<SELECT name="GroupTitle">
								<option>-</option>
						');
							$subSQL = "SELECT GroupTitle ".
								"FROM tbl_events Group By GroupTitle";
							$ds = $pdo->query($subSQL);

							while(($row = $ds->fetch()) != null)
							{
								echo('<option>'.$row["GroupTitle"].'</option>');
							}
									
						echo('
							</SELECT>
						</td>
						<td>
							<SELECT name="EventType">
							<option>-</option>
							');
								$subSQL = "SELECT EventType ".
								"FROM tbl_events Group By EventType";
								$ds = $pdo->query($subSQL);

								while(($row = $ds->fetch()) != null)
								{
									echo('<option>'.$row["EventType"].'</option>');
								}
						echo('
							</SELECT>
						</td>
						</tr>');
						
						echo('<tr>
							<td>Filter</td>
							<td><input type="submit" value="Select" id="action" name="action"></td>
							<td><input type="submit" value="Reset" id="action" name="action"></td>
							<td></td>
						</tr>');
						
						echo('</Form>');
						$ds = $pdo->query($sql);
						
						$MonthName = "";
						while(($row = $ds->fetch()) != null)
						{
							if($MonthName != $row["Month"]){
								echo('<tr><th colspan="4">'.$row["Month"].'</th></tr>');
								$MonthName = $row["Month"];
							}
							echo('<tr>');
							echo('<td>'.$row["EventDate"].'</td>');
							echo('<td>'.$row["EventTime"].'</td>');
							echo('<td>'.$row["GroupTitle"].'</td>');
							echo('<td id="memo">'.$row["EventType"].'</td>');
							echo('</tr>');
						}
						echo('</table>');
					}
					catch(PDOEXCEPTION $e){
						echo("** ERROR **".$e->GetMessage());
					}
				?>
			</div>
		</main>
	</body>
</html>