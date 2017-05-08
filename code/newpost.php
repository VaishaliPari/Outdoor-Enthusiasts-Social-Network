<?php
session_start();
include('topnav.php');


?> 

<div class="form">
      
      
      
      <div class="tab-content">
        <div id="signup"> <br> <br>  
        <center>          <h1>Write your new post </h1>
          
          <form action="postpic.php" method="post">
          
          

          <div class="field-wrap">
            <label>
              <span class="req">Title</span>
            </label>
            <input type="text"required autocomplete="off" name="ptitle" />
          </div>
          <br> <br> 
          <div class="field-wrap">
            <label>
              <span class="req">Text</span>
            </label>
            <input type="textarea" rows="30" cols="10" required autocomplete="off" name="ptxt" />
            <br>
            <br> 
            <br>
          </div>

          <div class="field-wrap">
            <label>
              <span class="req">Location</span>
            </label>
            <input list="locations" name="locations" >
            <datalist id="locations">
            <option value="Charles River">
            <option value="Colorado Springs">
            <option value="Grand Canyon">
            <option value="Hudson River">
            <option value="Lake Pleasant">
             <option value="North Woods">
             <option value="Sedona">
          </div>
          <br> <br>
          <div class="field-wrap">
            <label>
              <span class="req">Activity</span>
            </label>
            <input list="activity" name="activity" >
            <datalist id="activity">
            <option value="Hiking">
            <option value="Boating">
            <option value="Snowboarding">
            <option value="Kayaking">
            <option value="Trekking">
             <option value="Bungee Jumping">
             
            
          </div>
          <br> <br>
          <div class="field-wrap">
            <label>
              <span class="req">Visibility</span>
            </label>
            <input list="vis" name="vis" >
            <datalist id="vis">
            <option value="All">
             <option value="Friends">
             
            
          </div>
          <br> <br> 
          <input type="submit" class="button button-block" name="sub5" />
          </center>
          
          </form>