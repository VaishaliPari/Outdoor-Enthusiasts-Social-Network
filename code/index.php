<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Login</a></li>
        <li class="tab"><a href="#login">Sign Up</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Welcome back! </h1>
          
          <form action="signin.php" method="post">
          
          

          <div class="field-wrap">
            <label>
              <span class="req">Email Address*</span>
            </label>
            <input type="text"required autocomplete="off" name="email" />
          </div>
          
          <div class="field-wrap">
            <label>
              <span class="req">Password*</span>
            </label>
            <input type="password"required autocomplete="off" name="pass" />
          </div>
          
          <input type="submit" class="button button-block" name="sub" />Login </input>
          
          </form>

        </div>
        
        <div id="login">   
          
          
          <form action="signup.php" method="post">
          
            <div class="field-wrap">
            <label>
              <span class="req">Name*</span>
            </label>
            <input type="text"required autocomplete="off" name="uname" />
          </div>
          
          <div class="field-wrap">
            <label>
              <span class="req">Email*</span>
            </label>
            <input type="email"required autocomplete="off" name="email" />
          </div>
          
          <div class="field-wrap">
            <label>
              <span class="req">Password*</span>
            </label>
            <input type="password"required autocomplete="off" name="pass" />
          </div>

          <div class="field-wrap">
            <label>
              <span class="req">
               </span>
            </label>
            <input type="date"required autocomplete="off" name="dat" />
          </div>

          <div class="field-wrap">
            <label>
              <span class="req">City</span>
            </label>
            <input type="text"required autocomplete="off" name="city" />
          </div>
          
          <input type="submit" class="button button-block" name="sub2" /> Get Started!  </input>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
