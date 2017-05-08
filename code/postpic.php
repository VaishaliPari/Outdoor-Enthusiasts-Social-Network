<?php
session_start();
include('topnav.php');
include('base.php');

?>
<html>
<body>
<br>  
<center> 
<?php 

if (isset($_POST['sub5'])) {




	$q = mysql_query(" INSERT INTO Post (uid, title, txt, Lname, Activity, Vis) VALUES('".$_SESSION['login_user']."', '".$_POST['ptitle']."', '".$_POST['ptxt']."', '".$_POST['locations']."', '".$_POST['activity']."', '".$_POST['vis']."' ) "); 
}

$address = $_POST['locations'];

echo '<br> <br>';

echo '<h3> Your post </h3>';
echo '<b> Title : </b>';
echo  $_POST['ptitle'] ; 
echo '<br> ';
echo '<b> Activity : </b>';
echo  $_POST['activity']  ;
echo '<br> ';
echo '<b> Description : </b>';
echo  $_POST['ptxt']  ;
echo '<br> ';
echo '<b> Location : </b>';
echo  $_POST['locations']  ;
echo '<br> ';

$sql = mysql_query ("SELECT pid from Post WHERE uid = '".$_SESSION['login_user']."' AND Title = '".$_POST['ptitle']."' AND Txt = '".$_POST['ptxt']."' AND LName = '".$_POST['locations']."' ");
$row = mysql_fetch_array($sql);
$pid = $row['pid'];
$_SESSION['pid'] = $pid;

?> <br> <br>

	<h2> Upload a picture along with your post </h2>
	<br> <br> 	
	<br> <br> 

<form method="POST" action="getdata.php" enctype="multipart/form-data">
 <input type="file" name="myimage">
 <input type="submit" name="submit_image" value="Upload">


</form>

</center>

</body>
</html>

