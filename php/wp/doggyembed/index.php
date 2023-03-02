<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>
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
				<div class="thecontent">
					<?php
						if(!isset($_POST["dogname"])){
							echo('
							<h1>Doggy Embed Example</h1>
							<form method="POST" action="index.php" ENCTYPE="multipart/form-data">
								<table>
									<th colspan="2">
										Dog Info
									</th>
									<tr>
										<td>Dog Name</td>
										
										<td><input type="text" size="25" name="dogname" id="dogname" required></td>	
									</tr>
									<tr>
										<td>Dog Breed</td>
										
										<td><input type="text" size="25" name="dogbreed" id="dogbreed"></td>	
									</tr>
									<tr>
										<td>Dog Image</td>
										
										<td><input type="file" name="dogimage" id="dogimage" accept=".jpg,.jpeg,.png,.gif"></td>	
									</tr>
									<tr>
										<td colspan="2"><input type="submit" value="Enter" id="submit"></td>
									</tr>
								</table>
							</form>');
						}
						else{
							$fileName = $_FILES['dogimage']['tmp_name'];
							$image_size = fileSize($fileName);
							$image_type = mime_content_type($fileName);
							
							$dogimage = base64_encode(file_get_contents($fileName));
							
							print_r($_POST);
							
							$sql = 'INSERT INTO table1(dogname,dogbreed,dogimage,image_type,image_size) VALUES (:dogname,:dogbreed,:dogimage,:image_type,:image_size)';
							
							$sql = $pdo->prepare($sql);
					
							$dogname = filter_var($_POST["dogname"],FILTER_SANITIZE_STRING);
							$dogbreed = filter_var($_POST["dogbreed"],FILTER_SANITIZE_STRING);

							
							$sql->bindparam(":dogname",$dogname);
							$sql->bindparam(":dogbreed",$dogbreed);
							$sql->bindparam(":dogimage",$dogimage,PDO::PARAM_LOB);
							$sql->bindparam(":image_type",$image_type);
							$sql->bindparam(":image_size",$image_size);

							$upcheck = $sql->execute();
							
							if($upcheck){
								echo("File upload successful");
							}
							else{
								echo("File upload failed");
							}
						}
					?>
				</div>
			</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>