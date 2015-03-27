	
<script>
    var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');
</script>

<div id='controller' style="display: none;">
		    
		
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		<div id='Curtains' class='alertinformation5'><h1>Phidget Controller</h1></div>
	
	
	
	
	
	
	
	
	
	
	
	<div id='Curtains' class='userinformation5'>
	<h1>
		<center>Curtains<br/></h1>
					
    <div class="range-slider">
    <input id= "range_1" class="input-range" type="range" value="500" min="1" max="999" onmouseup="mouseUPCurtain(this.value,'1')">
    <span id="range_1_span" class="range1-value">0</span>
    <script>
    var range = $('#range_1'),
    value = $('.range1-value');
    value.html(range.attr('value'));
    range.on('input', function(){
    value.html(this.value);
        
}); 
        
         
        
        
function mouseUPCurtain(t,p) 
        {
            
    var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');
        var v = t;
        var q = p;
        console.log(v);
        jQuery.ajax({
            
         type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceUpdate.php",
		 data:{"port": q, "value": v ,"houseid": houseid, "userid" : userid, "loginstring" : logginstring},
         
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
	
	
	
	
	
	
	
	
	
	
	
	
	<div id='Temprature' class='userinformation5'>
		<h1>
		<center>Temprature<br/></h1>
			<p id='TemperatureText'>Nothing happen</p></center></div>
			
			
<div id='Vibration' class='userinformation5'>
		<h1>
		<center>Vibration<br/></h1>
			<p id='VibrationText'>Nothig Happen</p></center></div>
						

<div id='DoorLock' class='userinformation5'>
		<h1>
		<center>Door Lock</h1>
			<center><div class="switch">
            <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
            <label for="cmn-toggle-1" data-on="Yes" data-off="No"></label>
          </div>
</center>
	
</div>
        				
<div id='MagnetSensor' class='userinformation5'>
		<h1>
		<center>Magnet Sensor</h1>
			
			<center><div class="switch">
            <input id="cmn-toggle-2" class="cmn-toggle cmn-toggle-yes-no" type="checkbox" disabled="disabled" >
            <label for="cmn-toggle-2" data-on="Yes" data-off="No"></label>
          </div>
</center>
	
</div>
	
	
					
<div id='HueLighter' class='userinformation5'>
		<h1>
		<center>Hue Light</h1>	
			<center><div class="switch">
            <input id="cmn-toggle-3" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
            <label for="cmn-toggle-3" data-on="Yes" data-off="No"></label>
          </div>
</center>
	
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div id='Fan' class='userinformation5'>
	<h1>
		<center>Fan<br/></h1>
				
    <div class="range-slider">
    <input id= "range_2" class="input-range" type="range" value="500" min="1" max="999" onmouseup="mouseUPCurtain(this.value,'2')">
    <span id="range_2_span" class="range2-value"></span>
    <script>
               
        var range2 = $('#range_2'),
        value2 = $('.range2-value');
        value2.html(range2.attr('value'));
        range2.on('input', function(){
        value2.html(this.value);
        }); 
    
 </script>
 
</div> 
   </center>		
</div>
	
	
	
	
	
	
	
	
	
	
	
	<div id='dim' class='userinformation5'>
	<h1>
		<center>Hue Dimer<br/></h1>
				
    <div class="range-slider">
    <input id= "range_3" class="input-range" type="range" value="100" min="1" max="250" onmouseup="mouseUPCurtain(this.value,'3')">
    <span id="range_3_span" class="range3-value"></span>
    <script>
    
     var range3 = $('#range_3'),
        value3 = $('.range3-value');
        value3.html(range3.attr('value'));
        range3.on('input', function(){
        value3.html(this.value);
        
}); 
        
     

   </script>
 
</div> 
   </center>		
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	<div id='Notifications' class='userinformation5'>
			<h1>
		<center>Notifications<br/></h1>
			5 Unread Notifications</center></div>
		
		
		

	
	
	
	
	
	
	
	
	
	
	
	
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
	
	
	
	
	
	
	
	
	
	
	<script>
//autoReadEverytime	
	window.setInterval(function(){
  getdata();
}, 1900);
	
    
    
   function getdata(){
     var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString'); 

       jQuery.ajax({
         type: "GET",
	     contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Service/WebApp/DeviceStatus.php",
		 data:{"HouseID" : houseid, "userid" : userid, "loginstring" : logginstring},
         
         success: function (data, status, jqXHR) {
            
           console.log("successful!");
            
             $.each(data, function(v) {
	           if(data[v].DeviceID == 9){
                  $("#DoorLock").show();
			
                  if(data[v].Status > 90){
                      $('#cmn-toggle-1').prop('checked', true);	
                  }else{
                      $('#cmn-toggle-1').prop('checked', false);
                  }
	       }else if(data[v].DeviceID == 10){
                
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
            
	       }
                
                 
             else if(data[v].DeviceID == 1)
                 {
                   
                     $("#Curtains").show();
                    var currentStatus = data[v].Status;
                    document.getElementById("range_1").value = currentStatus;
                    document.getElementById("range_1_span").textContent = currentStatus;
                    
	       }
                 
             else if(data[v].DeviceID == 2)
                 {  
                    
                        $("#Fan").show();
                    var currentStatus = data[v].Status;
                    document.getElementById("range_2").value = currentStatus;
                    document.getElementById("range_2_span").textContent = currentStatus;
                   
	       }
                 
            else if (data[v].DeviceID == 3)
                 {
                
                     $("#dim").show();
                   var currentStatus = data[v].Status;
                    document.getElementById("range_3").value = currentStatus;
                    document.getElementById("range_3_span").textContent = currentStatus; 
                    
                 }
            else if(data[v].DeviceID == 5)
                {                     
                    //code that >500 cmn-toogle-3 close <500 cmn-toogle-3 open 
                    
                    
		              if(data[v].Status > 500){
                        $('#cmn-toggle-2').prop('checked', true);	
		              }else{
		                $('#cmn-toggle-2').prop('checked', false);
		              }
                    }
                
               
                
            else if(data[v].DeviceID == 7){  
               
                    $("#Vibration").show();
                     if(data[v].Status < 400 || data[v].Status > 600){
                        document.getElementById("VibrationText").innerHTML = "Danger!!!"; 
                   //code that >600 or <400 will change the status to danger!
                    }
                     else{
                        document.getElementById("VibrationText").innerHTML = "Normal Day"; 
                    }
                    
                }
            else if(data[v].DeviceID == 8)
                {
                     
                        $("#hue").show();
		              if(data[v].Status == 1){
                        $('#cmn-toggle-3').prop('checked', true);	
		              }else{
		              $('#cmn-toggle-3').prop('checked', false);
		              }
                }
               
                }
         
             );}
         ,
         error: function () {
            console.log("error");
         }}); }
	
	
	
</script>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//Controler  </div>