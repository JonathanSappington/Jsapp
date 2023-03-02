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

			<?php 
				include 'menu.php';
				echo($output);
			
				$targetTime = 0.05;
				$timePassed = 0;
				
				$cost = 10;
				
				// password test
				
				do{
					$cost++;
					$start = microtime(true);
					$options = [
						'cost' => $cost
					];
					password_hash("test",PASSWORD_BCRYPT,["cost" => $cost]);
					$end = microtime(true);
					
				}while(($end-$start) < $targetTime);
				
				$timePassed = $end - $start;
				echo('Approximate cost found: '.$cost.'&nbsp;&nbsp;&nbsp;'.$timePassed);
				
				$timeTarget = 0.05; // 50 milliseconds 
			?>
		</div>
		</main>
	</body>
</html>