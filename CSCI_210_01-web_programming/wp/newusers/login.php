<!DOCTYPE HTML>
<html>
	<head>
		<title>Login Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
		?>
		
		<style>
			#fmData table{
				margin: auto;
				width: 50%;
			}
			td{
				text-align: center;
			}
			
			th{
				color: white;
				padding: 20px;
			}
			
			td input{
				text-align: left;
				width: 99%;
				padding-top: 10px;
				padding-bottom: 10px;
			}
			
			td select, #submit, button{
				text-align: left;
				width: 100%;
				padding-top: 10px;
				padding-bottom: 10px;
				text-align: center;
			}
			
			#item_memo{
				
			}
			
			#submit{
				text-align: center;
			}
		</style>
	</head>
	<body>
	<div id="wrapper">
		<main>
		<h1>Password Demo</h1>

		<br>
		<div id="fmData">

			<?php 
			include 'menu.php';
			echo($output);
			error_reporting(0);
			?>
			
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
							echo("<br>Bad username or password<br>");
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
								
								Header("location: memberpage.php");
							}
							else
							{
								echo("<br>Bad username or password<br>");
								$_SESSION['LoginStatus'] = false;
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
					echo('
								<form method="POST" action="login.php">
									<table>
										<th colspan="2">
											Login
										</th>
										<tr>
											<td>username</td>
											<td><input type="text" width="20" size="50" name="username" placeholder="WaffleMan92" required></td>
										</tr>
										<tr>
											<td>password</td>
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