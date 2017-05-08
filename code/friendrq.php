<?php

session_start();
include('topnav.php');
include('base.php');

?>


<?php

echo "<br> <br> ";

echo ' <h2> Your Friend Requests </h2> ';
echo "<br> ";

$sql = mysql_query("SELECT * FROM UserDetails, FriendRq WHERE FriendRq.fid = '".$_SESSION['login_user']."' AND FriendRq.uid = UserDetails.uid ");
$dp = mysql_query("SELECT * FROM DP where uid = ") ; 
$row = mysql_fetch_array($sql);
if($row) {


echo '<b> ' ;
echo '
<a href="viewfriend.php?accept='.$row['uid'].'">'.$row['Name'].' ';
echo '</b>';

echo ' <a href="addfriend.php?accept='.$row['uid'].'"> Accept</a> ';

echo ' <a href = "declinefriend.php?accept='.$row['uid'].'"> Reject </a>'; 
}




else {


	echo ' <b> You have no friend requests </b> ';
}


?>