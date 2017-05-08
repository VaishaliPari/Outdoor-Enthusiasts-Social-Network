<?php

session_start();
include('topnav.php');
include('base.php');
$me = $_SESSION['login_user'];
$myfriend = $_GET['accept'];


echo '<br>';

		
			$sql = mysql_query("INSERT INTO FriendRq(uid, fid) VALUES('$me', '$myfriend')") or die(mysql_error()); 
			echo 'Request sent!';



?>

