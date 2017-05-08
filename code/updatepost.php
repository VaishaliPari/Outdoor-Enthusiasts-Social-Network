<?php
session_start();
include('topnav.php');
include('base.php');
$post = $_GET['accept'];

if (isset($_POST['sub6'])) {	
$updatequery = mysql_query("UPDATE Post SET Title = '" . $_POST['ptitle'] . "', Txt = '" . $_POST['txt'] . "', Activity = '" . $_POST['activity'] . "', Lname = '" . $_POST['lname'] . "', Vis = '" . $_POST['vis'] . "' WHERE pid = '".$post."' "); 


echo "<br> <br> <br> <br> <center> <h2> Updated </h2> </center> ";

}

?>