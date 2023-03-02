<?php 
if(isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"] == true) 
{
	echo('
		<a href="memberpage.php">Members</a>
		<a href="logout.php">Logout</a>
	');
	echo("Hello: ".$_SESSION["firstname"]." ".$_SESSION["lastname"]);
}
else
{
	echo(
		'<a href="index.php">Home</a>
		<a href="login.php">Login</a>'
	);
}
?>
<a href="test.php">Test Page</a>
 <br><br>