<?php
session_start();
include('topnav.php');
include('base.php');


?>
<br>
<a href="profilepic.php" style="text-decoration: none;  font-family: georgia"> <h3> Edit your profile picture </h3> </a> 
<style>

.edit{

    background-color: red;
    align-self: center;
    text-decoration-color: whi;
}

</style>

<?php
$data = mysql_query("SELECT * FROM userdetails WHERE email='". $_SESSION ['login_email']."'") or die(mysql_error());

echo '<br> <br>';

$row = mysql_fetch_array( $data );

	echo ' 

<div class = "edit"> <br> <br> <br>
<center>
<form name="display" method="POST" action = "update.php">

                    <tr><td>Name:</td>

                        <td><input type="text" name="username" value=' . $row['Name']. '></td></tr><br><br>

                    <tr><td>Email:</td>

                        <td><input type="text" name="email" value=' . $row['email']. '></td></tr><br><br>

                    <tr><td>Password:</td>

                        <td><input type="password" name="password" value=' . $row['password']. '></td></tr><br><br>

                    <tr><td>DOB:</td>

                        <td><input type="date" name="DOB" value=' . $row['DOB']. '></td></tr><br><br>

                    <tr><td>City:</td>

                        <td><input type="text" name="city" value=' . $row['city']. '></td></tr><br><br>

                        <input type="submit" name="sub6" value="Save Changes"/> <br> <br> <br>
</center>
                        </div>

                    '

                    ;
                    



?>