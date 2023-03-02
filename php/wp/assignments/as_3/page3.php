<!DOCTYPE HTML>
<html>
	<head>
		<title>View Roster</title>
		
		<?php
			session_start();
		?>
	</head>
	<body>
		<h1>View Roster</h1>
		
		<nav id="Nav">
			<a href="index.html">Home</a>
			<a href="logout.php">Logout</a>
		</nav>
		<?php
				echo('<table border="2" cellpadding="5">');
				echo('<tr><th colspan="4">Team Players</th></tr>');
				echo('<tr><th>First Name</th><th>Last Name</th><th>Address</th><th>Team</th></tr>');
				foreach($_SESSION as $key => $value) {
					echo('<tr><td>'.$value["fName"].'</td><td>'.$value["lName"].'</td><td>'.$value["Address"].", ".$value["City"].", ".
					$value["State"].", ".$value["Zip"].'</td><td>'.$value["tName"].'</td></tr>');
				}
				echo('</table>');
		?>
	</body>
</html>