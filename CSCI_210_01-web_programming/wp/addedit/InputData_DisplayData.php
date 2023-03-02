<!DOCTYPE HTML>
<html>
	<head>
		<title>Results</title>
		
		<?php
			require 'db_connect.php';
		?>
		
		<style>
			#tblData table{
				margin: auto;
			}
			th, td{
				padding: 20px;
			}
			
			button{
				text-align: left;
				width: 100%;
				padding-top: 10px;
				padding-bottom: 10px;
				text-align: center;
			}
			
			th{
				background: #008500;
				color: white;
			}
		</style>
	</head>
	<body>
		<h1>Information Accepted</h1>
		<br>
		<?php include 'menu.php' ?>
		<div id="tblData">
		<?php
			if (isset($_POST["dogname"])){
				try{
					$sql = 'INSERT INTO tbl_doginfo (dogname, dogbreed, ownerfirstname, ownerlastname, city,st) VALUES (:dogname,:dogbreed,:ownerfirstname,:ownerlastname,:city,:st)';
					$sql = $pdo->prepare($sql);
					
					$dogname = filter_var($_POST["dogname"],FILTER_SANITIZE_STRING);
					$dogbreed = filter_var($_POST["dogbreed"],FILTER_SANITIZE_STRING);
					$ownerfirstname = filter_var($_POST["ownerfirstname"],FILTER_SANITIZE_STRING);
					$ownerlastname = filter_var($_POST["ownerlastname"],FILTER_SANITIZE_STRING);
					$city = filter_var($_POST["city"],FILTER_SANITIZE_STRING);
					$st = filter_var($_POST["st"],FILTER_SANITIZE_STRING);

					
					$sql->bindparam(":dogname",$dogname);
					$sql->bindparam(":dogbreed",$dogbreed);
					$sql->bindparam(":ownerfirstname",$ownerfirstname);
					$sql->bindparam(":ownerlastname",$ownerlastname);
					$sql->bindparam(":city",$city);
					$sql->bindparam(":st",$st);
					
					$sql->execute();
					
					$sql_selectLastDogEntered = "SELECT *".
												 "FROM tbl_doginfo ".
												 "WHERE dogid = (SELECT MAX(dogid) From tbl_doginfo)";
					
					$ds = $pdo->query($sql_selectLastDogEntered);
					
					echo('<table border="1">
					<th>Dog Name</th>
					<th>Dog Breed</th>
					<th>Owner First Name</th>
					<th>Owner Last Name</th>
					<th>City</th>
					<th>State</th>');

					echo("<tr>
					<td>$dogname</td>
					<td>$dogbreed</td>
					<td>$ownerfirstname</td>
					<td>$ownerlastname</td>
					<td>$city</td>
					<td>$st</td>
					</tr>");
					
					echo("<tr>");
						echo('<td colspan="8"><a href="index.php"><button type="button">Add More</button></a></td>');
					echo("</tr>");
					echo("</table>");
					
					unset($_POST);
				}
				catch(PDOEXCEPTION $e){
					echo("** ERROR **".$e->GetMessage());
				}
				catch(EXCEPTION $e){
					echo("** ERROR **".$e->GetMessage());
				}
			}
			else{
				Header("Location: index.php");
			}
		?>
		</div>
	</body>
</html>