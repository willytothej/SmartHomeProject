<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?php echo time();?>"></script>	 
<head>
	<title>Smart Home</title>
<link rel="stylesheet" type="text/css" href="/meow.css?<?php echo time();?>">
<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<?php include_once("analyticstracking.php") ?>
<link rel="icon" 
      type="image/png" 
      href="http://www.insertcoinhere.me/image/favicon.ico">
</head>
<body>
<div id='backgroundimage'>	
<div id='nav'>
	<div id='navtext'>
		
		<ul>
  <li><a href="http://www.fluidityhome.me">Home</a></li>
  <li><a href="javascript:meow()">Log-in</a></li>
  <li>Register</li>
  <li><a href="http://www.insertcoinhere.me/#AboutUs">About Us</a></li>
	<li><a href="http://www.insertcoinhere.me/#API">API</a></li>
			<li><a href="http://www.insertcoinhere.me/#Application">Application</a></li>
			<li><a href="http://www.insertcoinhere.me/#ContactUs">Contact Us</a></li>
</ul>
	</div>
	</div>
	

	
	
<div id='content'><br><br>
	

	<div id='userinformation'>
			<h1>
		<center>Notifications<br/></h1>
			5 Unread Notifications</center>
	
</div>
<div id='userinformation'>
	<h1>
		<center>Server Status<br/></h1>
			Online<br/><br/>
	Last Update - 4.32pm, Monday 25 May
	</center>
	
</div>
<div id='userinformation'>
	<h1>
		<center>Curtains<br/></h1>
			Open<br>
		<input type="checkbox" name="toggle" id="toggle">
<label for="toggle"></label></center>

	
</div>
	<div id='userinformation'>
		<h1>
		<center>Door Lock<br/></h1>
			Locked<br>	<input type="checkbox" name="toggle" id="toggle">
<label for="toggle"></label></center>
	
</div>
	<div id='userinformation'>
		<h1>
		<center>Temprature<br/></h1>
			15C</center>
			
	
</div>
	<div id='userinformation'>
		<h1>
		<center>Philips Hue Light<br/></h1>
			Off<br>	<input type="checkbox" name="toggle" id="toggle">
<label for="toggle"></label></center>
	
</div>
		<div id='userinformation'>
		<h1>
		<center>Door Lock<br/></h1>
			Locked<br>	<input type="checkbox" name="toggle" id="toggle">
<label for="toggle"></label></center>

</div>
	<div id='userinformation'>
		<h1>
		<center>Temprature<br/></h1>
			15C</center>
			
	
</div>
		
	
		


<?php

$arr = json_decode(file_get_contents("http://www.insertcoinhere.me/WebService/Phidgets/Status.php"),true);

echo "
<div id='sidecontrol'><center><div id='bottomlogo'><img  src=\"http://www.fluidityhome.me/image/logoside.png\" ></center></div></div>
<div id='PhidgetsHolder'>



</div>

";







?>

<script>
var meow = 1;
$('.somebutton1').click(function() { 

        $.ajax({
            url: 'http://www.insertcoinhere.me/WebService/Phidgets/UpdatePhidget.php?ID=2&Status=1',
            type: 'POST',
            data: {'submit':false}, // An object with the key 'submit' and value 'true;
            success: function (result) {
           
            }
        });  

});
	$('.somebutton2').click(function() { 

        $.ajax({
            url: 'http://www.insertcoinhere.me/WebService/Phidgets/UpdatePhidget.php?ID=2&Status=0',
            type: 'POST',
            data: {'submit':false}, // An object with the key 'submit' and value 'true;
            success: function (result) {
              
            }
        });  

});

	function loadbuttons(){
			$( "onbutton" ).click(function() {

        $.ajax({
            url: 'http://www.insertcoinhere.me/WebService/Phidgets/UpdatePhidget.php?ID=1&Status=0',
            type: 'POST',
            data: {'submit':false}, // An object with the key 'submit' and value 'true;
            success: function (result) {
              
            }
        });  

});
		$( "offbutton" ).click(function() {

        $.ajax({
            url: 'http://www.insertcoinhere.me/WebService/Phidgets/UpdatePhidget.php?ID=1&Status=1',
            type: 'POST',
            data: {'submit':false}, // An object with the key 'submit' and value 'true;
            success: function (result) {
              
            }
        });  

});
	}
	
	$( "#onbutton" ).click(function() {

        $.ajax({
            url: 'http://www.insertcoinhere.me/WebService/Phidgets/UpdatePhidget.php?ID=1&Status=0',
            type: 'POST',
            data: {'submit':false}, // An object with the key 'submit' and value 'true;
            success: function (result) {
              
            }
        });  

});
		$( "#offbutton" ).click(function() {

        $.ajax({
            url: 'http://www.insertcoinhere.me/WebService/Phidgets/UpdatePhidget.php?ID=1&Status=1',
            type: 'POST',
            data: {'submit':false}, // An object with the key 'submit' and value 'true;
            success: function (result) {
              
            }
        });  

});
	
	
	
	
	
	
</script>

<script>
loadChirp();

	

	function loadChirp(){
		console.log("getting json"),
         $.getJSON("http://www.insertcoinhere.me/WebService/Phidgets/Status.php", 
				   console.log("got json"),
              function(json) {
			if (json[ 1 ].DeviceStatus === "1"){
				$('#meow1').empty();
				   $('#meow1').append("<div id=on><h2>ON</h2></div<div id=onbutton></div><div id=offbutton></div>");
				
			}
				if (json[ 1 ].DeviceStatus === "0"){
					$('#meow1').empty();
				   $('#meow1').append("<div id=off><h2>OFF</h2></div><div id=onbutton></div><div id=offbutton></div>");
				
			}
			
					if (json[ 0 ].DeviceStatus === "1"){
				$('#meow4').empty();
				   $('#meow4').append("<div id=on><h2>ON</h2></div><div id=onbutton></div><div id=offbutton></div>");
				
			}
				if (json[ 0 ].DeviceStatus === "0"){
					$('#meow4').empty();
				   $('#meow4').append("<div id=off><h2>OFF</h2></div><div id=onbutton></div><div id=offbutton></div>");
				
			}
		if (meow === 1){
			loadbuttons();
			meow = 0;
		}
			  console.log(json[ 1 ].Status);
                
			 $('#meow2').html("<h2>" + json[ 3 ].SliderData+"</h2>");
			 $('#meow3').html("<h2>" + json[ 2 ].tempRFID+"</h2>");
			
              }); 
 setTimeout("loadChirp()",2000);
      }
	
	
	
</script>
	
	</div>	
<script>
	$(document).ready(function() {
	$("#login").hide();
		
});
function meow(){
	if ( $('#login').is(':visible') ){
		
		$("#login").hide();	
		
	}else{
		$("#login").show();	
		document.getElementById('login').scrollIntoView();
		
	}
			
			}
</script>
</div>
</body>
</html>