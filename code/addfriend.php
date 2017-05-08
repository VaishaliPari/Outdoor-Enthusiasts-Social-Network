<?php
session_start();
include 'base.php';
include 'topnav.php';
?>

<?php

$myfriend = $_GET['accept'];

$me = $_SESSION['login_user'];

$friends=mysql_query("INSERT INTO friends(uid, fid) VALUES('$me','$myfriend')")or die(mysql_error());

$friends=mysql_query("INSERT INTO friends(uid, fid) VALUES('$myfriend','$me')")or die(mysql_error());


$query = mysql_query("delete from friendrq WHERE uid = '" . $_SESSION["login_user"] . "' AND fid = '" .

$_GET['accept'] ."' OR uid = '" . $_GET['accept'] . "' AND fid = '" . $_SESSION["login_user"] ."' ");

?>
