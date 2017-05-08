<html>
<body>
<div class="bg">
<style>
.bg {
	background-color: black;
}
</style>
<?php
session_start();
include "base.php"; 
?>


<style>
.content{

background-color: red;
    overflow: hidden;

    font-family: "Georgia";

}	


.go{

	 overflow: hidden;

    font-family: "Georgia";
    text-decoration:none;
    color: white;
    background-color: black;

}


</style>

<?php




$email = $_POST['email'];




$password = $_POST['pass'];



$_SESSION['login_email'] = $email;

if (isset($_POST['sub'])) {	
	$checklogin = mysql_query("SELECT * FROM userdetails WHERE email = '".$email."' AND password = '".$password."'");
	$row = mysql_fetch_array($checklogin);
	
	if (mysql_num_rows($checklogin) == 1) {
			$flag = 1;
	
        echo'<div class="content"> '; 
	
		echo "<h2> Successful login <h2>"; 


		$_SESSION['login_name'] = $row['Name'];
		#Add other session variables hereeeee
		$_SESSION['login_city'] = $row['city'];
		$_SESSION['login_date'] = $row['DOB'];
		$_SESSION['login_user'] = $row['uid'];
		}
		else {
			$flag = 0;
			echo'<div class="content"> '; 
		echo "<h2> Ivalid login information </h2> ";
		echo "</div>";
		echo '<br> <br> <br> <br><br> <br> <br> <br> <div class = "go"> <center> <a href="index.html"> <h1> Go back </h1>  </a> </center> </div>';

	}}

		?>
		</div>
<?php 
		if ($flag!= 0)
		{

			echo '


<form method="post" action="profile.php">	<br> <br><br><div class="cli">	
<center> 
<img src="venture.png" style="width:304px;height:250px;"> <br> 
<input type="submit" name="sub4" value="Click to entire the site"> </center>
</form> ' ;

}

?>
</div>

</body>
</html>


