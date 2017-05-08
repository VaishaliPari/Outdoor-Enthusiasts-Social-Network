<?php
session_start();
include('topnav.php');
include('base.php');


?>



<html>
<body>
<?
$dp = mysql_query("SELECT * FROM DP WHERE uid='". $_SESSION ['login_user']."'") ;
$rowdp = mysql_fetch_array($dp);
if ($rowdp) {
echo '<img style="width:100px;height:100px;" src="data:image/jpeg;base64, '.base64_encode( $rowdp['dp'] ).'"/>' ;
echo '<br> <br> ' ;
echo '<b> Delete your profile picture </b> <br> '; 
echo '<input type="submit" name="del" value="Delete">' ;
if(isset($_POST['del'])) {
	$sql = ("DELETE FROM DP WHERE uid='". $_SESSION ['login_user']."' ");
	echo ' <b> Profile Picture Deleted </b> ';
}

}
else
{
	echo 'You do not have a Profile Picture currently';
}
echo '<br> <br> ' ;
echo '<b> Update your profile picture </b> <br> <br> '; 
?>		
<form method="POST" action="dpupdate.php" enctype="multipart/form-data">
 <input type="file" name="myimage">
 <input type="submit" name="submit_image" value="Upload">
</form>


</body>
</html>

