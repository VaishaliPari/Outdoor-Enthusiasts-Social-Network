
<?php include "base.php"; ?>
<?php
if (isset($_POST['sub2'])) {
if(!empty($_POST['email']) && !empty($_POST['pass']))
{
  
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $city = $_POST['city'];
    $dat = $_POST['dat'];

     
     $checkusername = mysql_query("SELECT count FROM UserDetails WHERE email = '".$email."' ");
    
     
    if ($checkusername == 1){
     
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that email is taken. Please go back and try again.</p>";
     }
     else
     {
        $registerquery = mysql_query("INSERT INTO UserDetails (email, password, DOB, city, Name) VALUES('".$email."', '".$pass."', '".$dat."', '".$city."', '".$uname."')");
        if($registerquery)
        {
            echo "<h1>Success</h1>";
            echo "<p>Your account was successfully created. ";
            echo '<a href="index.php"><h2>  Go back to sign in <h2>  </a> ';
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please try again.</p>";    
        }       
     }

}}
?>
