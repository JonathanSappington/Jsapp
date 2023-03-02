<!DOCTYPE HTML>
<html>
	<head>
		<title>Members Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="styles.css" rel="stylesheet" media="screen">
		
		<?php
			require 'db_connect.php';
			
			if(!isset($_SESSION["LoginStatus"]) || $_SESSION["LoginStatus"] == false)
			{
				header("location: index.php");
			}
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
			
			<h2>5 Facts About Turtles</h2>

			<h3>1. There are over 350 species of turtles</h3>

			<p>There are about 356 species of turtles in the world5. There are so many different types of turtles. Popular species include hawksbill turtles, leatherback turtles, flatback turtles, loggerheads, red-eared sliders, western painted turtles, African side-necked turtles, amongst others.</p>

			<p>We can find the variety of turtle species widely distributed all over the world. We can find turtles in shallow coastal waters, bays, lagoons, estuaries, and even the open sea. Turtles live on land and in freshwater and saltwater.</p>

			<p>They exist in all continents except Antarctica. Southeastern North America and South Asia have the highest number of native species. Only five species of turtle can be found natively in Europe. You can only find the flatback is a sea turtle in Australian waters.</p>
			<h3>2. Turtles can’t leave their shell</h3>

			<p>Turtles are reptiles of the order Testudines. All turtles have their bodies enclosed in bony shells. The top shell is called the carapace, and the bottom shell is called the plastron. The bony shells develop from their rib and vertebral column. The upper and lower shells join together to form a skeletal box.</p>

			<p>A turtle can't leave its shell, ever. The turtle's shell is made of bones and cartilages that are an integral part of its body. 
			<h3>3. Sea turtles can’t retract their head</h3>

			<p>Some turtles can retract their limbs and head into their shell when facing danger. However, sea turtles cannot retract their heads or flippers into their shells. This inability may have developed because they do not have to protect themselves from predators on water.</p>

			<p>Turtle species that can retract their heads are divided into two major groups: the 'side-necked turtles' and the 'hidden neck turtles.’ This categorization is based on the way the head retracts. The hidden neck turtle retracts its head straight back into its shell while the side-necked turtle folds its neck to one side while retracting it.</p>
			<h3>4. Turtles have a varied diet</h3>

			<p>Turtles are primarily omnivores, but some species like tortoises are predominantly herbivores. Omnivorous turtles that live in water eat jellyfish, mollusks, and sea vegetation. The green turtle primarily eats jellyfish. Tortoises eat only plants or invertebrates and carrion.</p>

			<p>Turtles have keratin beaks which they use to grasp food. Hawksbills have a strong hawk-like beak which they use to cut through sea sponges, anemones, and coral. Turtles have no teeth, but loggerheads have powerful jaws that allow them to feed on fish, shellfish, mollusks, and lobsters.</p>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/pexels-maria-isabella-bernotti-2570524.jpg">
				  <img src="images/pexels-maria-isabella-bernotti-2570524.jpg" alt="Ikea" width="600" height="400">
				</a>
				<div class="desc">The Rich History of Turtle Economics</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/pexels-richard-segal-1645028.jpg">
				  <img src="images/pexels-richard-segal-1645028.jpg" alt="Sun" width="600" height="400">
				</a>
				<div class="desc">Photo Taken Moments Before Disaster</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/art_director.jpg">
				  <img src="images/art_director.jpg" alt="Mountains" width="600" height="400">
				</a>
				<div class="desc">Why is he so Menacing?</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/login.jpg">
				  <img src="images/login.jpg" alt="book" width="600" height="400">
				</a>
				<div class="desc">Large Green Sea Crab, Thinks it can Fly</div>
			  </div>
			</div>

			<div class="clearfix"></div>
			
		</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>