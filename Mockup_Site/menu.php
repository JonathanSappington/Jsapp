<h1>National News Foundation</h1>

<nav style="position: relative; top: 0px;">
	<a href="index.php">Home</a>
	<?php 
		if(isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"] == true) 
		{
			echo('
				<a href="m_page1.php">Daily News</a>
				<a href="m_page2.php">Health News</a>
				<a href="logout.php">Logout</a>
			');
			echo("<div id='Avatar'>Hello: ".$_SESSION["firstname"]." ".$_SESSION["lastname"]."</div>");
		}
		else
		{
			echo(
				'<a href="sign_up.php">Sign-up</a>
				<a href="login.php">Login</a>'
			);
		}
	?>
</nav>