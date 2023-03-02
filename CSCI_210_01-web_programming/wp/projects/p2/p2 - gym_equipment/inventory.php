<!DOCTYPE HTML>
<html>
	<head>
		<title>Workout Equipment Database | Inventory</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
			if(isset($_POST))
			{
				if(!empty($_POST['action']))
				{
					if($_POST['action'] === 'Delete')
					{
						$item_id = filter_var($_POST['item_id'], FILTER_SANITIZE_STRING);
						$sql_delete = "DELETE FROM tbl_gym WHERE item_id = ".$item_id;
						
						$pdo->exec($sql_delete);
					}
					
					if($_POST['action'] === 'Edit')
					{
						$_SESSION['item_id'] = filter_var($_POST['item_id'], FILTER_SANITIZE_NUMBER_INT);
						header("location: edit_data.php");
					}
				}
			}
		?>
		
		<style>
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
			
			#submit{
				text-align: center;
			}
			
			#action{
				text-align: center;
				width: 99%;
				padding-top: 10px;
				padding-bottom: 10px;
				margin: 10px;
				margin-left:0;
			}
			
			#memo{
				word-wrap: anywhere;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
		<main>
		<h1>Inventory</h1>
		<br>
		<?php include 'menu.php'; ?>
		<div id="tblData">
		<?php			
			try{
				$sql = "SELECT *".
						"FROM tbl_gym";
				echo('<table>
					<th>Name</th>
					<th>Condition</th>
					<th>Quantity</th>
					<th>Memo</th>
					<th>Edit</th>');
				$ds = $pdo->query($sql);
				while(($row = $ds->fetch()) != null)
				{
					echo('<tr>');
					echo('<td>'.$row["item_name"].'</td>');
					echo('<td>'.$row["item_condition"].'</td>');
					echo('<td>'.$row["item_quantity"].'</td>');
					echo('<td id="memo">'.$row["item_memo"].'</td>');
					echo('<td>'.
					'<form method="POST" action="inventory.php"
					 onsubmit="return confirm('."'".'Are you sure?'."')".'">
					 <input type="hidden" name="item_id" value="'.$row["item_id"].'">'
					 .'<input type="submit" value="Edit" id="action" name="action">'.
					 '<input type="submit" value="Delete" id="action" name="action">'.
					 '</form>'.
					 '</td>');
					echo('</tr>');
				}
				echo("<tr>");
					echo('<td colspan="8"><a href="index.php"><button type="button">Add More</button></a></td>');
				echo("</tr>");
				echo('</table>');
			}
			catch(PDOEXCEPTION $e){
				echo("** ERROR **".$e->GetMessage());
			}
		?>
		</div>
		</main>
		</div>
	</body>
</html>