<!DOCTYPE HTML>
<html>
	<head>
		<title>Turtle Upload Database</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
			
			if(!isset($_SESSION["LoginStatus"]) || $_SESSION["LoginStatus"] == false)
			{
				header("location: index.php");
			}
		?>
	</head>
	<body>
		<?php 
			include 'menu.php';
			
			$sql_edit = "SELECT * FROM new_user WHERE user_id = ".$_SESSION['user_id'];
			$dataset_edit = $pdo_users->query($sql_edit);
			$row = $dataset_edit->fetch();
		?>
		<div id="fmData">
		<?php
			if(!isset($_POST["username"]))
			{
				echo('
				<div class="contactContainer">
				  <form method="POST" action="information_edit.php">
										<th colspan="5">
											Sign up
										</th>
										<tr>
											<td>First Name</td>
											
											<td colspan="3"><input type="text" width="20" size="50" name="user_fname" value="'.$row["user_fname"].'" required></td>
											
										</tr>
										<tr>
											<td>Last Name</td>
											<td colspan="3"><input type="text" width="20" size="50" name="user_lname" value="'.$row["user_lname"].'" required></td>
										</tr>
										<tr>
											<td>Email</td>
											<td colspan="3"><input type="text" width="20" size="50" name="user_email" value="'.$row["user_email"].'" required></td>
										</tr>
										<tr>
											<td>Phone Number</td>
											<td colspan="3"><input type="text" width="20" size="50" name="user_phone" value="'.$row["user_phone"].'" required></td>
										</tr>
										<tr>
											<td>Address</td>
											<td>
											<table style="width: 100%;">
												<tr>
													<td colspan="3" style="border: 0px;"><input type="text" width="20" size="50" name="user_address" value="'.$row["user_address"].'" required></td>
												</tr>
												<tr>
													<td style="border: 0px;"><input type="text" width="20" size="50" name="city" value="'.$row["city"].'" required></td>
													<td style="width: 25%; border: 0px;">
													<select name="state_id">
					');
					$sql = "SELECT * FROM state";
					$ds = $pdo_users->query($sql);
					while(($st_row = $ds->fetch()) != null)
						{
							if($st_row["state_id"] == $row["state_id"])
								echo('<option selected value="'.$st_row["state_id"].'">'.$st_row["state_name"].'</option>');
							else
								echo('<option value="'.$st_row["state_id"].'">'.$st_row["state_name"].'</option>');
						}
					echo('
													</select>
													</td>
													<td style="border: 0px;"><input type="text" width="20" size="50" name="zip" value="'.$row["zip"].'" required></td>
												</tr>
											</table>
											</td>
										</tr>
										<tr>
											<td>Username</td>
											<td colspan="3"><input type="text" width="20" size="50" name="username" value="'.$row["username"].'" required></td>
										</tr>
										<tr>
											<td>Password</td>
											<td colspan="3"><input type="password" width="20" size="50" name="password" required></td>
										</tr>
											<input type="hidden" width="20" size="50" name="user_id" value="'.$row["user_id"].'" required>
										<tr>
											<td colspan="5"><input type="submit" value="Enter" id="submit"></td>
										</tr>
								</form>
				</div>
				');
			}
			else{
				try{
					$pwd = $_POST["password"];
					
					$sql = "UPDATE new_user ".
					"SET user_fname = :user_fname, ".
					"user_lname = :user_lname, ".
					"user_email = :user_email, ".
					"user_phone = :user_phone, ".
					"user_address = :user_address, ".
					"city = :city, ".
					"zip = :zip, ".
					"username = :username, ".
					"password = :password, ".
					"state_id = :state_id, ".
					"user_id = :user_id ".
					"WHERE user_id = :user_id";
					$sql = $pdo_users->prepare($sql);
					
					$user_fname = filter_var($_POST["user_fname"],FILTER_SANITIZE_STRING);
					$user_lname = filter_var($_POST["user_lname"],FILTER_SANITIZE_STRING);
					$user_email = filter_var($_POST["user_email"],FILTER_SANITIZE_STRING);
					$user_phone = filter_var($_POST["user_phone"],FILTER_SANITIZE_STRING);
					$user_address = filter_var($_POST["user_address"],FILTER_SANITIZE_STRING);
					$city = filter_var($_POST["city"],FILTER_SANITIZE_STRING);
					$zip = filter_var($_POST["zip"],FILTER_SANITIZE_STRING);
					$username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
					$state_id = filter_var($_POST["state_id"],FILTER_SANITIZE_STRING);
					$user_id = filter_var($_POST["user_id"],FILTER_SANITIZE_STRING);
					
					$password = password_hash($pwd,PASSWORD_DEFAULT);

					
					$sql->bindparam(":user_fname",$user_fname);
					$sql->bindparam(":user_lname",$user_lname);
					$sql->bindparam(":user_email",$user_email);
					$sql->bindparam(":user_phone",$user_phone);
					$sql->bindparam(":user_address",$user_address);
					$sql->bindparam(":city",$city);
					$sql->bindparam(":zip",$zip);
					$sql->bindparam(":username",$username);
					$sql->bindparam(":password",$password);
					$sql->bindparam(":state_id",$state_id);
					$sql->bindparam(":user_id",$user_id);
					
					$sql->execute();
					echo('<p>User was successfully entered</p>');
					header("location: account.php");
					//header( "refresh:2; url=login.php" ); 
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
		?>
		</div>
	</body>
</html>