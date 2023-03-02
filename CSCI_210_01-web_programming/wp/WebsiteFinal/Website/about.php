<!DOCTYPE HTML>
<html>
	<head>
		<title>About Page</title>
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
				<h2>Meet the Team</h2>
				<div class="row">
				  <div class="column">
					<div class="card">
					  <img src="images/ceo.jpg" alt="Jane" style="width:100%">
					  <div class="container">
						<h2>Jane Doe</h2>
						<p class="title">CEO & Founder</p>
						<p>The founder and ceo of The Turtle Store for over 125 days.</p>
						<p>JaneTDoe@gmail.com</p>
						<p><button class="button">Contact</button></p>
					  </div>
					</div>
				  </div>

				  <div class="column">
					<div class="card">
					  <img src="images/art_director.jpg" alt="Mike" style="width:100%">
					  <div class="container">
						<h2>Mike Ross</h2>
						<p class="title">Art Director</p>
						<p>Professional art director and stander by of all things for over 35 minutes.</p>
						<p>MikeHRoss@gmail.com</p>
						<p><button class="button">Contact</button></p>
					  </div>
					</div>
				  </div>
				  
				  <div class="column">
					<div class="card">
					  <img src="images/designer.jpg" alt="John" style="width:100%">
					  <div class="container">
						<h2>John Doe</h2>
						<p class="title">Designer</p>
						<p>The ultimate wizard of doing things to make other things.</p>
						<p>JohnEDoe@gmail.com.com</p>
						<p><button class="button">Contact</button></p>
					  </div>
					</div>
				  </div>
				</div>
				
				<div class="row">
				  <div class="column">
					<div class="card">
					  <img src="images/map.jpg" alt="Jane" style="width:100%">
					  <div class="container">
						<h2>Jeff Harris</h2>
						<p class="title">Janitor</p>
						<p>Professional mopper of floors and cleaner of toilets.</p>
						<p>JeffSHarris.com</p>
						<p><button class="button">Contact</button></p>
					  </div>
					</div>
				  </div>

				  <div class="column">
					<div class="card">
					  <img src="images/signup.jpg" alt="Mike" style="width:100%">
					  <div class="container">
						<h2>Callum Michaels</h2>
						<p class="title">Assistant Janitor</p>
						<p>Assistant to the professional mopper of floors and cleaner of toilets.</p>
						<p>CallumUMichaels@gmail.com</p>
						<p><button class="button">Contact</button></p>
					  </div>
					</div>
				  </div>
				  
				  <div class="column">
					<div class="card">
					  <img src="images/pexels-denitsa-kireva-14594704.jpg" alt="John" style="width:100%">
					  <div class="container">
						<h2>Robert Hope</h2>
						<p class="title">Executive Janitor</p>
						<p>Executive of the mopper of floors and cleaner of toilets.</p>
						<p>RobertNHope@gmail.com</p>
						<p><button class="button">Contact</button></p>
					  </div>
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