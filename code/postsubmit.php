<?php
session_start();
include('topnav.php');
include('base.php');


?>


<?php 

if (isset($_POST['sub5'])) {




	$q = mysql_query(" INSERT INTO Post (uid, title, txt, Lname, Activity) VALUES('".$_SESSION['login_user']."', '".$_POST['ptitle']."', '".$_POST['ptxt']."', '".$_POST['locations']."', '".$_POST['activity']."') "); 
}

$address = $_POST['locations'];
echo $address;
echo '<br> <br>';

echo '<h3> Your post </h3>';
echo '<b> Title : </b>';
echo  $_POST['ptitle'] ; 
echo '<br> ';
echo '<b> Activity : </b>';
echo  $_POST['activity']  ;
echo '<br> ';
echo '<b> Description : </b>';
echo  $_POST['ptxt']  ;
echo '<br> ';

?>

<?php

//$sql = mysql_query("SELECT * FROM Location WHERE Lname = '".$_POST['locations']."' ");
//$row = mysql_fetch_array($sql);
//$lat =  $row['Latitude'];
//$long =  $row['Longitude'];



?>



<div id="map" style="width:400px;height:400px;background:yellow"></div>

<script>
function initMap() {

		var address = "grand canyon";


geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.latitude;
    var longitude = results[0].geometry.location.longitude;
    alert(latitude);
    } 
});
		
        var myLatLng = {lat: latitude, lng: longitude};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQDDDPCrcMs9GwsLqS5IvUExsxaxd542g&callback=initMap"></script>