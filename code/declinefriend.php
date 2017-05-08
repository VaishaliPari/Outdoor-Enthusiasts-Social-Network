<?php

session_start();
include('topnav.php');
include('base.php');

?>


<?php
$myfriend=$_GET['accept'];

$me= $_SESSION["login_user"]; 

$query = mysql_query("delete from friendrq WHERE uid = '" . $_SESSION["login_user"] . "' AND fid = '" . $_GET['accept'] . "' OR uid = '" . $_GET['accept'] . "' AND fid = '" . $_SESSION["login_user"] . "' ");


?>