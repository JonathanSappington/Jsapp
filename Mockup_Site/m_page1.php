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
			
			<h2>Bring Out Your Axe and Hammer, The Zombies Are Here!</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor, est non tincidunt sagittis, felis ex suscipit magna, 
				a laoreet lectus nunc non tortor. Phasellus dictum scelerisque finibus. Aliquam pharetra nisi eu ex malesuada euismod. 
				In at augue nisl. Maecenas tempus pretium ligula, non dignissim eros faucibus euismod. Fusce est turpis, sagittis at nulla eu, 
				sodales lobortis ante. Donec congue lorem mi, ac feugiat sem facilisis at. Integer ultrices consectetur risus at interdum. 
				Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris auctor urna eu urna volutpat, 
				non sollicitudin odio pellentesque. Praesent non nunc a quam pretium ullamcorper et a nunc. Mauris quis tellus placerat neque bibendum lacinia.</p>

				<p>Duis consectetur orci sit amet nisl mollis pharetra. Nam vel nisi hendrerit, consectetur nulla quis, volutpat velit. Mauris ac turpis leo. 
				Etiam gravida rhoncus sem, a ornare orci vestibulum a. Vestibulum in ligula sed leo fermentum semper. Nulla blandit sed tellus non bibendum. 
				Suspendisse ultrices nulla sit amet venenatis maximus. Ut et aliquam nibh. Aliquam eu varius augue. Pellentesque lorem ipsum, vestibulum at ante a, 
				mattis varius purus.</p>

				<p>Donec ultricies lorem vel nunc bibendum, ac pretium mauris facilisis. Praesent a lorem vitae turpis sollicitudin iaculis. Mauris congue 
				faucibus mauris, eu maximus felis consectetur id. Phasellus faucibus enim in vehicula pretium. Mauris ornare, nisl vel blandit blandit, elit 
				nunc efficitur lectus, nec luctus odio ipsum ut est. Nulla placerat ac metus eleifend euismod. Proin orci dui, facilisis nec risus tincidunt, 
				consectetur porttitor massa. Praesent laoreet rutrum elit, eget ultrices tellus posuere et. Nulla est tortor, porttitor et tincidunt sed, 
				sollicitudin id orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum interdum ultricies 
				risus, vel maximus enim commodo et.</p>

				<p>Fusce commodo eu lacus ut suscipit. Proin dignissim cursus urna, ut bibendum libero consequat vel. Suspendisse potenti. Duis interdum 
				vitae urna et maximus. Fusce sit amet mauris nec metus maximus molestie vel ut felis. Quisque eget sapien sodales, lacinia quam id, faucibus 
				eros. Phasellus eget sem vel risus porta pharetra. Duis auctor ex nec mollis maximus. Vestibulum ante ipsum primis in faucibus orci luctus et 
				ultrices posuere cubilia curae; Vestibulum fermentum tortor sem, ut posuere ipsum hendrerit a. Nunc suscipit mollis ligula, id elementum dui 
				mollis id. Vestibulum in neque eu est posuere fringilla sit amet consequat ex. Quisque in justo odio. Orci varius natoque penatibus et magnis 
				dis parturient montes, nascetur ridiculus mus. Maecenas porttitor mi id urna ullamcorper, eget consequat nisl facilisis. Duis ullamcorper dictum 
				risus quis aliquet.</p>

				<p>Sed feugiat massa sed diam rhoncus condimentum eget id purus. Nam dictum elit a velit pulvinar vehicula. Ut elementum dolor quis risus 
				euismod tincidunt. Praesent aliquam sagittis sem sit amet porta. Phasellus erat libero, finibus in pulvinar vitae, vulputate vitae nulla. 
				Donec vel porttitor metus, vel posuere lorem. Morbi ultrices consequat risus et fermentum. Pellentesque et nulla non lacus tempor condimentum 
				a eu metus. Duis gravida lobortis dictum. Vivamus vitae lorem iaculis, condimentum diam eget, vehicula tellus. Sed porttitor neque odio, 
				id laoreet elit consectetur in. In hac habitasse platea dictumst. Donec ex enim, vestibulum ac aliquam et, rutrum ac felis. Phasellus molestie 
				euismod dapibus. Integer porta consectetur magna, vel pretium purus dictum ac.</p>
				
				<p>Sed feugiat massa sed diam rhoncus condimentum eget id purus. Nam dictum elit a velit pulvinar vehicula. Ut elementum dolor quis risus 
				euismod tincidunt. Praesent aliquam sagittis sem sit amet porta. Phasellus erat libero, finibus in pulvinar vitae, vulputate vitae nulla. 
				Donec vel porttitor metus, vel posuere lorem. Morbi ultrices consequat risus et fermentum. Pellentesque et nulla non lacus tempor condimentum 
				a eu metus. Duis gravida lobortis dictum. Vivamus vitae lorem iaculis, condimentum diam eget, vehicula tellus. Sed porttitor neque odio, 
				id laoreet elit consectetur in. In hac habitasse platea dictumst. Donec ex enim, vestibulum ac aliquam et, rutrum ac felis. Phasellus molestie 
				euismod dapibus. Integer porta consectetur magna, vel pretium purus dictum ac.</p>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/temple.jpg">
				  <img src="images/temple.jpg" alt="Temple" width="600" height="400">
				</a>
				<div class="desc">Secret Temple of Sea Monkies!</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/img_forest.jpg">
				  <img src="images/img_forest.jpg" alt="Forest" width="600" height="400">
				</a>
				<div class="desc">Forest Found in the Land of Eternal Flame!</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/meerkat.jpg">
				  <img src="images/meerkat.jpg" alt="Meerkat" width="600" height="400">
				</a>
				<div class="desc">Is it a Donkey or Minotaur?</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/towel.jpg">
				  <img src="images/towel.jpg" alt="Towel" width="600" height="400">
				</a>
				<div class="desc">Bathtowel Implicated in 7-Eleven Robbery!</div>
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