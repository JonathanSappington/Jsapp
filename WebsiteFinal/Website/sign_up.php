<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign-up Page</title>
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
				if(isset($_POST["password"]))
				{
					try{
					$pwd = $_POST["password"];
					
					$sql = 'INSERT INTO new_user (user_fname, user_lname, user_email, user_phone, user_address, city, zip, username, password, state_id) VALUES (:user_fname, :user_lname, :user_email, :user_phone, :user_address, :city, :zip, :username, :password, :state_id)';
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
					
					$sql->execute();
					echo('<p>User was successfully entered</p>');
					header("location: login.php");
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
					echo('
					
								<div class="contactContainer">
								  <div style="text-align:center">
									<h2>Sign-up</h2>
									<p>Sign-in to view our latest and greatest turtles:</p>
								  </div>
								  <div class="row">
									<div class="column">
									  <img src="images/signup.jpg" style="width:100%">
									</div>
									<div class="column">
									  <form method="POST" action="sign_up.php">
										<tr>
											<td>First Name</td>
											
											<td colspan="3"><input type="text" width="20" size="50" name="user_fname" placeholder="First Name" required></td>
											
										</tr>
										<tr>
											<td>Last Name</td>
											<td colspan="3"><input type="text" width="20" size="50" name="user_lname" placeholder="Last Name" required></td>
										</tr>
										<tr>
											<td>Email</td>
											<td colspan="3"><input type="text" width="20" size="50" name="user_email" placeholder="Email" required></td>
										</tr>
										<tr>
											<td>Phone Number</td>
											<td colspan="3"><input type="text" width="20" size="50" name="user_phone" placeholder="Phone Number" required></td>
										</tr>
										<tr>
											<td>Address</td>
											<td>
											<table style="width: 100%;">
												<tr>
													<td colspan="3" style="border: 0px;"><input type="text" width="20" size="50" name="user_address" placeholder="Address" required></td>
												</tr>
												<tr>
													<td style="border: 0px;"><input type="text" width="20" size="50" name="city" placeholder="City" required></td>
													<td style="width: 25%; border: 0px;">
													<select name="state_id">
					');
					$sql = "SELECT * FROM state";
					$ds = $pdo_users->query($sql);
					while(($row = $ds->fetch()) != null)
						{
							echo('<option value="'.$row["state_id"].'">'.$row["state_name"].'</option>');
						}
					echo('
													</select>
													</td>
													<td style="border: 0px;"><input type="text" width="20" size="50" name="zip" placeholder="Zip" required></td>
												</tr>
											</table>
											</td>
										</tr>
										<tr>
											<td>Username</td>
											<td colspan="3"><input type="text" width="20" size="50" name="username" required></td>
										</tr>
										<tr>
											<td>Password</td>
											<td colspan="3"><input type="password" width="20" size="50" name="password" required></td>
										</tr>
										<tr>
											<td colspan="5"><input type="submit" value="Enter" id="submit"></td>
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