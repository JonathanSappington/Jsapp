<a href="index.html">Home</a>
<a href="page2.php">Page 2</a>
<a href="page3.php">Page 3</a><br><br>

<?php
	$var1 = "This is fun";
	
	//print to the webpage / browser
	echo($var1."<br><hr>"."Hello World<br><hr><br>");
	$var2 = print($var1."<br><hr>"."Hello World");
	$var2 = 0;
	
	if($var2 == 1){
		echo("<br> The statement printed");
	}
	else
	{
		echo("<br> Statement Failed");
	}
	
	$var3 = "<br><br>Multiple of ";
	for($i = 0; $i < 10; $i++)
	{
		$var4 = $var3.$i." | ".($i * 2)." - ".($i * 4)." - ".($i * 6)." - ".($i * 8)." - ".($i * 10);
		echo($var4);
	}
?>