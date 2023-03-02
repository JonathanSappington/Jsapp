<a href="index.html">Home</a>
<a href="page1.php">Page 1</a>
<a href="page3.php">Page 3</a><br><br>

<?php
	echo("<h1>Functions</h1><br>");
	$x = 60;
	$y = 40;
	
	function func1()
	{
		echo("<h2>Function 1</h2><br>");
	}
	
	function func2($num1,$num2)
	{
		$total = $num1 + $num2;
		return $total;
	}
	
	function func3($x = 19,$y = 84)
	{
		$total = $x * $y;
		return $total;
	}
	
	function func4()
	{
		static $z = 42;
		
		$z /= 2;
		return $z;
	}
	
	func1();
	echo("$x + $y = ".func2($x,$y)."<br><br>");
	echo("19 * 84 = ".func3()."<br><br>");
	echo("$x * $y = ".func3($x,$y)."<br><br>");
	echo("z = ".func4()."<br>");
	echo("z = ".func4()."<br>");
?>