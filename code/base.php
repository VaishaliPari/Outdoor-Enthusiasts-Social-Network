<?php
$username = 'root';
$password = '';
$hostname = 'localhost';
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect");
$selected = mysql_select_db("Project", $dbhandle) or die("Could not select db");
?>