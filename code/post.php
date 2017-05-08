<?php
session_start();
include "base.php";
include "topnav.php";


?>
<html>

<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100px;
        width: 100px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  
  <body>
  
    <a href="newpost.php"> <b> <p><h2> Write new post </h2></p>  </b> </a>
    <head>
        
        <link href="stylelike.css" type="text/css" rel="stylesheet" />
        <script src="jquery-1.12.0.min.js" type="text/javascript"></script>

        <script src="scriptlike.js" type="text/javascript"></script>

    </head>
    <body>

  
        <div class="content">

            <?php
                $userid = $_SESSION['login_user'];
                $query = "SELECT * FROM post where uid='".$_SESSION['login_user']."' ORDER BY post.DateOfPost DESC";
                $result = mysql_query($query);
                while($row = mysql_fetch_array($result)){
                    
                    $postid = $row['pid'];
                    $title = $row['Title'];
                    $content = $row['Txt'];
                    $date = $row['DateOfPost'];
                    $vis = $row['Vis'];
                    $type = -1;

                    // Checking user status
                    $status_query = "SELECT count(*) as cntStatus,type FROM like_unlike WHERE uid=".$userid." and pid=".$postid." ";
                    $status_result = mysql_query($status_query);
                    $status_row = mysql_fetch_array($status_result);
                    $count_status = $status_row['cntStatus'];
                    if($count_status > 0){
                        $type = $status_row['type'];
                    }

                    // Count post total likes and unlikes
                    $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and pid=".$postid."";
                    $like_result = mysql_query($like_query);
                    $like_row = mysql_fetch_array($like_result);
                    $total_likes = $like_row['cntLikes'];

                    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and pid=".$postid."";
                    $unlike_result = mysql_query($unlike_query);
                    $unlike_row = mysql_fetch_array($unlike_result);
                    $total_unlikes = $unlike_row['cntUnlikes'];
                    $sqlphoto = mysql_query("SELECT * FROM image_table WHERE pid=".$postid." ");
                    $pic = mysql_fetch_array($sqlphoto);
                

                    $sql = mysql_query("SELECT * FROM Location where LName = 'Sedona' ");
                    $row = mysql_fetch_array($sql);
                    $lat = $row['Latitude'];
                    $lng = $row['Longitude'];
                    
                    ?>
                    
                    <div class="post"><br>
                        
                        <h1><?php echo $title; ; ?></h1>
                        <br>
                        <?php echo '
                        <a href="editpost.php?accept='.$postid.' "> Edit this post </a> '; echo '  <i> Can be viewed by '; echo $vis ; echo ' </i> <br> <br> '; ?>
                        <div class="post-text">

                            <?php echo $date; ?>
                            <br>
                            <br>
                            <?php echo $content; ?>
                            <br> <br>
                            <table>
                            <tr> 
                            <td> <?php
                                echo '<img style="width:100px;height:100px;" src="data:image/jpeg;base64, '.base64_encode( $pic['imagetmp'] ).'"/>';
                            ?> </td>
                            <td>



                            
                                <div id="map"></div>
                                 <script>

                                 function initMap() {
                                    var myLatLng = {lat: parseFloat('<?php echo $lat;?>'), lng: parseFloat('<?php echo $lng;?>')};

                                    var map = new google.maps.Map(document.getElementById('map'), {
                                      zoom: 4,
                                      center: {lat: parseFloat('<?php echo $lat;?>'), lng: parseFloat('<?php echo $lng;?>')}
                                    });

                                    var marker = new google.maps.Marker({
                                      position: {lat: parseFloat('<?php echo $lat;?>'), lng: parseFloat('<?php echo $lng;?>')},
                                      map: map,
                                      title: 'Hello World!'
                                    });
                                  }
                                </script>
                                <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQDDDPCrcMs9GwsLqS5IvUExsxaxd542g&callback=initMap">
                                </script>




                        </td>
                        </tr>
                        </table>
                        </div>
                        <div class="post-action">

                            <input type="button" value="Like" id="like_<?php echo $postid; ?>" class="like" style="<?php if($type == 1){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>)&nbsp;

                            <input type="button" value="Unlike" id="unlike_<?php echo $postid; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>)

                        </div>
                    </div>
            <?php
                }
            ?>

        </div>
    </body>
</html>
