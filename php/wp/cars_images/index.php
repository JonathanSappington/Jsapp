<!DOCTYPE HTML>
<html>
	<head>
		<title>Car Upload Database</title>
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
			if(!isset($_POST["OwnerFN"]))
			{
				echo('
				<form method="POST" action="index.php" enctype="multipart/form-data">
					<table>
						<tr>
							<th colspan="2">
								Enter Car
							</th>
						</tr>
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
							<td>Picture File</td>
							<td><input type="file" name="Car_Image" accept=".jpg,.jpeg,.png,.gif"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="enter"></td>
						</tr>
					</table>
				</form>
				');
			}
			else{
				try{
					$ImageFile = $_FILES['Car_Image']['tmp_name'];

					$Car_Image = base64_encode(file_get_contents($_FILES['Car_Image']['tmp_name']));
					$Image_Size = filesize($ImageFile);
					$Image_Type = mime_content_type($ImageFile);
					
					$sql = 'INSERT INTO tbl_cars (OwnerFN, OwnerLN, Make,Model,Color,CarYear,Car_Image, Image_Size, Image_Type) VALUES (:OwnerFN,:OwnerLN,:Make,:Model,:Color,:CarYear,:Car_Image,:Image_Size,:Image_Type)';
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
					
					$sql->bindparam(":Car_Image",$Car_Image,PDO::PARAM_LOB);
					$sql->bindparam(":Image_Size",$Image_Size);
					$sql->bindparam(":Image_Type",$Image_Type);

					$sql->execute();
				
					$sql_selectLastCarEntered = "SELECT *".
												 "FROM tbl_cars ".
												 "WHERE CarPK = (SELECT MAX(CarPK) From tbl_cars)";
					
					$ds = $pdo->query($sql_selectLastCarEntered);
					echo("<table>");
					echo("<tr><th colspan='7'>Uploaded Car</th></tr>");
					while($row = $ds->fetch())
					{
						echo('<tr><td>'.$row["OwnerFN"]."</td><td>".
						$row["OwnerLN"]."</td><td>".
						$row["Make"]."</td><td>".
						$row["Model"]."</td><td>".
						$row["Color"]."</td><td>".
						$row["CarYear"]."</td>");
						echo('<td><img src="data:'.$row['Image_Type'].';base64,'.$row["Car_Image"].'"></td></tr>');
					}
					echo('<tr><td colspan="7"><a href="index.php"><button type="button">Add More</button></a></td></tr>');
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