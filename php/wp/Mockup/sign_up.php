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
			
			<?php
				if(isset($_SESSION["logerr_message"]))
				{
					echo("** WARNING ** invalid username");
					unset($_SESSION["logerr_message"]);
				}
			?>
			<p style="text-align: center;">Sign-in to view our latest and greatest articles.</p>
			<?php
				if(isset($_POST["password"]))
				{
					try{
					$pwd = $_POST["password"];
					
					$sql = 'INSERT INTO tbl_newuser (firstname, lastname, username, password) VALUES (:firstname,:lastname,:username,:password)';
					$sql = $pdo->prepare($sql);
					
					$firstname = filter_var($_POST["firstname"],FILTER_SANITIZE_STRING);
					$lastname = filter_var($_POST["lastname"],FILTER_SANITIZE_STRING);
					$username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
					
					$password = password_hash($pwd,PASSWORD_DEFAULT);

					
					$sql->bindparam(":firstname",$firstname);
					$sql->bindparam(":lastname",$lastname);
					$sql->bindparam(":username",$username);
					$sql->bindparam(":password",$password);
					
					$sql->execute();
					echo('<p>User was successfully entered</p>');
					header( "refresh:2; url=login.php" ); 
					}
					catch(PDOEXCEPTION $e){
						echo("** ERROR **".$e->GetMessage()."<br> <br>");
						echo($e->getCode());
						
						if($e->getCode() == 23000)
						{
							$_SESSION['logerr_message'] = "Username taken";
							header("location: sign_up.php");
						}
					}
					catch(EXCEPTION $e){
						echo("** ERROR **".$e->GetMessage());
					}
				}
				else{
					echo('
								<form method="POST" action="sign_up.php">
									<table>
										<th colspan="2">
											New User
										</th>
										<tr>
											<td>First Name</td>
											
											<td><input type="text" width="20" size="50" name="firstname" placeholder="Bill" required></td>
											
										</tr>
										<tr>
											<td>Last Name</td>
											<td><input type="text" width="20" size="50" name="lastname" placeholder="Ted" required></td>
										</tr>
										<tr>
											<td>Username</td>
											<td><input type="text" width="20" size="50" name="username" required></td>
										</tr>
										<tr>
											<td>Password</td>
											<td><input type="password" width="20" size="50" name="password" required></td>
										</tr>
										<tr>
											<td colspan="2"><input type="submit" value="Enter" id="submit"></td>
										</tr>
									</table>
								</form>
				');
				}
			?>
		</div>
		</main>
	</body>
</html>