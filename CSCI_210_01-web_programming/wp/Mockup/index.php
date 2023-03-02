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
			<div id="fmData">
				<h2>Welcome</h2>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget mi sem. Suspendisse egestas vulputate lacus, nec sodales velit 
				ullamcorper ultricies. Nunc blandit turpis a enim mattis, eu dapibus libero rutrum. Aenean eleifend velit vel nisi ornare, et congue 
				mi interdum. Quisque eu libero turpis. Nam dignissim, purus ac pharetra porttitor, ligula diam fringilla augue, sit amet gravida purus 
				ante ut velit. Sed pellentesque felis sit amet urna facilisis pretium. Donec dictum felis dolor, ut convallis quam rhoncus id. 
				Pellentesque nec sem congue, consectetur ligula quis, tempus orci. Fusce at risus sed ex laoreet gravida ac varius turpis. Sed auctor 
				in magna nec facilisis. Aenean vitae viverra elit. Praesent non quam vel ipsum tempus fringilla vitae quis libero. Etiam dui mi, ornare 
				a bibendum ultrices, pharetra nec nisl. Nulla ullamcorper lectus consectetur blandit ultricies. </p>

				<p>Fusce nunc lacus, dignissim vitae nibh at, auctor dignissim elit. In in urna eu lectus tempus mattis vel vitae tellus. Class aptent 
				taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eu quam ac turpis vulputate commodo. Sed ultricies 
				augue tortor, ac ultricies velit scelerisque sed. Curabitur ac purus sed est mattis egestas vitae at nisi. Suspendisse pharetra ac ipsum 
				eget tristique. Donec ut purus vitae diam interdum facilisis eget eu massa. Pellentesque pellentesque luctus justo in volutpat. </p>

				<p>Nam scelerisque consequat massa, ut vulputate nisi rhoncus ac. Ut at mi fermentum, feugiat urna nec, lobortis lorem. Nam ornare 
				pellentesque imperdiet. Integer sagittis leo diam, eu efficitur augue viverra quis. Vivamus vitae ultrices massa. Donec hendrerit 
				dignissim eros vel imperdiet. Phasellus sit amet metus diam. Donec dignissim arcu ut fringilla finibus. Morbi pretium eu libero 
				eu vestibulum. Donec dictum suscipit ligula, nec viverra risus dictum eu. </p>
				
				<br>
				
				<h2>About us</h2>
				<hr>
				<p>Nulla elit dolor, laoreet in lectus a, facilisis scelerisque felis. Donec porta, tortor sed finibus pulvinar, nisl quam mollis 
				lorem, et pulvinar tortor tortor ac dolor. Praesent condimentum placerat ligula, ac ornare dui aliquam sed. Integer feugiat, nisl 
				in elementum scelerisque, libero mauris fermentum nunc, in cursus odio elit quis dui. Cras sed pretium ipsum, vel commodo tellus. 
				In cursus sapien enim, id aliquet dui condimentum vitae. Sed sagittis vestibulum erat eu fringilla. Morbi consectetur, quam quis 
				dapibus blandit, diam nibh scelerisque leo, non bibendum purus erat sed massa. Etiam augue odio, mattis venenatis purus pulvinar, 
				varius posuere urna. Quisque non mauris et dolor pulvinar facilisis eget sit amet est. </p>

				<p>Donec porttitor quis erat eu laoreet. Duis eget eleifend nisl. Donec congue interdum mauris in condimentum. Vivamus lacus metus, 
				maximus sit amet lectus quis, egestas tristique massa. Quisque sit amet sodales magna. Donec mollis placerat massa. Maecenas sit amet 
				maximus tellus. Duis iaculis urna quis fermentum egestas. In hac habitasse platea dictumst. Donec eu varius mi. Aenean dignissim sed 
				purus in tincidunt. Nullam scelerisque neque vitae velit faucibus dapibus. Aenean dictum iaculis nibh eget auctor. </p>
				
				<p>Sed feugiat massa sed diam rhoncus condimentum eget id purus. Nam dictum elit a velit pulvinar vehicula. Ut elementum dolor quis risus 
				euismod tincidunt. Praesent aliquam sagittis sem sit amet porta. Phasellus erat libero, finibus in pulvinar vitae, vulputate vitae nulla. 
				Donec vel porttitor metus, vel posuere lorem. Morbi ultrices consequat risus et fermentum. Pellentesque et nulla non lacus tempor condimentum 
				a eu metus. Duis gravida lobortis dictum. Vivamus vitae lorem iaculis, condimentum diam eget, vehicula tellus. Sed porttitor neque odio, 
				id laoreet elit consectetur in. In hac habitasse platea dictumst. Donec ex enim, vestibulum ac aliquam et, rutrum ac felis. Phasellus molestie 
				euismod dapibus. Integer porta consectetur magna, vel pretium purus dictum ac.</p>
			</div>
		</main>
		
		<footer>	
			<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Jonathan Sappington | All Rights Reserved</p>
		</footer>
	</body>
</html>