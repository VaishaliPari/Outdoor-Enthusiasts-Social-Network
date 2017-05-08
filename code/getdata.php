

<?php
session_start();
include "base.php"; 
include "topnav.php"
?>

<?php 



$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

$insert_image="INSERT INTO image_table VALUES('$imagetmp','$imagename', '".$_SESSION ['pid']."')";

mysql_query($insert_image);

//Insert the image name and image content in image_table





echo '<br> <br> <br> <br> <center> <b> Posted! </b> </center> ';
?>