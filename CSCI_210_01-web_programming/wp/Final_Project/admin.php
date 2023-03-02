<!DOCTYPE HTML>
<html>
	<head>
		<title>Members Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
			
			if(!isset($_SESSION["LoginStatus"]) || $_SESSION["LoginStatus"] == false)
			{
				header("location: index.php");
			}
			
			if(isset($_POST))
			{
				if(!empty($_POST['action']))
				{
					if($_POST['action'] === 'Delete')
					{
						$user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_STRING);
						$sql_delete = "DELETE FROM new_user WHERE user_id = ".$user_id;
						
						$pdo_users->exec($sql_delete);
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
				try{
					$sql = 'SELECT user_fname, user_lname, user_phone, user_address, user_email, creation_date, city, zip, state_id, username, user_id FROM new_user';
					
					echo('
					<div class="contactContainer">
							<form method="POST" action="admin.php">
							<table>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Phone Number</th>
									<th>Address</th>
									<th>Email</th>
									<th>Date Created</th>
									<th>City</th>
									<th>Zip</th>
									<th>State</th>
									<th>Username</th>
									<th>Edit</th>
					');
									
					$ds = $pdo_users->query($sql);
					while(($row = $ds->fetch()) != null)
						{
							echo('
							<tr>
							<td>'.$row["user_fname"].'</td>
							<td>'.$row["user_lname"].'</td>
							<td>'.$row["user_phone"].'</td>
							<td>'.$row["user_address"].'</td>
							<td>'.$row["user_email"].'</td>
							<td>'.$row["creation_date"].'</td>
							<td>'.$row["city"].'</td>
							<td>'.$row["zip"].'</td>
							<td>'.$row["state_id"].'</td>
							<td>'.$row["username"].'</td>
							');
							echo('
							<td>
								<form method="POST" action="admin.php">
									<input type="hidden" name="user_id" value="'.$row["user_id"].'">
									<table>
										<tr>
											<td style="border: 0px;"><input type="submit" value="Delete" name="action" id="submit"></td>
										</tr>
									</table>
								</form>
							</td>
							</tr>');
						}
					
					echo('
							</table>
							</form>
							</div>
					');
				}
				catch(PDOEXCEPTION $e){
					echo("** ERROR **".$e->GetMessage()."<br> <br>");
				}
				catch(EXCEPTION $e){
					echo("** ERROR **".$e->GetMessage());
				}
			?>
			
		</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>