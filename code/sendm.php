<?php
session_start();
include('topnav.php');
include('base.php');


?>


          <br> <br> <br> 
<center> 
          <form method="post" action="sent.php">
          <div class="field-wrap">
            <label>
              <span class="req">Message: </span>
            </label>
            <input type="textarea" rows="30" cols="10" required autocomplete="off" name="msg" />
            <br>
            <br> 
            <br>
          </div>

          <div class="field-wrap">
            <label>
              <span class="req">Choose a Friend:  </span>
            </label>
            <input type="textarea"  required autocomplete="off" name="ff" />
            <br>
            <br> 
            <br>
          </div>


           <input type="submit" value="Send Message" name="sendmsg"> </form>

    </center>

         
          </div>