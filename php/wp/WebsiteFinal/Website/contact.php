<!DOCTYPE HTML>
<html>
	<head>
		<title>Contact Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
		?>
	</head>
	<body>
	<div id="wrapper">
		<main>
		<?php 
			include 'menu.php';
			echo($output);
		?>
			<div id="fmData">
				<div class="contactContainer">
				  <div style="text-align:center">
					<h2>Contact Us</h2>
					<p>Have any questions? Well, your in the right place! Down below is my contact information for any businesses inquires. Alternatively, you can fill out the form provided with any questions:</p>
				  </div>
				  <div class="row">
					<div class="column">
					  <img src="images/map.jpg" style="width:100%">
					</div>
					<div class="column">
					  <form action="/action_page.php">
						<label for="fname">First Name</label>
						<input type="text" id="fname" name="firstname" placeholder="Your name..">
						<label for="lname">Last Name</label>
						<input type="text" id="lname" name="lastname" placeholder="Your last name..">
						<label for="country">Country</label>
						<select id="country" name="country">
						  <option value="australia">Australia</option>
						  <option value="canada">Canada</option>
						  <option value="usa">USA</option>
						</select>
						<label for="subject">Subject</label>
						<textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
						<input type="submit" value="Submit" id="submit">
					  </form>
					</div>
				  </div>
				</div>
			</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>