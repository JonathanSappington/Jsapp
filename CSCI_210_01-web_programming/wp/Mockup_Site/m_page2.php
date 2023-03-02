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
			
			<h2>The Secret to Eternal Youth</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis quam nunc. Vestibulum ante ipsum primis in faucibus orci luctus 
			et ultrices posuere cubilia curae; Vivamus tellus quam, sagittis non justo sed, tempus rhoncus nibh. Proin consectetur justo sed nisl 
			tristique dictum. Curabitur eget ultricies diam, in imperdiet nibh. Phasellus porttitor dui non urna varius volutpat et in sem. Curabitur 
			consectetur egestas elit, non euismod orci bibendum id. Phasellus ac diam finibus, viverra erat eget, faucibus ex. Duis vel rutrum felis. 
			Integer et purus lorem. Fusce at auctor lacus, et semper turpis. In viverra in lacus sit amet facilisis. Nam feugiat mi eget ligula 
			imperdiet maximus. Etiam eget pellentesque tellus. Aliquam vulputate euismod tortor ac ullamcorper. </p>

			<p>Nullam aliquam erat et ex semper luctus. Nulla tincidunt metus ut libero iaculis tristique. Aliquam leo orci, venenatis et velit nec, 
			tincidunt dignissim urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum est purus, 
			vehicula nec est non, cursus hendrerit nisi. Donec luctus, libero in maximus eleifend, leo mi viverra odio, at condimentum felis risus a 
			ligula. Ut lobortis lorem vitae enim scelerisque fermentum. Vestibulum non condimentum ligula. Cras convallis eros nec tempor aliquet. 
			Curabitur finibus eu leo ut pulvinar. Curabitur mauris sapien, bibendum eget leo ac, pulvinar egestas arcu. Duis euismod libero sit amet 
			enim ultricies iaculis. Vivamus eu ultrices odio, vitae cursus velit. Integer feugiat laoreet ligula, ac luctus mauris consectetur eu. </p>

			<p>Sed ac venenatis enim. Maecenas vestibulum felis quis turpis vehicula, eget lacinia lacus placerat. Nulla pellentesque condimentum metus, 
			vel viverra nunc tincidunt quis. Quisque imperdiet mattis turpis, in rutrum libero finibus nec. Class aptent taciti sociosqu ad litora 
			torquent per conubia nostra, per inceptos himenaeos. Mauris commodo id neque id faucibus. Phasellus ullamcorper, dui euismod viverra 
			faucibus, eros sem elementum magna, nec semper diam purus vel risus. </p>

			<p>Nam molestie consequat aliquet. Donec pulvinar odio sed enim imperdiet, vel elementum lorem pellentesque. Ut consequat porttitor sapien, 
			vel auctor leo vehicula vulputate. Donec ullamcorper fermentum lectus, a rhoncus magna suscipit in. Suspendisse vitae nisi non neque 
			condimentum blandit. Suspendisse augue tortor, sollicitudin non dolor sed, tristique egestas urna. Proin tincidunt, orci id interdum 
			rhoncus, sem felis hendrerit justo, vitae porta purus ex et nisl. Duis tristique cursus erat sit amet feugiat. </p>

			<p>Vivamus dui mauris, ultrices placerat sem nec, lacinia vestibulum nisl. Curabitur in lobortis purus. Pellentesque habitant morbi 
			tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus augue eros, convallis sed sodales posuere, sagittis et nisi. 
			Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eget arcu et sem condimentum ornare. 
			Sed consectetur pretium sem, laoreet cursus sapien. Praesent imperdiet purus porta ipsum varius ullamcorper et ac ex. Fusce fringilla 
			velit non urna mollis, a scelerisque purus vestibulum. Suspendisse lacinia molestie enim nec facilisis. Curabitur quis dignissim orci, 
			ac pulvinar nisl. Ut non dapibus ipsum. Curabitur sed justo porta, bibendum augue at, volutpat velit. </p>
			
			<p>Sed feugiat massa sed diam rhoncus condimentum eget id purus. Nam dictum elit a velit pulvinar vehicula. Ut elementum dolor quis risus 
			euismod tincidunt. Praesent aliquam sagittis sem sit amet porta. Phasellus erat libero, finibus in pulvinar vitae, vulputate vitae nulla. 
			Donec vel porttitor metus, vel posuere lorem. Morbi ultrices consequat risus et fermentum. Pellentesque et nulla non lacus tempor condimentum 
			a eu metus. Duis gravida lobortis dictum. Vivamus vitae lorem iaculis, condimentum diam eget, vehicula tellus. Sed porttitor neque odio, 
			id laoreet elit consectetur in. In hac habitasse platea dictumst. Donec ex enim, vestibulum ac aliquam et, rutrum ac felis. Phasellus molestie 
			euismod dapibus. Integer porta consectetur magna, vel pretium purus dictum ac.</p>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/ikea.jpg">
				  <img src="images/ikea.jpg" alt="Ikea" width="600" height="400">
				</a>
				<div class="desc">Survivors Finally Escape the Ikea Maze</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/sun.jpg">
				  <img src="images/sun.jpg" alt="Sun" width="600" height="400">
				</a>
				<div class="desc">New Study Finds that Bats Love the Sun</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/delivery.jpg">
				  <img src="images/delivery.jpg" alt="Mountains" width="600" height="400">
				</a>
				<div class="desc">Delivery Man Found to be Dracula</div>
			  </div>
			</div>
			
			<div class="responsive">
			  <div class="gallery">
				<a target="_blank" href="images/book.jpg">
				  <img src="images/book.jpg" alt="book" width="600" height="400">
				</a>
				<div class="desc">Sea Otter Releases its Final Action Novel</div>
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