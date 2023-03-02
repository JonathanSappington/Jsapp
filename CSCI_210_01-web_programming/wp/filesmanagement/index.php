<!DOCTYPE HTML>
<html>
	<head>
		<title>Pix</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
		?>
	</head>
	<body>
	<div id="wrapper">
		<main>
			<h1>File Directory Management</h1>
			
			<?php 
				include 'menu.php';
				echo($output);
				
				if(isset($_POST['submit']))
				{
					$dir = "pix/";
					
					if($_POST["submit"] == 'Make Directory')
					{
						mkdir($dir.$_POST["makedir"]);
					}
					else if($_POST["submit"] == 'Delete Directory')
					{
						rmdir($dir.$_POST["makedir"]);
					}
					else if($_POST["submit"] == 'Upload')
					{
						$target_file = $dir.basename($_FILES['fileToUpload']['name']);
						if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file))
						{
							echo('<script>console.log("File upload successful")</script>');
							echo('<script>alert("File upload successful")</script>');
						}
						else
						{
							echo('<script>console.log("File upload unsuccessful")</script>');
							echo('<script>alert("File upload unsuccessful")</script>');
						}
					}
					else if($_POST["submit"] == 'Delete')
					{
						$myArray = array_values($_POST);
						
						for($i = 0; $i < count($myArray) - 1; $i++){
							unlink($dir.$myArray[$i]);
						}
					}
					
					$_POST['submit'] = "";
				}
			?>
		
			
				
			<div id="fmData">
				<form method="POST" action="index.php" enctype="multipart/form-data">
					<table>
						<tr>
							<th colspan="3">Edit Directory</th>
						</tr>
						<tr>
							<td><input type="text" name="makedir" id="makedir"></td>
							<td><input type="submit" style="text-align: center; margin=10px" value="Make Directory" name="submit"></td>
							<td><input type="submit" style="text-align: center; margin=10px" value="Delete Directory" name="submit"></td>
						</tr>
					</table>
				</form>
				<br>
				
				<form method="POST" action="index.php" enctype="multipart/form-data">
					<table>
						<tr>
							<th colspan="2">Upload File</th>
						</tr>
						<tr>
							<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
							<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
							<td><input type="submit" style="text-align: center; margin=10px" value="Upload" name="submit"></td>
						</tr>
					</table>
				</form>
				<br>
				
				<?php
					chdir($dir);
					$files = glob('*.*');
					
					echo('
						<form method="POST" action="index.php" enctype="multipart/form-data">
							<table>
								<tr>
									<th colspan="2">Delete Files</th>
								</tr>');
									for($c = 0; $c < count($files); $c++)
									{
										echo('
											<tr>
												<td><input type="checkbox" name="xfilename'.$c.'" value="'.$files[$c].'"></td>
												<td>'.$files[$c].'</td>
											</tr>
										');
									}
					echo('
								<tr>
									<td colspan=2><input type="submit" style="text-align: center; margin=10px" value="Delete" name="submit"></td>
								</tr>

							</table>
						</form>
					');
				?>
			</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>