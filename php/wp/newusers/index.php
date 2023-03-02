<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>
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

			<?php include 'menu.php';
			echo($output);?>
			
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
					}
					catch(PDOEXCEPTION $e){
						echo("** ERROR **".$e->GetMessage()."<br> <br>");
						echo($e->getCode());
						
						if($e->getCode() == 23000)
						{
							$_SESSION['logerr_message'] = "Username taken";
							header("location: index.php");
						}
					}
					catch(EXCEPTION $e){
						echo("** ERROR **".$e->GetMessage());
					}
				}
				else{
					echo('
								<form method="POST" action="index.php">
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