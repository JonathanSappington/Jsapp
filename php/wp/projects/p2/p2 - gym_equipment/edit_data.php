<!DOCTYPE HTML>
<html>
	<head>
		<title>Workout Equipment Database | Edit Information</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
			if(!EMPTY($_POST["item_name"]))
			{
				$sql_update = "UPDATE tbl_gym ".
				"SET item_name = :item_name, ".
				"item_condition = :item_condition, ".
				"item_quantity = :item_quantity, ".
				"item_memo = :item_memo ".
				"WHERE item_id = :item_id";
				
				$sql_update = $pdo->prepare($sql_update);
						
				$item_name = filter_var($_POST["item_name"],FILTER_SANITIZE_STRING);
				$item_condition = filter_var($_POST["item_condition"],FILTER_SANITIZE_STRING);
				$item_quantity = filter_var($_POST["item_quantity"],FILTER_SANITIZE_NUMBER_INT);
				$item_memo = filter_var($_POST["item_memo"],FILTER_SANITIZE_STRING);
				$item_id = filter_var($_POST["item_id"],FILTER_SANITIZE_STRING);

				
				$sql_update->bindparam(":item_name",$item_name);
				$sql_update->bindparam(":item_condition",$item_condition);
				$sql_update->bindparam(":item_quantity",$item_quantity);
				$sql_update->bindparam(":item_memo",$item_memo);
				$sql_update->bindparam(":item_id",$item_id);
				
				$sql_update->execute();
				header("location: inventory.php");
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
		<div id="wrapper">
		<main>
		<h1>Gym Equipment Entry</h1>

		<br>
		<div id="fmData">
		
		<?php
			include 'menu.php';
			echo($output);
			$sql_edit = "SELECT * FROM tbl_gym WHERE item_id = ".$_SESSION['item_id'];
			$dataset_edit = $pdo->query($sql_edit);
			$row = $dataset_edit->fetch();
		?>
		
				<form method="POST" action="edit_data.php">
					<table>
						<th colspan="2">
							Equipment Information
						</th>
						<tr>
							<td>Name</td>
							<td><input type="text" width="20" name="item_name" value="<?php echo($row["item_name"]); ?>" required></td>
						</tr>
						<tr>
							<td>Condition</td>
							<td>
								<select name="item_condition" id="item_condition">
									<?php
									if($row["item_condition"] == "Good")
										echo('<option value="Good" selected>Good</option>');
									else
										echo('<option value="Good">Good</option>');
									
									if($row["item_condition"] == "Fair")
										echo('<option value="Fair" selected>Fair</option>');
									else
										echo('<option value="Fair">Fair</option>');
									
									if($row["item_condition"] == "Replace")
										echo('<option value="Replace" selected>Replace</option>');
									else
										echo('<option value="Replace">Replace</option>');
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Quantity</td>
							<td><input type="text" width="20" name="item_quantity" value="<?php echo($row["item_quantity"]); ?>" required></td>
						</tr>
						<tr>
							<td>Memo</td>
							<td><textarea width="20" name="item_memo" id="item_memo" placeholder="Needs repairs..." rows="5" cols="120" required><?php echo($row["item_memo"]); ?></textarea></td>
						</tr>
							<tr>
								<td>Record Id: <?php echo($row['item_id']); ?></td>
								<td><input type="hidden" name="item_id" value="<?php echo($row['item_id']); ?>"></td>
							</tr>
							<td colspan="2"><input type="submit" value="Enter" id="submit"></td>
						</tr>
					</table>
				</form>
				</main>
		</div>
	</body>
</html>