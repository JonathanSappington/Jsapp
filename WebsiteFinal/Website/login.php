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
			<?php
				if(isset($_POST["password"]))
				{
					try{
						$sql = 'SELECT user_fname, user_lname, username,password, user_id, admin_status FROM new_user WHERE username=:username';
						
						$sql = $pdo_users->prepare($sql);
					
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
								$_SESSION['user_fname'] = $dt["user_fname"];
								$_SESSION['user_lname'] = $dt["user_lname"];
								$_SESSION['user_id'] = $dt["user_id"];
								$_SESSION['admin_status'] = $dt["admin_status"];
								
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
								<div class="contactContainer">
								  <div style="text-align:center">
									<h2>Login</h2>
									<p>Login now to access our massive catalog of turtle media:</p>
								  </div>
								  <div class="row">
									<div class="column">
									  <img src="images/login.jpg" style="width:100%">
									</div>
									<div class="column">
									  <form method="POST" action="login.php">
										<tr>
											<td>Username</td>
											<td><input type="text" width="20" size="50" name="username" required></td>
										</tr>
										<tr>
											<td>Password</td>
											<td><input type="password" width="20" size="50" name="password" required></td>
										</tr>
										<tr>
											<input type="submit" value="Submit" id="submit">
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