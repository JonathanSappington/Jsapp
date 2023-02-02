<!DOCTYPE HTML>
<html>
	<head>
		<title>Turtle Adoption Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
			
			if(isset($_POST))
			{
				if(!empty($_POST['action']))
				{
					if($_POST['action'] === 'Delete')
					{
						$turtle_id = filter_var($_POST['turtle_id'], FILTER_SANITIZE_STRING);
						$sql_delete = "DELETE FROM turtle WHERE turtle_id = ".$turtle_id;
						
						$pdo_turtle->exec($sql_delete);
					}
					
					if($_POST['action'] === 'Edit')
					{
						$_SESSION['turtle_id'] = filter_var($_POST['turtle_id'], FILTER_SANITIZE_NUMBER_INT);
						header("location: addedit.php");
					}
				}
			}
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
				$sql = "SELECT * FROM turtle";
				$ds = $pdo_turtle->query($sql);
				while(($row = $ds->fetch()) != null)
					{
						$sql_habitat = "SELECT * FROM habitat";
						$sql_diet = "SELECT * FROM diet";
						$dds = $pdo_turtle->query($sql_diet);
						$hds = $pdo_turtle->query($sql_habitat);
						echo('<div class="responsive">
						  <div class="gallery">
							<a target="_blank" href="images/temple.jpg">
							  <img src="data:'.$row['image_type'].';base64,'.$row["turtle_image"].'" width="600" height="400">'.'</td></tr>
							</a>
							<div class="desc">Name: '.$row["turtle_name"].'</div>
							<div class="desc">Adoption Date: '.$row["adoption_date"].'</div>
							<div class="desc">Weight: '.$row["weight"].'</div>
							<div class="desc">Size: '.$row["size"].'</div>
							<div class="desc">Gender: '.$row["gender"].'</div>');
							while(($dietRow = $dds->fetch()) != null)
							{
								if($dietRow["diet_id"] == $row["diet_id"])
									echo('<div class="desc">Favorite Food:'.$dietRow["food_name"].'</div>');
							}
							while(($habitatRow = $hds->fetch()) != null)
							{
								if($habitatRow["habitat_room"] == $row["habitat_room"])
									echo('<div class="desc"> Habitat: '.$habitatRow["biome_name"].'</div>');
							}
							echo('
							<div class="desc"> Species Name: '.$row["species_name"].'</div>');
							if(isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"] == true && $_SESSION["admin_status"] == 1) 
							{
							echo('<td>'.
								'<form method="POST" action="m_page1.php">
									 <input type="hidden" name="turtle_id" value="'.$row["turtle_id"].'">'
									 .'
									 <table style="width: 100%;"><tr>
									 <td><input type="submit" value="Edit" name="action" id="submit"></td>'.
									 '<td><input type="submit" value="Delete" name="action" id="submit"></td>
									 </tr></table>'.
								 '</form>'.
							 '</td>');
							}
						  echo('</div>
						</div>');
					}
					
				if(isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"] == true && $_SESSION["admin_status"] == 1) 
				{
				echo('<form method="POST" action="turtle_Add.php">
					 <table style="width: 100%;"><tr>
					 <td><input type="submit" value="Add" name="action" id="submit"></td>
					 </tr></table>
				 </form>');
				}
			?>
			<div class="clearfix"></div>
		</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>