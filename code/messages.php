<?php
session_start();
include('topnav.php');
include('base.php');


?>

<a href="sendm.php" > <input type="submit" value="Send Message" name="sendmsg">  </a>


<?php


$sql = mysql_query ("SELECT * FROM msg WHERE toid = '".$_SESSION['login_name']."' ");

echo '<br> <br>';

echo ' <h2> Your messages </h2>' ;

while ($row = mysql_fetch_array($sql)) {


echo '<br> <br>';

echo 'Message from';
echo ' <b> ';
echo $row['fromid'] ;
echo '</b>';

echo '<br> <br>';
echo $row['messages'] ;

echo '<br> <br>';

echo ' -------------------------------------------------------';

}




?>