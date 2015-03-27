
<!DOCTYPE html>
<html>
  <head>
	  <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>User <?php echo $_GET["userid"] ?> Location Map </title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
		var bounds = new google.maps.LatLngBounds();	
function initialize() {
	var LatLngList = new Array();

  var mapOptions = {
    zoom: 3,
    center: new google.maps.LatLng(-25.363882,131.044922),
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


<?php

$userid = $_GET["userid"];

$arr = json_decode(file_get_contents("http://www.insertcoinhere.me/WebService/Location/UserLocationsList.php?UserID=".$userid ),true);

foreach($arr as $item) {echo "

	bounds.extend(new google.maps.LatLng(".    $item['Lat'] .",".    $item['Lon'].  "));




var marker = new google.maps.Marker({
position: new google.maps.LatLng(".$item['Lat'] .",".$item['Lon'].")
,map: map,title: 'Hello World!'});";}?>
	
map.setCenter(bounds.getCenter());
}

google.maps.event.addDomListener(window, 'load', initialize);


    </script>
  </head>
  <body>

    <div id="map-canvas"></div>
  </body>
</html>


