<?php

include "base.php";

$userid = 5;
$postid = $_POST['postid'];
$type = $_POST['type'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE pid=".$postid." and uid=".$userid;

$result = mysql_query($query);
$fetchdata = mysql_fetch_array($result);
$count = $fetchdata['cntpost'];


if($count == 0){
    $insertquery = "INSERT INTO like_unlike(uid,pid,type) values(".$userid.",".$postid.",".$type.")";
    mysql_query($insertquery);
}else {
    $updatequery = "UPDATE like_unlike SET type=" . $type . " where uid=" . $userid . " and pid=" . $postid;
    mysql_query($updatequery);
}


// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type=1 and pid=".$postid;
$result = mysql_query($query);
$fetchlikes = mysql_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type=0 and pid=".$postid;
$result = mysql_query($query);
$fetchunlikes = mysql_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];


$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);