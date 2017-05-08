<?php
session_start();
include('topnav.php');
include('base.php');


if (isset($_POST['sub6'])) {	
$updatequery = mysql_query("UPDATE userdetails SET Name = '" . $_POST['username'] . "', email = '" . $_POST['email'] . "', password = '" . $_POST['password'] . "', DOB = '" . $_POST['DOB'] . "', city = '" . $_POST['city'] . "' WHERE email = '".$_SESSION['login_email']."' "); 

$_SESSION['login_city'] = $_POST['city'];
echo "<br> <br> <br> <br> <center> <h2> Updated </h2> </center> ";

}

?>