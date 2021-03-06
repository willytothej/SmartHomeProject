<html>
<header>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	 
	<title>Smart Home</title>
<link rel="stylesheet" type="text/css" href="meow.css?<?php echo time();?>">
<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="icon" 
      type="image/png" 
      href="http://www.insertcoinhere.me/image/favicon.ico">
</header>
<body>















<script>
    var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');
</script>

<div id='backgroundimage'>	
	
<div id='content'>
    <div id='Curtains' class='alertinformation'><h1>Control</h1></div>
<div id='Curtains' class='userinformation'>
	<h1>
		<center>Curtains<br/></h1>
    <div class="range-slider">
    <input id= "range_1" class="input-range" type="range" value="500" min="1" max="999" onmouseup="SendData(this.value,'1')">
    <span id="range_1_span" class="range1-value">0</span>
    <script>
    var range = $('#range_1'),
    value = $('.range1-value');
    value.html(range.attr('value'));
    range.on('input', function(){
    value.html(this.value); 
}); 
        
         
        
        
function SendData(t,p) 
        { 
     var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');     
        var v = t;
        console.log(v);
        jQuery.ajax({
         type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": p, "value": v ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
        success: function (data, status, jqXHR) {
           console.log("successful!");     
         },
         error: function () {
            console.log("error");
         }}); 
        }
    </script>
</div> 
   </center>		
</div>


<div id='Fan' class='userinformation'>
	<h1>
		<center>Fan<br/></h1>
				
    <div class="range-slider">
    <input id= "range_2" class="input-range" type="range" value="500" min="1" max="999" onmouseup="mouseUPFan(this.value)">
    <span id="range_2_span" class="range2-value"></span>
    <script>
               
        var range2 = $('#range_2'),
        value2 = $('.range2-value');
        value2.html(range2.attr('value'));
        range2.on('input', function(){
        value2.html(this.value);
        }); 
    
            
function mouseUPFan(t) 
        {
        var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');       
        var v = t;
        console.log(v);
        jQuery.ajax({
         type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": 2, "value": v ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
         
            success: function (data, status, jqXHR) {  
           console.log("successful!");
      },
         error: function () {
            console.log("error");
         }}); }
 </script>
 
</div> 
   </center>		
</div>

<div id='dim' class='userinformation'>
	<h1>
		<center>Hue Dimer<br/></h1>
				
    <div class="range-slider">
    <input id= "range_3" class="input-range" type="range" value="100" min="1" max="250" onmouseup="mouseUPDim(this.value)">
    <span id="range_3_span" class="range3-value"></span>
    <script>
    
     var range3 = $('#range_3'),
        value3 = $('.range3-value');
        value3.html(range3.attr('value'));
        range3.on('input', function(){
        value3.html(this.value);
        
}); 
        
     
function mouseUPDim(t) 
        {
        var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');      
        var v = t;
        console.log(v);
        jQuery.ajax({
            type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": 3, "value": v ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
         
            success: function (data, status, jqXHR) {            
           console.log("successful!");
        },
         error: function () {
            console.log("error");
         }}); }
   </script>
 
</div> 
   </center>		
</div>

<div id='Temprature' class='userinformation'>
		<h1>
		<center>Temprature<br/></h1>
			<p id='TemperatureText'>Nothing happen</p></center></div>
			
			
<div id='Vibration' class='userinformation'>
		<h1>
		<center>Vibration<br/></h1>
			<p id='VibrationText'>Nothig Happen</p></center></div>
						

<div id='DoorLock' class='userinformation2'>
		<h1>
		<center>Door Lock</h1>
			<center><div class="switch">
            <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
            <label for="cmn-toggle-1" data-on="Yes" data-off="No"></label>
          </div>
</center>
	
</div>
        				
<div id='MagnetSensor' class='userinformation2'>
		<h1>
		<center>Magnet Sensor</h1>
			
			<center><div class="switch">
            <input id="cmn-toggle-2" class="cmn-toggle cmn-toggle-yes-no" type="checkbox" disabled="disabled" >
            <label for="cmn-toggle-2" data-on="Yes" data-off="No"></label>
          </div>
</center>
	
</div>
	
	
					
<div id='HueLighter' class='userinformation2'>
		<h1>
		<center>Hue Light</h1>	
			<center><div class="switch">
            <input id="cmn-toggle-3" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
            <label for="cmn-toggle-3" data-on="Yes" data-off="No"></label>
          </div>
</center>
	
</div>
		
<script>function goto(){window.location.replace('SetupPage.html');}</script>
<script>function goto1(){window.location.replace('GetProfile.html');}</script>
<script>function goto2(){window.location.replace('function.html');}</script>
<script>function goto3(){window.location.replace('Notification.html');}</script>
<div id='sidecontrol'><center><a onclick="goto3();" href="javascript:void(0);"><div id='Alert1'><div class='textside'>0 Alerts</div></div></a><a onclick="goto1();" href="javascript:void(0);"><div id='ProfileButton'><div class='textside'>My Profile</div></div></a><a onclick="goto2();" href="javascript:void(0);"><div id='ProfileButton'><div class='textside'>Control</div></div></a><a onclick="goto();" href="javascript:void(0);"><div id='ProfileButton'><div class='textside'>Configure</div></div></a><div id='bottomlogo'><img  src="image/logoside.png" ></center></div></div>

<script> 
    
