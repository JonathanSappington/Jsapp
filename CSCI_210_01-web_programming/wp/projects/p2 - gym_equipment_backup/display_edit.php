<!DOCTYPE HTML>
<html>
	<head>
		<title>Display/Edit</title>
		
		<?php
			require 'db_connect.php';
			print_r($_POST);
			if(isset($_POST))
			{
				if(!empty($_POST['action']))
				{
					if($_POST['action'] === 'Delete')
					{
						$dogid = filter_var($_POST['dogid'], FILTER_SANITIZE_STRING);
						$sql_delete = "DELETE FROM tbl_doginfo WHERE dogid = ".$dogid;
						
						$pdo->exec($sql_delete);
					}
					
					if($_POST['action'] === 'Edit')
					{
						$_SESSION['dogid'] = filter_var($_POST['dogid'], FILTER_SANITIZE_NUMBER_INT);
						header("location: edit_data.php");
					}
				}
			}
		?>
		
		<style>
			#tblData table{
				margin: auto;
				width: 50%;
			}
			td{
				text-align: center;
			}
			
			th{
				background: #008585;
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
		<h1>Display/Edit</h1>
		<br>
		<?php include 'menu.php'; ?>
		<?php
			$sql_st = "SELECT * ".
						"FROM tbl_State ".
						"ORDER BY st";
						
			$dataset_st = $pdo->query($sql_st);
		?>
		<div id="tblData">
		<?php			
			try{
				$sql = "SELECT *".
						"FROM tbl_doginfo";
				echo('<table border="1">
					<th>Dog Name</th>
					<th>Dog Breed</th>
					<th>Owner First Name</th>
					<th>Owner Last Name</th>
					<th>City</th>
					<th>State</th>
					<th>Edit</th>');
				$ds = $pdo->query($sql);
				while(($row = $ds->fetch()) != null)
				{
					echo('<tr>');
					echo('<td>'.$row["dogname"].'</td>');
					echo('<td>'.$row["dogbreed"].'</td>');
					echo('<td>'.$row["ownerfirstname"].'</td>');
					echo('<td>'.$row["ownerlastname"].'</td>');
					echo('<td>'.$row["city"].'</td>');
					echo('<td>'.$row["st"].'</td>');
					echo('<td>'.
					'<form method="POST" action="display_edit.php"
					 onsubmit="return confirm('."'".'Are your sure about that!?'."')".'">
					 <input type="hidden" name="dogid" value="'.$row["dogid"].'">'
					 .'<input type="submit" value="Edit" name="action">'.
					 '<input type="submit" value="Delete" name="action">'.
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
	</body>
</html>