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
			if (isset($_POST["name"])){
				try{
					$sql = 'INSERT INTO tbl_gym (name, condition, quantity, memo) VALUES (:name,:condition,:quantity,:memo)';
					$sql = $pdo->prepare($sql);
					
					$name = filter_var($_POST["name"],FILTER_SANITIZE_STRING);
					$condition = filter_var($_POST["condition"],FILTER_SANITIZE_STRING);
					$quantity = filter_var($_POST["quantity"],FILTER_SANITIZE_NUMBER_INT);
					$memo = filter_var($_POST["memo"],FILTER_SANITIZE_STRING);

					
					$sql->bindparam(":name",$name);
					$sql->bindparam(":condition",$condition);
					$sql->bindparam(":quantity",$quantity);
					$sql->bindparam(":memo",$memo);
					
					$sql->execute();
					
					$sql_selectEquipmentEntered = "SELECT *".
												 "FROM tbl_gym ".
												 "WHERE id = (SELECT MAX(id) From tbl_gym)";
					
					$ds = $pdo->query($sql_selectLastDogEntered);
					
					echo('<table border="1">
					<th>Name</th>
					<th>Condition</th>
					<th>Quantity</th>
					<th>Memo</th>');

					echo("<tr>
					<td>$Name</td>
					<td>$Condition</td>
					<td>$Quantity</td>
					<td>$Memo</td>
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