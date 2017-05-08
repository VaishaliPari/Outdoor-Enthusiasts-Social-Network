<?php

session_start();
include('topnav.php');
include('base.php');

echo '<br>';

?>

<a href="friendrq.php"> View Your Friend Requests </a>
<br> 

<br>

<a href="findfriends.php"> Find Friends </a>
<?php

echo "<br> <br> ";

echo ' <h2> Your Friends </h2> ';
echo "<br> ";

$sql = mysql_query("SELECT UserDetails.Name, UserDetails.uid as uid FROM UserDetails, Friends WHERE Friends.uid = '".$_SESSION['login_user']."' AND Friends.fid = UserDetails.uid ORDER BY UserDetails.Name");


while ($friends = mysql_fetch_array($sql)) { 
	$uid = $friends['uid'];

$dp = mysql_query("SELECT * FROM DP WHERE uid='". $uid."' ") or die(mysql_error());
$rowdp = mysql_fetch_array($dp);
echo '<table> <tr> <td> <img style="width:50px;height:50px;" src="data:image/jpeg;base64, '.base64_encode( $rowdp['dp'] ).'"/> </td> 
<td> <b> <a href="viewfriend.php?accept='.$friends['uid'].'">'.$friends['Name'].' </b> </td> </tr> </table> ' ;


echo "<br>";
}
?>