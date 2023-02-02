<!DOCTYPE HTML>
<html>
	<head>
		<title>Add Turtle Database</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
		?>
	</head>
	<body>
	<div id="wrapper">
		<main>
		<?php 
			include 'menu.php';
			echo($output);
		?>

		<div id="fmData">
			
			<?php
				if(isset($_SESSION["logerr_message"]))
				{
					echo("** WARNING ** invalid username");
					unset($_SESSION["logerr_message"]);
				}
			?>
			<?php
				if(isset($_POST["turtle_name"]))
				{
					try{
					$ImageFile = $_FILES['turtle_image']['tmp_name'];

					$turtle_image = base64_encode(file_get_contents($_FILES['turtle_image']['tmp_name']));
					$image_size = filesize($ImageFile);
					$image_type = mime_content_type($ImageFile);
					
					$sql = 'INSERT INTO turtle (turtle_name, adoption_date, weight, size, gender, habitat_room, diet_id, species_name, turtle_image, image_size,image_type) VALUES (:turtle_name, :adoption_date, :weight, :size, :gender, :habitat_room, :diet_id, :species_name, :turtle_image, :image_size, :image_type)';
					$sql = $pdo_turtle->prepare($sql);
					
					$turtle_name = filter_var($_POST["turtle_name"],FILTER_SANITIZE_STRING);
					$adoption_date = filter_var($_POST["adoption_date"],FILTER_SANITIZE_STRING);
					$weight = filter_var($_POST["weight"],FILTER_SANITIZE_STRING);
					$size = filter_var($_POST["size"],FILTER_SANITIZE_STRING);
					$gender = filter_var($_POST["gender"],FILTER_SANITIZE_STRING);
					$habitat_room = filter_var($_POST["habitat_room"],FILTER_SANITIZE_STRING);
					$diet_id = filter_var($_POST["diet_id"],FILTER_SANITIZE_STRING);
					$species_name = filter_var($_POST["species_name"],FILTER_SANITIZE_STRING);
					
					$sql->bindparam(":turtle_name",$turtle_name);
					$sql->bindparam(":adoption_date",$adoption_date);
					$sql->bindparam(":weight",$weight);
					$sql->bindparam(":size",$size);
					$sql->bindparam(":gender",$gender);
					$sql->bindparam(":habitat_room",$habitat_room);
					$sql->bindparam(":diet_id",$diet_id);
					$sql->bindparam(":species_name",$species_name);
					
					$sql->bindparam(":turtle_image",$turtle_image,PDO::PARAM_LOB);
					$sql->bindparam(":image_size",$image_size);
					$sql->bindparam(":image_type",$image_type);
					$sql->execute();
					
					header("location: m_page1.php");
					}
					catch(PDOEXCEPTION $e){
						echo("** ERROR **".$e->GetMessage()."<br> <br>");
						echo($e->getCode());
						
						if($e->getCode() == 23000)
						{
							$_SESSION['logerr_message'] = "Username taken";
							//header("location: sign_up.php");
						}
					}
					catch(EXCEPTION $e){
						echo("** ERROR **".$e->GetMessage());
					}
				}
				else{
					$sql_habitat = "SELECT * FROM habitat";
					$sql_diet = "SELECT * FROM diet";
					$sql_species = "SELECT * FROM species";
					$dds = $pdo_turtle->query($sql_diet);
					$hds = $pdo_turtle->query($sql_habitat);
					$sds = $pdo_turtle->query($sql_species);
					echo('
					
								<div class="contactContainer">
								  <div style="text-align:center">
									<h2>Add Turtle Information</h2>
									<p>Sign-in to view our latest and greatest articles:</p>
								  </div>
								  <div class="row">
									<div class="column">
									  <img src="images/turtle_add.jpg" style="width:100%">
									</div>
									<div class="column">
									  <form method="POST" action="turtle_add.php" enctype="multipart/form-data">
						<tr>
							<td>Name</td>
							<td><input type="text" width="20" name="turtle_name" placeholder="e.g Michael" required></td>
						</tr>
						<tr>
							<td>Adoption Date</td>
							<td><input type="text" width="20" name="adoption_date" placeholder="YYYY-MM-DD" required></td>
						</tr>
						<tr>
							<td>Weight</td>
							<td><input type="text" width="20" name="weight" required></td>
						</tr>
						<tr>
							<td>Size</td>
							<td><input type="text" width="20" name="size" required></td>
						</tr>
						<tr>
							<td>Gender</td>
							<br><label for="Male">Male <input type="radio" checked id="Male" name="gender" value="Male" style="width: auto;"></label>
							<label for="Female">Female <input type="radio" id="Female" name="gender" value="Female" style="width: auto;"></label>
						</tr>
						<tr>
							<br>
							<br>
							<td>Habitat</td>
							<select name="habitat_room">
							');
					while(($row = $hds->fetch()) != null)
						{
							echo('<option value="'.$row["habitat_room"].'">'.$row["biome_name"].'</option>');
						}
						echo('
						</select>
						</tr>
						<tr>
							<td>Favorite Food</td>
							<select name="diet_id">
							');
							while(($row = $dds->fetch()) != null)
						{
							echo('<option value="'.$row["diet_id"].'">'.$row["food_name"].'</option>');
						}
							
						echo('	
						</select>
						</tr>
						<tr>
							<td>Species Name</td>
							<select name="species_name">
							');
							while(($row = $sds->fetch()) != null)
						{
							echo('<option value="'.$row["species_name"].'">'.$row["species_name"].'</option>');
						}
							
						echo('	
						</select>
						</tr>
						<tr>
							<td>Picture File</td>
							<td><input type="file" name="turtle_image" accept=".jpg,.jpeg,.png,.gif" required></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="enter" id="submit"></td>
						</tr>
				</form>
									</div>
								  </div>
								</div>
				');
				}
			?>
		</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>