<?php

session_start();
include('topnav.php');
include('base.php');
$me = $_SESSION['login_user'];
$myfriend = $_GET['accept'];


echo '<br>';

		
			$sql = mysql_query("DELETE FROM FriendRq WHERE (uid = '".$me."' and fid = '".$myfriend."') OR (uid = '".$myfriend."' and fid = '".$me."') " ) or die(mysql_error()); 
			echo 'Deleted!';



?>
