<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign-Up</title>
	</head>
	<body>
		<h1>Sign-Up</h1>
		<nav id="Nav">
			<a href="index.html">Home</a>
			<a href="form1.html">Applications</a>
			<a href="form2.php">Sign-Up</a>
		</nav>
		
		<?php
			if((!isset($_POST['fName']) || empty($_POST['fName'])) ||
				(!isset($_POST['lName']) || empty($_POST['lName'])) ||
				(!isset($_POST['Address']) || empty($_POST['Address'])) ||
				(!isset($_POST['City']) || empty($_POST['City'])) ||	
				(!isset($_POST['Zip']) || empty($_POST['Zip']))){
				echo('
				<p>Sign-Up for the Information Collection Database!</p>
				<div id="Form">
					<form action="form2.php" method="POST">
						<table border="1">
							<tr>
								<td>Title</td>
								<td>
									<select name="Title" id="Title">
									  <option value="Mr.">Mr.</option>
									  <option value="Mrs.">Mrs.</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>First Name</td>
								<td><input type="text" name="fName" value="Jake"></td>
							</tr>
							
							<tr>
								<td>Last Name</td>
								<td><input type="text" name="lName" value="Maguire"></td>
							</tr>
							
							<tr>
								<td>Address</td>
								<td><input type="text" name="Address" value="459 Hudson Drive"></td>
							</tr>
							
							<tr>
								<td>City</td>
								<td><input type="text" name="City" value="Seattle"></td>
							</tr>
							
							<tr>
								<td>State</td>
								<td>
									<select name="State" id="State">
									  <option value="MT">Montana</option>
									  <option value="AR">Arizona</option>
									  <option value="TX">Texas</option>
									  <option value="WA">Washington</option>
									  <option value="CO">Colorado</option>
									  <option value="MA">Maine</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>Zip</td>
								<td>
									<input type="text" name="Zip" value="45682">
								</td>
							</tr>
							
							<tr>
								<td>Gender</td>
								<td>
									<div id="radioBtns">
										<label for="M"><input type="radio" checked="true" id="M" name="Gender" value="Male">Male</label>
										<label for="F"><input type="radio" id="F" name="Gender" value="Female">Female</label>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>Billing Address</td>
								<td><label for="recieve"><input type="checkbox" id="recieve" name="recieve" value="True"></label></td>
							</tr>
							
							<tr>
								<td><input type="submit" value="Submit"></td>
							</tr>
						</table>
					</form>
				</div>');
			}
			else{
				echo("Welcome! ".$_POST['Title'].$_POST['fName']." ".$_POST['lName']."<br>");
				echo("Address: ".$_POST['Address'].", ".$_POST['City'].", ".$_POST['State'].", ".$_POST['Zip']."<br>");
				echo("Gender: ".$_POST['Gender']."<br>");
				if(!empty($_POST['recieve']))
					echo("Billing Address: ".$_POST['recieve']);
				else
					echo("Billing Address: False");
			}
		?>
	</body>
</html>