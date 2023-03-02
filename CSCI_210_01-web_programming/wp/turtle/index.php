<!DOCTYPE HTML>
<html>
	<head>
		<title>PDO</title>
		
		<?php
				include 'db_connect.php';
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
		<h1>PDO Access</h1>
		<div id="tblData">
		<?php
			echo($output."<br><hr>");
			$sql = '
				SELECT t.turtle_name AS "name",
				CONCAT(t.weight," oz") AS "weight",
				CONCAT(t.size,"″") AS "size",
				CONCAT(s.average_weight," oz") AS "aWeight",
				CONCAT(s.average_size,"″") AS "aSize",
				t.species_name AS "species"
				FROM turtle t INNER JOIN species s
				ON t.species_name = s.species_name;
			';
			$sql = '
				SELECT *
				FROM turtle t INNER JOIN turtle_schedule ts
				ON t.turtle_id = ts.turtle_id
				INNER JOIN caretaker c
				ON ts.caretaker_id = c.caretaker_id;
			';
			$ds = $pdo->query($sql);
			print_r($ds);
			echo("<hr><hr>");
			echo('
				<div id="Form">
				<form action="page2.php" method="POST">
				<table border="1">
				<th>turtle_name</th>
				<th>adoption_date</th>
				<th>weight</th>
				<th>size</th>
				<th>gender</th>
				<th>habitat_room</th>
				<th>diet_id</th>
				<th>species_name</th>
				<th>care_lname</th>
				<th>habitat_room</th>
			');
			while($row = $ds->fetch())
			{
				echo("<tr><td>".$row["turtle_name"]."</td><td>".$row["adoption_date"]."</td><td>".$row["weight"]."</td><td>".$row["size"]."</td><td>".$row["gender"]."</td>".
					"<td>".$row["habitat_room"]."</td><td>".$row["diet_id"]."</td><td>".$row["species_name"]."</td><td>".$row["care_fname"]."</td><td>".$row["care_lname"]."</td><td>".$row["gender"]."</tr>");
			}
			
			echo("
				</table>
				</form>
				</div>
			");
		?>
		</div>
	</body>
</html>