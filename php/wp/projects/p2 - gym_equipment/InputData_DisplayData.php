<!DOCTYPE HTML>
<html>
	<head>
		<title>Workout Equipment Database | Information Accepted</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
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
				color: white;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
		<main>
		<h1>Information Accepted</h1>
		<br>
		<?php include 'menu.php' ?>
		<div id="tblData">
		<?php
			if (isset($_POST["item_name"])){
				try{
					$sql = 'INSERT INTO tbl_gym (item_name, item_condition, item_quantity, item_memo) VALUES (:item_name,:item_condition,:item_quantity,:item_memo)';
					$sql = $pdo->prepare($sql);
					
					$item_name = filter_var($_POST["item_name"],FILTER_SANITIZE_STRING);
					$item_condition = filter_var($_POST["item_condition"],FILTER_SANITIZE_STRING);
					$item_quantity = filter_var($_POST["item_quantity"],FILTER_SANITIZE_NUMBER_INT);
					$item_memo = filter_var($_POST["item_memo"],FILTER_SANITIZE_STRING);

					
					$sql->bindparam(":item_name",$item_name);
					$sql->bindparam(":item_condition",$item_condition);
					$sql->bindparam(":item_quantity",$item_quantity);
					$sql->bindparam(":item_memo",$item_memo);
					
					$sql->execute();
					
					$sql_selectEquipmentEntered = "SELECT *".
												 "FROM tbl_gym ".
												 "WHERE item_id = (SELECT MAX(item_id) From tbl_gym)";
					
					$ds = $pdo->query($sql_selectEquipmentEntered);
					
					echo('<table border="1">
					<th>Name</th>
					<th>Condition</th>
					<th>Quantity</th>
					<th>Memo</th>');

					echo("<tr>
					<td>$item_name</td>
					<td>$item_condition</td>
					<td>$item_quantity</td>
					<td ".'width="450px"'.">$item_memo</td>
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
		</main>
		</div>
	</body>
</html>