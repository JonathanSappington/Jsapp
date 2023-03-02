<?php
require 'dbconnect.php';

if(isset($_POST['username']))
{
    $sql = "SELECT username,password ".
          "FROM tbl_users ".
          "WHERE username = :username";

     // prepare
     $sql = $pdo->prepare($sql);

     // sanitize
     $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);

     // bind
     $sql->bindParam(":username",$username);

     // execute
     $ds = $sql->execute();

     // get dataset
     $result = $ds->fetch();

    // for your information only - REMOVE FOR PRODUCTION
    print_r($result['password']);


     if($result['password'] == null)
    {
        echo("<br>Bad username or Password</br>");
}
else
{


    // store the password
     $hashed_pw = $result['password'];

     // reverse the process
     if(password_verify($_POST['password'], $hashed_pw))
    {
        
// set a session variable
// this will allow the user to get to the member pages
$_SESSION['LoginStatus'] = true;

// Go to the member page
header("location: memberpage.php");    
}
else
{
    // bad login
    $_SESSION['LoginStatus'] = false;

    //
     echo('<br>Invalid Password</br');

}

}



}
?>

<HTML>
<HEAD>
<TITLE>Login</TITLE>
</HEAD>
<BODY>

<div id="formlogin">
    <form method="POST" action="login.php">
    <table border="1">
        <tr>
            <td colspan="2">Login</td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" size="25" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="username" size="25" required></td>
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
