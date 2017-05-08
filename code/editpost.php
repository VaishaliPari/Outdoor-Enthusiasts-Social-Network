<?php
session_start();
include 'base.php';
include 'topnav.php';
?>
<?php



$post = $_GET['accept'];









$data = mysql_query("SELECT * FROM Post WHERE pid='". $post."'") or die(mysql_error());



$row = mysql_fetch_array( $data );

	echo ' 

<div class = "edit"> 
<center>
<form name="display" method="POST" action = "updatepost.php?accept='.$post.'">
						<table> 
                    <tr><td>Title:</td>

                        <td><input type="text" name="ptitle" value=' . $row['Title']. '></td></tr><br><br>

                    <tr><td>Text:</td>

                        <td><input type="text" name="txt" value=' . $row['Txt']. '></td></tr><br><br>

                    <tr><td>Activity:</td>

                        <td><input type="text" name="activity" value=' . $row['Activity']. '></td></tr><br><br>

                    <tr><td>Location:</td>

                        <td><input type="text" name="lname" value=' . $row['Lname']. '></td></tr><br><br>

                    <tr><td>Visibility:</td>

                        <td><input list="vis" name="vis" >
            <datalist id="vis">
            <option value="All"></option><option value="Friends"></option></input></td></tr> <br> <br> 
                <tr> <td> 

                        <input type="submit" name="sub6" value="Save Changes"/> </td> </tr> </table> <br> <br> <br>
</center>
                        </div>

                    '

                    ;
                    




?>