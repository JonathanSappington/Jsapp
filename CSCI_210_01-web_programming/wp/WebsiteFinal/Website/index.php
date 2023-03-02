<!DOCTYPE HTML>
<html>
	<head>
		<title>Home Page</title>
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
			<div class="hero-image">
			  <h1>Welcome</h1>
			  <p>A place to find a friend</p>
			</div> 
			<div id="fmData">
				<h2>Testimonials</h2>
				<div class="testContainer">
				  <img src="images/ceo.jpg" alt="Avatar" style="width:90px; height:90px;">
				  <p><span>Chris Human.</span> CEO at Non-descript Company.</p>
				  <p>The Turtle Store saved my life; without it, I would still be the turtle-less person before your eyes.</p>
				</div>

				<div class="testContainer">
				  <img src="images/art_director.jpg" alt="Avatar" style="width:90px; height:90px;">
				  <p><span>Rebecca Person.</span> Designer at Non-descript Company.</p>
				  <p>My productivity has risen by 0.1% since I got my turtle. I would highly recommend the Turtle Store. 10/10.</p>
				</div>
				
				<div class="testContainer">
				  <img src="images/designer.jpg" alt="Avatar" style="width:90px; height:90px;">
				  <p><span>Josh Living.</span> Janitor at Non-descript Company.</p>
				  <p>Since my favorite mop broke, I haven't been able to clean the floors, that is, until I bought a turtle from the Turtle Store.</p>
				</div>
				
				<div class="priceColumns">
				  <ul class="price">
					<li class="header">Basic</li>
					<li class="grey">$ 9.99 / year</li>
					<li>10 Box Turtles</li>
					<li>2 Snapping Turtles</li>
					<li>5 Leatherback Turtles</li>
					<li>1 Sea Turtle</li>
					<li class="grey"><a href="sign_up.php" class="pButton">Sign Up</a></li>
				  </ul>
				</div>

				<div class="priceColumns">
				  <ul class="price">
					<li class="header" style="background-color:#04AA6D">Pro</li>
					<li class="grey">$ 24.99 / year</li>
					<li>15 Box Turtles</li>
					<li>3 Terrapins</li>
					<li>7 Pig-nosed Turtles</li>
					<li>2 Sea Turtle</li>
					<li class="grey"><a href="sign_up.php" class="pButton">Sign Up</a></li>
				  </ul>
				</div>

				<div class="priceColumns">
				  <ul class="price">
					<li class="header">Premium</li>
					<li class="grey">$ 49.99 / year</li>
					<li>20 Box Turtles</li>
					<li>5 Musk Turtles</li>
					<li>7 Chicken Turtles</li>
					<li>3 Sea Turtle</li>
					<li class="grey"><a href="sign_up.php" class="pButton">Sign Up</a></li>
				  </ul>
				</div>
				<div class="clearfix"></div>
				<div style="border:1px solid #ddd">
					<div class="w3-light-grey w3-center" style="padding:32px 64px"><h3>About us</h3></div>
					<p class="newspaper">
					<span class="w3-large">The Turtle Store</span><br> Learn amazing facts about turtles, terrapins, and tortoises. You can also buy our lovely
					waddling friends from the swamps deep. Join us and receive daily newsletters regarding the most fascinating turtle trivia.
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					Subscribe through our extensive and expensive tier system; basic gets you several turtles from box to sea varients and everything in between. Pro gets 
					you even more turtles from the ocean's depths and swamps, like terrapins and pig-nosed turtles. Finally, the pro tier will net you the most of the three subscriptions with even more boxed and chicken turtles.
					</p>
					<a href="about.php" class="aButton">Learn More</a>
				</div>
			</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>