$('#cmn-toggle-3').click(function() { 
    if($('#cmn-toggle-3').is(':checked')){
		   var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');    
    jQuery.ajax({
	//Send request
        type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": 8, "value": 1 ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
    //If successfully sent then book created else book has not been         
	success: function (data, status, jqXHR) {
            console.log("successful 1 !");
         },
         error: function (jqXHR, status) {
			 console.log("error");
         }

		}); 
    }
    else{
   var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');      
    jQuery.ajax({
	//Send request
            type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": 8, "value": 0 ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
         
            success: function () {  
           console.log("successful 2!");
      },
         error: function () {
            console.log("error");
         }}); 
    } });
  
    
function closeDoor()
    {
            var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');  
        jQuery.ajax({
	//Send request
          type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": 9, "value": 0 ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
         
            success: function () {  
           console.log("successful 5 !");
      },
         error: function () {
            console.log("error");
         }}); 
    }
    
      
$('#cmn-toggle-1').click(function() { 
    if($('#cmn-toggle-1').is(':checked')){
        var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');    
    jQuery.ajax({
	//Send request
        type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": 9, "value": 180 ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
         
            success: function () {  
            console.log("successful 3 !");
      },
         error: function () {
            console.log("error");
             setTimeout('closeDoor()', 10000);                    //for some reason it's not getting back GET result, 
                                            //however the state is update inside the database.
         }}); 
    }
    else{
        
        
      var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');  
        jQuery.ajax({
	//Send request
        type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": 9, "value": 0 ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
         
            success: function () {  
           console.log("successful 4!");
      },
         error: function () {
            console.log("error");
         }}); 
    } });
    
    
	
	
</script>

	</div>	


<script>
//autoReadEverytime	
	window.setInterval(function(){
  getdata();
}, 3000);
	
        var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');
    
   function getdata(){
  
	   
	   
	   
       jQuery.ajax({
         type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceStatus.php",
		 data:{"HouseID" : houseid, "userid" : userid, "loginstring" : logginstring},
         
         success: function (data, status, jqXHR) {
            
           console.log("successful!");
            
             $.each(data, function(v) {
	           if(data[v].DeviceID == 9){
              if(data[v].Active == 1){
                  $("#DoorLock").show();
                  if(data[v].Status > 90){
                      $('#cmn-toggle-1').prop('checked', true);	
                  }else{
                      $('#cmn-toggle-1').prop('checked', false);
                  }
              }
               else{
                   $("#DoorLock").hide();
                       
               }
	       }
                 
            else if(data[v].DeviceID == 10){
                if(data[v].Active == 1){ 
                     $("#Temperature").show();
                if(data[v].Status == 0)
                {
                    document.getElementById("TemperatureText").innerHTML = "Really COLD";
                }
                else if (data[v].Status == 180)
                {
                    document.getElementById("TemperatureText").innerHTML = "Really HOT"; 
                }
                else
                {
                    document.getElementById("TemperatureText").innerHTML = "Normal Temperature"; 
                }     
            }else
                {
                   $("#Temperature").hide();
                       
               }
	       }
                
                 
             else if(data[v].DeviceID == 1)
                 {
                    if(data[v].Active == 1){ 
                     $("#Curtains").show();
                    var currentStatus = data[v].Status;
                    document.getElementById("range_1").value = currentStatus;
                    document.getElementById("range_1_span").textContent = currentStatus;
                    }else
                {
                   $("#Curtains").hide();
                       
               }
	       }
                 
             else if(data[v].DeviceID == 2)
                 {  
                    if(data[v].Active == 1){ 
                        $("#Fan").show();
                    var currentStatus = data[v].Status;
                    document.getElementById("range_2").value = currentStatus;
                    document.getElementById("range_2_span").textContent = currentStatus;
                    }else{
                   $("#Fan").hide();
                    }
	       }
                 
            else if (data[v].DeviceID == 3)
                 {
                if(data[v].Active == 1){ 
                     $("#dim").show();
                   var currentStatus = data[v].Status;
                    document.getElementById("range_3").value = currentStatus;
                    document.getElementById("range_3_span").textContent = currentStatus; 
                    }else{
                        $("#dim").hide();
                    }
                 }
            else if(data[v].DeviceID == 5)
                {                     
                    //code that >500 cmn-toogle-3 close <500 cmn-toogle-3 open 
                    
                    if(data[v].Active == 1){ 
                         $("#MagnetSensor").show();
		              if(data[v].Status > 500){
                        $('#cmn-toggle-2').prop('checked', true);	
		              }else{
		                $('#cmn-toggle-2').prop('checked', false);
		              }
                    }
                
               else{
                   $("#MagnetSensor").hide();
                       
                }    
                }
            else if(data[v].DeviceID == 7)
                {  
                if(data[v].Active == 1){
                    $("#Vibration").show();
                     if(data[v].Status < 400 || data[v].Status > 600){
                        document.getElementById("VibrationText").innerHTML = "Danger!!!"; 
                   //code that >600 or <400 will change the status to danger!
                    }
                     else{
                        document.getElementById("VibrationText").innerHTML = "Normal Day"; 
                    }
                    }
               else{
                        $("#Vibration").hide();
                       
                }    
                }
            else if(data[v].DeviceID == 8)
                {
                    if(data[v].Active == 1){ 
                        $("#hue").show();
		              if(data[v].Status == 1){
                        $('#cmn-toggle-3').prop('checked', true);	
		              }else{
		              $('#cmn-toggle-3').prop('checked', false);
		              }
                }
               else{
                   $("#hue").hide();
                       
                }    
                }
            else{
                  //nothing happen   
                 }  
             });
         },
         error: function () {
            console.log("error");
         }}); }
	
	
	
</script>





</div>
</body>
</html>