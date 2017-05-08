<?php
session_start();
include "base.php"; 
include "topnav.php"
?>

<?php 



$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO DP VALUES('".$_SESSION ['login_user']."', '$imagetmp','$imagename')";

mysql_query($insert_image);

echo '<br> <br> <br> <br> <center> <b> Updated! </b> </center> ';

?>