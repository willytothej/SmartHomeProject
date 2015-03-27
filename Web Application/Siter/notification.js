	function getCookie(w){
	cName = "";
	pCOOKIES = new Array();
	pCOOKIES = document.cookie.split('; ');
	for(bb = 0; bb < pCOOKIES.length; bb++){
		NmeVal  = new Array();
		NmeVal  = pCOOKIES[bb].split('=');
		if(NmeVal[0] == w){
			cName = unescape(NmeVal[1]);
		}
	}
	return cName;
}	


function deletenotification(Row){
		       var TheRow = Row;
				 var houseid = getCookie('HouseID');
   							 var userid = getCookie('UserID');
    						var logginstring = getCookie('LoggedInString');
		  jQuery.ajax({
	//Send request         
        type: "GET",	     
        contentType: "application/json",
        url: "http://www.fluidityhome.me/api/Notification/DeleteNotification.php",
        data:{ "HouseID": houseid, "userid" : userid,"RowID" : TheRow, "loginstring" : logginstring},
    //If successfully sent then book created else book has not been         
	success: function (data, status, jqXHR) {
     location.reload();  
         },
         error: function (jqXHR, status) {
		location.reload();
         }
		}); 
	}	
	
	   checknot();
		function checknot(){
			
			 var houseid = getCookie('HouseID');
   							 var userid = getCookie('UserID');
    						var logginstring = getCookie('LoggedInString');
	 jQuery.ajax({
        type: "GET",	     
        contentType: "application/json",
        url: "http://www.fluidityhome.me/api/Notification/Notification.php?HouseID="+ houseid + "&userid="+ userid,
        data:{},    
        success: function (data, status, jqXHR) {
			alert(houseid);
			alert(userid);
            $( "#NotificationsDIV" ).empty();
		
			var lighton = "Light is on after set time";
				var tempon = "Temprature is too high/low";
			var Dooron = "Door is open after set time";
						 $("#NotificationsDIV").append("<div id='Curtains' class='alertinformation5'><br><h1>Notification Centre</h1></div>");
            
			$.each(data, function(v) {
	
		
				 if(data[v].Device === "1"){
				 $("#NotificationsDIV").append(
						 	"<div id='UserID' class='userinformation5'><table><tr><td>Device</td><td>Light</td></tr><tr><td>Time</td><td>"+data[v].Time+"</td></tr><tr><td>Event</td><td>"+lighton+"</td></tr></table><br><center><button onclick='deletenotification(this.id)' id='"+ data[v].UniqueID +"' type='button'>Click Me!</button>");
				 }
				 
				  if(data[v].Device === "4"){
					  
				 $("#NotificationsDIV").append(
						 	"<div id='UserID' class='userinformation5'><table><tr><td>Device</td><td>Temprature</td></tr><tr><td>Time</td><td>"+data[v].Time+"</td></tr><tr><td>Event</td><td>"+tempon+"</td></tr></table><br><button onclick='deletenotification(this.id)' id='"+ data[v].UniqueID +"' type='button'>Click Me!</button>");
				 }
				 
				  if(data[v].Device === "9"){
				 $("#NotificationsDIV").append(
						 	"<div id='UserID' class='userinformation5'><table><tr><td>Device</td><td>Door</td></tr><tr><td>Time</td><td>"+data[v].Time+"</td></tr><tr><td>Event</td><td>"+Dooron+"</td></tr></table><br><center><button onclick='deletenotification(this.id)' id='"+ data[v].UniqueID +"' type='button'>Click Me!</button>");
				 }
				  if(data[v].Device === "8"){
				 $("#NotificationsDIV").append(
						 	"<div id='UserID' class='userinformation5'><table><tr><td>Device</td><td>Curtains</td></tr><tr><td>Time</td><td>"+data[v].Time+"</td></tr><tr><td>Event</td><td>"+Dooron+"</td></tr></table><br><center><button onclick='deletenotification(this.id)' id='"+ data[v].UniqueID +"' type='button'>Click Me!</button>");
				 }
				 
    
             });

         },
         error: function () {
		
            console.log("error");
         }}); }
	
	
	
	window.setInterval(function(){


}, 1000);