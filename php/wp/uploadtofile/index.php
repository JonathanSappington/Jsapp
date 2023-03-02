<?php

SESSION_START();


print_r($_POST);
echo('<br><hr><br>');

?>



<!DOCTYPE html>
<HTHML>
<HEAD>
<TITLE>Pix</TITLE>

<style>
    #content{width:80%;
margin:auto;}
</style>

</HEAD>
<BODY>
<?php
$thedirectory = "pix/";
if(isset($_POST['submit']))
{
    if($_POST['submit'] == 'Make Directory')
    {
        mkdir($thedirectory.$_POST['makedir']);
	}
    else if($_POST['submit'] == 'Delete Directory')
    {
        rmdir($thedirectory.$_POST['delDir']);
	}
    else if($_POST['submit'] == 'Upload')
    {
        $target_file= $thedirectory.basename($_FILES['fileToUpload']['name']);

        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file))
        {
            echo('<script>console.log("Upload - Successful")</script>');
            echo('<script>alert("Upload - Successful")</script>');
		}
	
		else
		{
			echo('<script>console.log("***Upload - UNSuccessful")</script>');
			echo('<script>alert("Upload - UnSuccessful")</script>');
		}
	}
	else if($_POST['submit'] == 'Delete')
	{
		$myArray = array_values($_POST);
		print_r($myArray);
		echo('<br><hr><br>');

		for($c = 0; $c < count($myArray)- 1;$c++)
		{
			unlink($thedirectory.$myArray[$c]);
		}
	}
}


?>



<div id="content">
<h1>File Directory Management</h1>

<!--  NOTE: If you do not want the file size restraint:
    do not include the hidden type -->

<br>
<form method="POST" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value=10000000>
    <input type="file" name="fileToUpload" id="fileToUpload"> &nbsp;&nbsp;&nbsp;
    <input type="submit" value="Upload" name="submit">
</form>

<!-- New Stuff -->
<hr>

<h1>Add Delete Directories</h1>

<?php 
	chdir('./pix');
	$cd = getcwd();
	
	$thecontent = scandir($cd);
	
	foreach($thecontent as $value)
	{
		echo($value."<br>");
	}
 ?>
<hr>

<!-- New Stuff -->

<br>
<form method="POST" action="index.php" enctype="multipart/form-data">
    <input type="text" name="makedir" id="makedir"> &nbsp;&nbsp;&nbsp;
    <input type="submit" value="Make Directory" name="submit">
</form>


<br>
<form method="POST" action="index.php" enctype="multipart/form-data">
    <input type="text" name="delDir" id="delDir"> &nbsp;&nbsp;&nbsp;
    <input type="submit" value="Delete Directory" name="submit">
</form>
<br>

<?php

// make sure we are in the right directory
// change the directory
chdir($thedirectory);


//reading the files as an array
//note: glob must have a search string
$thefiles = glob('*.*');


echo('
<form action="index.php" method="POST">
    <table border="1">
    <tr><td colspan="2"><h2>Delete Files</h2></td></tr>');
    for($c = 0; $c < count($thefiles); $c++)
    {
        echo('<tr><td>');
        echo('<input type="checkbox" name="xfilename'.$c.
            '" value="'.$thefiles[$c].'"></td><td>'.$thefiles[$c]);
        echo('</td></tr>');
    }

echo('
<tr><td colspan="2"><input type="submit" value="Delete" name="submit">
</td></tr>
</table>
</form>
    ');

?>

</div>

</BODY>
</HTML>





