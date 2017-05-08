<?php

session_start();
include('topnav.php');
include('base.php');

echo '<br>';

?>

<?php 

$sql = mysql_query("SELECT * from UserDetails WHERE
uid not in (SELECT UserDetails.uid as uid from UserDetails, Friends where UserDetails.uid = Friends.uid and friends.fid = '".$_SESSION['login_user']."' ) and UserDetails.uid != '".$_SESSION['login_user']."' ");

while ($friends = mysql_fetch_array($sql)) { 
	$uid = $friends['uid'];

$dp = mysql_query("SELECT * FROM DP WHERE uid='". $uid."' ") or die(mysql_error());
$rowdp = mysql_fetch_array($dp);
echo '<br>';
echo '<table> <tr> <td> <img style="width:50px;height:50px;" src="data:image/jpeg;base64, '.base64_encode( $rowdp['dp'] ).'"/> </td> 
<td> <b> <a href="viewfriend.php?accept='.$friends['uid'].'">'.$friends['Name'].' </b> </td> </tr> </table> ' ;


echo "<br>";
}



?> 