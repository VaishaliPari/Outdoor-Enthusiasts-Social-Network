<?php
session_start();
include 'base.php';
include 'topnav.php';
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


<?php

$myfriend = $_GET['accept'];
$me = $_SESSION['login_user'];


$data = mysql_query("SELECT * FROM userdetails WHERE uid='". $myfriend."'") or die(mysql_error());
$dp = mysql_query("SELECT * FROM DP WHERE uid='". $myfriend."'") or die(mysql_error());
$sql = mysql_query("SELECT * FROM FriendRq where (uid = '".$me."' AND fid = '".$myfriend."') OR (uid = '".$myfriend."' AND fid = '".$me."') ");
$fr = mysql_fetch_array($sql);
$rowdp = mysql_fetch_array($dp);


while ($row = mysql_fetch_array($data)) {
	echo ' <h1> ';

	echo $row['Name'];
	 echo ' </h1> ';
		if (!$fr) {
			echo '<br> ';
			echo '<br> ';
	echo '<a href="frsent.php?accept='.$myfriend.'"> <input type="submit" value="Send Friend Request" name="fr"></a>';
	
}

else {
echo '<br> ';
	echo '<i> Friend Request Already sent/received! </i> <br> ' ;
	echo '<br>';
	echo '<a href="delreq.php?accept='.$myfriend.'"> <input type ="submit" value="Delete Friend Request" name="frd"> </a> <br> <br>';
}
	
	echo ' </h1> ';
	echo '<table> <tr> <td> ';
	echo '<img style="width:100px;height:100px;" src="data:image/jpeg;base64, '.base64_encode( $rowdp['dp'] ).'"/>';
	echo '<br>';
	echo '</td>';
	echo '<td>';
	print ($row['DOB']);
	echo '<br>';
	print ($row['city']);
	echo '<br>';
	print ($row['email']);
	echo '<br>';
	echo '</td> </tr></table>';

}


echo ' <br><br> <br <br> <center> <b> Posts by  them  </b> </center> <br> <br> ' ;






?> 



        <div class="content">

            <?php

            	$checkf = mysql_query("SELECT * FROM Friends WHERE uid = '".$_SESSION['login_user']."' AND fid = '". $myfriend."' "); 
            	$checkff = mysql_fetch_array($checkf);
            	if ($checkff) {

            	
                $userid = $_SESSION['login_user'] ;
                $query = "SELECT * FROM post, friends where post.uid!='".$_SESSION['login_user']."' and post.uid = friends.fid AND friends.uid = '".$_SESSION['login_user']."' AND post.uid = '". $myfriend."' ORDER BY post.DateOfPost DESC ";
                $result = mysql_query($query);
                while($row = mysql_fetch_array($result)) {
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
                        
                        <h1><?php echo $title; ?></h1>
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
                } }

                else 
                {   
                			$userid = $_SESSION['login_user'] ;
                $sqlq = mysql_query(" SELECT * FROM Post WHERE Post.uid = '".$myfriend."' AND Post.Vis = 'All' ORDER BY Post.DateOfPost DESC " );
                	
                while ($row = mysql_fetch_array($sqlq)) {
                	
                	

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
                        
                        <h1><?php echo $title; ?></h1>
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


                			}

            ?>

        </div>
    </body>
</html>



