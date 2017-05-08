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
    <head>
        
        <link href="stylelike.css" type="text/css" rel="stylesheet" />
        <script src="jquery-1.12.0.min.js" type="text/javascript"></script>

        <script src="scriptlike.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="content">

            <?php
                $userid = $_SESSION['login_user'] ;
                $query = "SELECT pid, Title, Txt, DateOfPost, userdetails.uid as uid, userdetails.Name as name FROM post, friends, userdetails where post.uid!='".$_SESSION['login_user']."' and post.uid = friends.fid AND friends.uid = '".$_SESSION['login_user']."' AND userdetails.uid = post.uid ORDER BY post.DateOfPost DESC";
                $result = mysql_query($query);
                while($row = mysql_fetch_array($result)){
                    $friend = $row['name'];
                    $postid = $row['pid'];
                    $title = $row['Title'];
                    $content = $row['Txt'];
                    $date = $row['DateOfPost'];
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
                

                   
                    ?>
            
                    <div class="post"><br>
                        
                        <h2><?php echo $title; ?><br>  </h2>
                        <h4> <?php echo " Written by " ; ?> <?php echo $friend ; ?> <br>  </h4>
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
