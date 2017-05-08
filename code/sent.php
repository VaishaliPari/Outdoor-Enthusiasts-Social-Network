<?php
session_start();
include('topnav.php');
include('base.php');


?>



<?php 

if (isset($_POST['sendmsg'])) {




$query = mysql_query(" INSERT INTO msg(fromid, messages, toid) VALUES('".$_SESSION['login_name']."', '".$_POST['msg']."', '".$_POST['ff']."') "); 

echo '<br> ' ;
echo 'Message sent';


}