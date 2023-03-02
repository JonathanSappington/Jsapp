<!DOCTYPE HTML>
<html>
	<head>
		<title>Login Page</title>
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
			error_reporting(0);
		?>

		<div id="fmData">
			<p style="text-align: center;">Login to access the latest National News Foundation articles.</p>
			<?php
				if(isset($_POST["password"]))
				{
					try{
						$sql = 'SELECT firstname, lastname, username,password FROM tbl_newuser WHERE username=:username';
						
						$sql = $pdo->prepare($sql);
					
						$username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
						
						$sql->bindparam(":username",$username);
						
						$sql->execute();
						
						$dt = $sql->fetch();
						if($dt['password'] == null)
						{
							$_SESSION['LoginStatus'] = false;
							$_SESSION['Warning'] = true;
								
							header( "location: login.php" ); 
						}
						else
						{
							//print_r($dt);
							
							$hash_pwd = $dt["password"];
							
							if(password_verify($_POST['password'],$hash_pwd))
							{
								$_SESSION['LoginStatus'] = true;
								$_SESSION['firstname'] = $dt["firstname"];
								$_SESSION['lastname'] = $dt["lastname"];
								
								Header("location: m_page1.php");
							}
							else
							{
								$_SESSION['LoginStatus'] = false;
								$_SESSION['Warning'] = true;
								
								header( "location: login.php" ); 
							}
						}
					}
					catch(PDOEXCEPTION $e){
						echo("** ERROR **".$e->GetMessage()."<br> <br>");
					}
					catch(EXCEPTION $e){
						echo("** ERROR **".$e->GetMessage());
					}
				}
				else{
					if($_SESSION['Warning'])
					{
						echo("<br>Bad username or password<br>");
						$_SESSION['Warning'] = false;
					}
					echo('
								<form method="POST" action="login.php">
									<table>
										<th colspan="2">
											Login
										</th>
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