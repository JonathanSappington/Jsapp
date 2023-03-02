<!DOCTYPE HTML>
<html>
	<head>
		<title>PDO</title>
		
		<?php
			require 'db_connect.php';
			if(!EMPTY($_POST["dogname"]))
			{
$sql_update = "UPDATE tbl_doginfo ".
"SET dogname = :dogname, ".
"dogbreed = :dogbreed, ".
"ownerfirstname = :ownerfirstname, ".
"ownerlastname = :ownerlastname, ".
"city = :city, ".
"st = :st ".
"WHERE dogid = :dogid";
				
				$sql_update = $pdo->prepare($sql_update);
						
				$dogname = filter_var($_POST["dogname"],FILTER_SANITIZE_STRING);
				$dogbreed = filter_var($_POST["dogbreed"],FILTER_SANITIZE_STRING);
				$ownerfirstname = filter_var($_POST["ownerfirstname"],FILTER_SANITIZE_STRING);
				$ownerlastname = filter_var($_POST["ownerlastname"],FILTER_SANITIZE_STRING);
				$city = filter_var($_POST["city"],FILTER_SANITIZE_STRING);
				$st = filter_var($_POST["st"],FILTER_SANITIZE_STRING);
				$dogid = filter_var($_POST["dogid"],FILTER_SANITIZE_STRING);

				
				$sql_update->bindparam(":dogname",$dogname);
				$sql_update->bindparam(":dogbreed",$dogbreed);
				$sql_update->bindparam(":ownerfirstname",$ownerfirstname);
				$sql_update->bindparam(":ownerlastname",$ownerlastname);
				$sql_update->bindparam(":city",$city);
				$sql_update->bindparam(":st",$st);
				$sql_update->bindparam(":dogid",$dogid);
				
				$sql_update->execute();
				header("location: display_edit.php");
			}
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
				background: #850085;
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
			
			#submit{
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h1>Dog Database</h1>

		<br>
		<div id="fmData">
		
		<?php
			include 'menu.php';
			echo($output);
			$sql_st = "SELECT * ".
						"FROM tbl_State ".
						"ORDER BY st";
						
			$dataset_st = $pdo->query($sql_st);
			
			$sql_edit = "SELECT * FROM tbl_doginfo WHERE dogid = ".$_SESSION['dogid'];
			$dataset_edit = $pdo->query($sql_edit);
			$row = $dataset_edit->fetch();
		?>
		
				<form method="POST" action="edit_data.php">
					<table border="1">
						<th colspan="2">
							Dog Information
						</th>
						<?php
						echo('
							<tr>
								<td>Dog Name</td>
								<td><input type="text" width="20" name="dogname" value="'.$row["dogname"].'" required></td>
							</tr>
							<tr>
								<td>Dog Breed</td>
								<td><input type="text" width="20" name="dogbreed" value="'.$row["dogbreed"].'" required></td>
							</tr>
							<tr>
								<td>Owner First Name</td>
								<td><input type="text" width="20" name="ownerfirstname" value="'.$row["ownerfirstname"].'" required></td>
							</tr>
							<tr>
								<td>Owner Last Name</td>
								<td><input type="text" width="20" name="ownerlastname" value="'.$row["ownerlastname"].'" required></td>
							</tr>
							<tr>
								<td>City</td>
								<td><input type="text" width="20" name="city" value="'.$row["city"].'" required></td>
							</tr>
							');
						?>
						<tr>
							<td>State</td>
							<td>
								<select name="st" id="st">
									<?php
									  while($col = $dataset_st->fetch())
										{
											if($row['st'] === $col["st"])
												echo('<option value="'.$col["st"].'" selected>'.$col["st"].'</option>');
											else
												echo('<option value="'.$col["st"].'">'.$col["st"].'</option>');

										}
									?>
								</select>
							</td>
						</tr>
							<tr>
								<td>Record Id: <?php echo($row['dogid']); ?></td>
								<td><input type="hidden" name="dogid" value="<?php echo($row['dogid']); ?>"></td>
							</tr>
							<td colspan="2"><input type="submit" value="Enter" id="submit"></td>
						</tr>
					</table>
				</form>
	</body>
</html>