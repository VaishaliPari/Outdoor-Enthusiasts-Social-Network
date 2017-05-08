<?php

session_start();
include('topnav.php');
include('base.php');

?>
<br>
<a href="myprofile.php" style="text-decoration: none;  font-family: georgia"> <h3> Edit your profile </h3> </a> 
<br>
<?php 
$data = mysql_query("SELECT * FROM userdetails WHERE uid='". $_SESSION ['login_user']."'") or die(mysql_error());
$dp = mysql_query("SELECT * FROM DP WHERE uid='". $_SESSION ['login_user']."'") or die(mysql_error());
$rowdp = mysql_fetch_array($dp);
while ($row = mysql_fetch_array($data)) {
	echo ' <h1> ';
	echo $row['Name'];
	echo ' </h1> ';
	echo '<table> <tr> <td> ';
	echo '<img style="width:100px;height:100px;" src="data:image/jpeg;base64, '.base64_encode( $rowdp['dp'] ).'"/>';
	echo '<br>';
	echo '</td>';
	echo '<td>';
	print ($row['DOB']);
	echo '<br>';
	print ($row['city']);
	echo '<br>';
	print ($row['email']);
	echo '<br>';
	echo '</td> </tr></table>';

}

?>
</body>
</html>