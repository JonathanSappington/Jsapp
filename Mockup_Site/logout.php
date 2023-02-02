
<?php
	require 'db_connect.php';
?>
<?php 
	include 'menu.php';
	echo($output);
	error_reporting(0);

	unset($_SESSION['LoginStatus']);
	header("location: index.php");
?>