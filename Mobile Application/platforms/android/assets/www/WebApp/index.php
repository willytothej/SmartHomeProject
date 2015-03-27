<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?php echo time();?>"></script>	 

<link rel="stylesheet" type="text/css" href="meow.css?<?php echo time();?>">

<?php

$arr = json_decode(file_get_contents("http://www.insertcoinhere.me/WebService/User/ListUsers.php"),true);

echo "<h1>User Location Tracker</h1>
<br></br>
<section class=\"text\">


<form action=\"http://www.insertcoinhere.me/WebService/WebApp/map.php\" > 

Select User - <select name=\"userid\">";
foreach($arr as $item) {
	echo "<option value=\"".$item['UserID']."\">"  .   " " .$item['Email'] . " </option>";
	
}
	echo "</select> <input type=\"submit\" value=\"Submit\">
</form>

</section>
";
	
	
	
	
	

?>

<div id='AboutUs'>
	<p>
		<div id='logocontainer'>
			<div id='logoholder'>
		<img src="http://designmodo.github.io/Flat-UI/img/icons/svg/loop.svg" >	
			</div>
			<div id='title'>
				<h1>Phidget Control Panel</h1>
			</div>
		</div>
		</p>


<br></br>

<?php

$arr = json_decode(file_get_contents("http://www.insertcoinhere.me/WebService/Phidgets/Status.php"),true);

echo "
<section class=\"text\">
    <h2>Motor Status</h2><div id=meow1> </div> <button class=\"somebutton1\">turn on motor</button> <button class=\"somebutton2\">turn off motor</button> 
</section>
<section class=\"text\">
  <h2>Slider Position</h2><div id=meow2></div> 
</section>
<section class=\"text\">
<h2>Current RFID</h2><div id=meow3> </div></p>
</section>
<section class=\"text\">
  <h2>LED Status</h2><div id=meow4> </div> <button class=\"somebutton4\">turn on LED</button> <button class=\"somebutton3\">turn off LED</button> 
</section>


";







?>

<script>

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

	$('.somebutton3').click(function() { 

        $.ajax({
            url: 'http://www.insertcoinhere.me/WebService/Phidgets/UpdatePhidget.php?ID=1&Status=0',
            type: 'POST',
            data: {'submit':false}, // An object with the key 'submit' and value 'true;
            success: function (result) {
              
            }
        });  

});
		$('.somebutton4').click(function() { 

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
			  console.log(json[ 1 ].Status);
                  $('#meow1').html("<h2>" + json[ 1 ].DeviceStatus+"</h2>");
			 $('#meow2').html("<h2>" + json[ 3 ].SliderData+"</h2>");
			 $('#meow3').html("<h2>" + json[ 2 ].tempRFID+"</h2>");
			 $('#meow4').html("<h2>" + json[ 0 ].DeviceStatus+"</h2>");
              }); 
         setTimeout("loadChirp()",2000);
      }
	
	
	
</script>
	
	
</head>
<body>


</body>
</html>
