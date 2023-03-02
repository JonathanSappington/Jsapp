<?php
	$myVar = 42;
	$arrayName = Array("Jeff",10,$myVar);
	
	echo($arrayName[0]."<br>");
	echo($arrayName[1]."<br>");
	echo($arrayName[2]."<br>");
	
	if(is_array($arrayName))
	{
		echo('True: $arrayName');
	}
	else{
		echo('False: $arrayName');
	}
	echo("<br><br>");
	if(is_array($myVar))
	{
		echo('True: $myVar');
	}
	else{
		echo('False: $myVar');
	}
	
	$carArray = Array(
		"Ford"=>Array("Make"=>"F150","Year"=>"1995"),
		"Toyota"=>Array("Make"=>"Corrola","Year"=>"1998"),
		"VW"=>Array("Make"=>"Bug","Year"=>"1985"),
		"Chevy"=>Array("Make"=>"Silverado","Year"=>"2001"),
		"Nissian"=>Array("Make"=>"Juke","Year"=>"2011")
		);
	
	echo("<br><br>");
	echo("Ford: ".$carArray["Ford"]["Make"]." ".$carArray["Ford"]["Year"]);
	echo("<br><br>");
	echo("Toyota: ".$carArray["Toyota"]["Make"]);
	echo("<br><br>");
	echo("VW: ".$carArray["VW"]["Make"]);
	echo("<br><br>");
	echo("Chevy: ".$carArray["Chevy"]["Make"]);
	echo("<br><br>");
	echo("Nissian: ".$carArray["Nissian"]["Make"]);
	
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Make</th><th>Model</th><th>Year</th></tr>');
	
	foreach($carArray as $key => $value) {
		echo('<tr><td>'.$key.'</td><td>'.$value["Make"].'</td><td>'.$value["Year"].'</td></tr>');
	}
	echo('</table>');
	
	$flowers = Array("Daisy","Rose","Tulip","Orchid","Sunflower","Mums");
	
	sort($flowers);
	for($i = 0; $i < 5; $i++)
	{
		echo("<br>".$flowers[$i]);
	}
	
	asort($carArray);
	
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Make</th><th>Model</th><th>Year</th></tr>');
	
	foreach($carArray as $key => $value) {
		echo('<tr><td>'.$key.'</td><td>'.$value["Make"].'</td><td>'.$value["Year"].'</td></tr>');
	}
	echo('</table>');
	
	ksort($carArray);
	
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Make</th><th>Model</th><th>Year</th></tr>');
	
	foreach($carArray as $key => $value) {
		echo('<tr><td>'.$key.'</td><td>'.$value["Make"].'</td><td>'.$value["Year"].'</td></tr>');
	}
	echo('</table>');
	
	$shop = Array(
		Array("Name"=>"Daisy","Cost"=>'$1.50',"Quantity"=>"15"),
		Array("Name"=>"Rose","Cost"=>'$20.99',"Quantity"=>"11"),
		Array("Name"=>"Tulip","Cost"=>'$25.99',"Quantity"=>"2"),
		Array("Name"=>"Orchid","Cost"=>'$30.87',"Quantity"=>"5"),
		Array("Name"=>"Sunflower","Cost"=>'$45.99',"Quantity"=>"8")
	);
	
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>ID</th><th>Flower</th><th>Cost</th><th>Quantity</th></tr>');
	
	foreach($shop as $key => $value) {
		echo('<tr><td>'.$key.'</td><td>'.
						$value["Name"].'</td><td>'.
						$value["Cost"].'</td><td>'.
						$value["Quantity"].'</td></tr>');
	}
	echo('</table>');
	
	$shop2 = Array(
		Array("Daisy",'$1.50',"15"),
		Array("Rose",'$20.99',"11"),
		Array("Tulip",'$25.99',"2"),
		Array("Orchid",'$30.87',"5"),
		Array("Sunflower",'$45.99',"8")
	);
	
	echo($shop2[1][0]." | Cost: ".$shop2[1][1]." | Quantity: ".$shop2[1][2]);
	echo("<br>");
	echo($shop2[2][0]." | Cost: ".$shop2[2][1]." | Quantity: ".$shop2[2][2]);
	
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Flower</th><th>Cost</th><th>Quantity</th></tr>');
	for($row = 0; $row < 4; $row++)
	{
		echo('<tr>');
		for($col = 0; $col < 3; $col++)
		{
			echo('<td>'.$shop2[$row][$col]);
		}
		echo('</tr>');
	}
	echo('</table>');
	
	echo('<table border="2" cellpadding="5">');
	echo('<tr><th>Flower</th><th>Cost</th><th>Quantity</th></tr>');
	for($row = 0; $row < count($shop); $row++)
	{
		echo('<tr><td>'.
						$shop[$row]["Name"].'</td><td>'.
						$shop[$row]["Cost"].'</td><td>'.
						$shop[$row]["Quantity"].'</td></tr>');
	}
	echo('</table>');
?>