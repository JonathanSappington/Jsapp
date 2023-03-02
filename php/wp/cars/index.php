<!DOCTYPE HTML>
<html>
	<head>
		<title>PDO</title>
		
		<?php
			require 'db_connect.php';
		?>
	</head>
	<body>
		<h1>PDO Access</h1>
		<a href="page1.php">Show All Cars</a>
		<br>
		
		<?php
			if(!isset($_POST["OwnerFN"]))
			{
				echo('
				<form method="POST" action="index.php">
					<table border="1">
						<tr>
							<td>First Name</td>
							<td><input type="text" width="20" name="OwnerFN" value="Jeff"></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td><input type="text" width="20" name="OwnerLN" value="Josh"></td>
						</tr>
						<tr>
							<td>Make</td>
							<td><input type="text" width="20" name="Make" value="Toyota"></td>
						</tr>
						<tr>
							<td>Model</td>
							<td><input type="text" width="20" name="Model" value="Corolla"></td>
						</tr>
						<tr>
							<td>Color</td>
							<td><input type="text" width="20" name="Color" value="Blue"></td>
						</tr>
						<tr>
							<td>Year</td>
							<td><input type="text" width="20" name="CarYear" value="1998"></td>
						</tr>
						<tr>
							<td><input type="submit" value="enter"></td>
						</tr>
					</table>
				</form>
				');
			}
			else{
				try{
					$sql = 'INSERT INTO tbl_cars (OwnerFN, OwnerLN, Make,Model,Color,CarYear) VALUES (:OwnerFN,:OwnerLN,:Make,:Model,:Color,:CarYear)';
					$sql = $pdo->prepare($sql);
					
					$OwnerFN = filter_var($_POST["OwnerFN"],FILTER_SANITIZE_STRING);
					$OwnerLN = filter_var($_POST["OwnerLN"],FILTER_SANITIZE_STRING);
					$Make = filter_var($_POST["Make"],FILTER_SANITIZE_STRING);
					$Model = filter_var($_POST["Model"],FILTER_SANITIZE_STRING);
					$Color = filter_var($_POST["Color"],FILTER_SANITIZE_STRING);
					$CarYear = filter_var($_POST["CarYear"],FILTER_SANITIZE_STRING);
					
					$sql->bindparam(":OwnerFN",$OwnerFN);
					$sql->bindparam(":OwnerLN",$OwnerLN);
					$sql->bindparam(":Make",$Make);
					$sql->bindparam(":Model",$Model);
					$sql->bindparam(":Color",$Color);
					$sql->bindparam(":CarYear",$CarYear);
					
					$sql->execute();
					
					$sql_selectLastCarEntered = "SELECT *".
												 "FROM tbl_cars ".
												 "WHERE CarPK = (SELECT MAX(CarPK) From tbl_cars)";
					
					echo($output."<br><hr>");
					$sql = 'SELECT * FROM tbl_cars WHERE OwnerFN="Jeff"';
					$ds = $pdo->query($sql_selectLastCarEntered);
					print_r($ds);
					echo("<hr><hr>");
					while($row = $ds->fetch())
					{
						echo($row["OwnerFN"]." | ".
						$row["OwnerLN"]." | ".
						$row["Make"]." | ".
						$row["Model"]." | ".
						$row["Color"]." | ".
						$row["CarYear"]."<br>");
					}
					
					unset($_POST);
				}
				catch(PDOEXCEPTION $e){
					echo("** ERROR **".$e->GetMessage());
				}
				
				echo('<a href="index.php"><button type="button">Add More</button></a>');
			}
		?>
	</body>
</html>