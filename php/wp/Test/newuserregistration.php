<?php
require('dbconnect.php');
print_r($_POST);
echo('<br><hr><br>');

if(isset($_POST['username']))
{

try
{
    $pwd = $_POST['password'];
    
    $sql =     "INSERT INTO tbl_users("
            ."firstname,"
            ."lastname,"
            ."username,"
            ."password) "
            ."VALUES("
            .":firstname,"
            .":lastname,"
            .":username,"
            .":password) ";

    // prepare
    $sql = $pdo->prepare($sql);

    //Sanitize
    $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
$lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);

    //HASH THE PASSWORD
    $password = password_hash($pwd,PASSWORD_DEFAULT);

    // bind variables to the params
    $sql->bindparam(":firstname",$firstname);
    $sql->bindparam(":lastname",$lastname);
    $sql->bindparam(":username",$username);
    $sql->bindparam(":password",$password);

    // execute
    $sql->execute();
    echo('<p>User was successfully entered</p>');

}
catch(PDOException $ee)
{
    echo($ee->getMessage());
    echo("<br><br>");
    echo($ee->getCode());

     if($ee->getCode() == 23000)
    {
        //echo("<br><b>Please enter a different username</b>");
         $_SESSION['logerr_message'] = "Please enter a different username";
          header('location:newuserregistration.php');
    }

}    


}
else
{
echo('
<!DOCTYPE html>
<HTHML>
<HEAD>
<TITLE>Home Page</TITLE>
</HEAD>
<BODY>
<!-- newuserregistration.php -->
');


    if(isset($_SESSION['logerr_message']))
    {
        echo('<b>Warning!!!  </b>'.$_SESSION['logerr_message'].'<br><br>');
        unset($_SESSION['logerr_message']);
}


echo('
    <div id="form1">
    <h1>New User Registration</h1>
    <form method="POST" action="newuserregistration.php">

    <table border="1" id="tablenewuser">
    <tr>
        <td>First Name</td>
        <td><input type="text" name="firstname"  size="25" value="Joe"></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><input type="text" name="lastname"  size="25" value="Doe"></td>
    </tr>
    <tr>
        <td>User Name</td>
        <td><input type="text" name="username"  size="25" value="JDoe" required></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password"  size="25" value="hotdog" required></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Enter"></td>
    </tr>
    </table>
    </form>
    </div>
    
    <br><br>
    <a href="index.php">Home</a>
</BODY>
</HTML>
');
}

?>