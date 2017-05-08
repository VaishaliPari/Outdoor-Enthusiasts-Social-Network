<?php
session_start();
include('topnav.php');
include('base.php');


?>
<!DOCTYPE html>
<html>

<body>


  <head>
        
        <link href="stylelike.css" type="text/css" rel="stylesheet" />
        <script src="jquery-1.12.0.min.js" type="text/javascript"></script>

        <script src="scriptlike.js" type="text/javascript"></script>

    </head>


<?php

if (isset($_POST['searchsubmit'])) {
	$search = $_POST['search'];
	echo '<br> <br>';

	$sql = mysql_query("SELECT Name, UserDetails.uid as uid FROM UserDetails, Friends WHERE (Name LIKE '%".$search."%' OR Name LIKE '%".$search."' OR Name LIKE '".$search."%') AND Userdetails.uid!= '".$_SESSION['login_user']."' AND Friends.uid = userdetails.uid AND friends.fid = '".$_SESSION['login_user']."' ORDER BY Name ") or die("<br/><br/>".mysql_error());


	echo "<h3> People </h3>";
	echo "<br>";
	$row=mysql_fetch_array($sql);
	if($row) {
	while($row=mysql_fetch_array($sql)) {
		
		echo'
		<a href="viewfriend.php?accept='.$row['uid'].'">'.$row['Name'].' </a> ' ; 
		 
		echo '<br>';


	} }

	else {
		echo 'No Friends Found!' ;
	}
	







	$sql2 = mysql_query("SELECT UserDetails.Name as name, UserDetails.uid as uid, Post.pid as pid, Title, Txt, Vis, DateOfPost FROM Post, UserDetails WHERE (Txt LIKE '%".$search."%'  OR Title LIKE '%".$search."%' OR Lname LIKE '%".$search."%' OR Activity LIKE '%".$search."%') AND Post.uid!= '".$_SESSION['login_user']."' AND UserDetails.uid = Post.uid ORDER BY Txt ") or die("<br/><br/>".mysql_error());
	echo "<br>";
	echo "<br>";
	echo "<h3> Posts </h3>";
	echo "<br>"; ?>
	<div class="content"> 
	<?php 
	$userid = $_SESSION['login_user'];
	while($row=mysql_fetch_array($sql2)) {
		 			$fid = $row['uid'];
                    $friend = $row['name'];
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
                

                   
                    ?>
            
                    <div class="post"><br>
                        <?php $checkf = mysql_query("SELECT * FROM Friends WHERE uid = '".$_SESSION['login_user']."' AND fid = '". $fid."' "); 
            	$checkff = mysql_fetch_array($checkf);
            	if ($checkff) { 
            		?> 
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

                        <?php }
                        else { 
                        	if($vis == "All") {

                        	?> 
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

                        <?php 

                        }


                         ?> 


                    </div>
            <?php
                
            
	} 
}

}
?>

</body>
</html>