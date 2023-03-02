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
						header("location: logout.php");
					}
					
					if($_POST['action'] === 'Edit')
					{
						$_SESSION['user_id'] = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
						header("location: information_edit.php");
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
					$sql_edit = "SELECT user_fname, user_lname, user_phone, user_address, user_email, creation_date, city, zip, state_id, username, user_id FROM new_user WHERE user_id = ".$_SESSION['user_id'];
					$dataset_edit = $pdo_users->query($sql_edit);
					$row = $dataset_edit->fetch();
					echo('
					<div class="contactContainer">
					<form method="POST" action="account.php">
					<th colspan="2">Contact Information</th>
					
					<tr>
						<td>First Name</td>
						<td><div class="input">'.$row["user_fname"].'</div></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><div class="input">'.$row["user_lname"].'</div></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><div class="input">'.$row["user_phone"].'</div></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><div class="input">'.$row["user_email"].'</div></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><div class="input">'.$row["user_address"].'</div></td>
					</tr>
					<tr>
						<td>City</td>
						<td><div class="input">'.$row["city"].'</div></td>
					</tr>
					<tr>
						<td>Zip</td>
						<td><div class="input">'.$row["zip"].'</div></td>
					</tr>
					<tr>
						<td>State</td>
						<td><div class="input">'.$row["state_id"].'</div></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><div class="input">'.$row["username"].'</div></td>
					</tr>
					<td colspan="2">
						<form method="POST" action="account.php">
							<input type="hidden" name="user_id" value="'.$row["user_id"].'">
								<table style="width: 100%">
								<tr>
									<td style="border: 0px; width: 50%;"><input type="submit" value="Edit" name="action" id="submit"></td>
									<td style="border: 0px; width: 50%;"><input type="submit" value="Delete" name="action" id="submit"></td>
								</tr>
								</table>
						</form>
					</td>
					</tr>
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