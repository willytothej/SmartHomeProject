<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/LoginTracking.php");
Authenticate();
?>
<html>
<header>
	<title>Smart Home</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?php echo time();?>"></script>	 
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/style.css?<?php echo time();?>">
	<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href="http://www.insertcoinhere.me/image/favicon.ico">
	
	<script src="sidemenucontrol.js"></script>
	<script src="notification.js"></script>
	<script src="phidget.js"></script>
	<script src="getcookie.js"></script>
	</header>

	
		
<body>
	
	<div id="backgroundwrapper"></div>
	<div id="wrapper">	
	
		
		<script>     checknot();
    function checknot(){
		
					    var houseid = getCookie('HouseID');
   							 var userid = getCookie('UserID');
    						var logginstring = getCookie('LoggedInString');
         jQuery.ajax({
         type: "GET",
         url: "http://www.fluidityhome.me/api/AlertNotifications.php?CheckNotifcation=1&HouseID="+houseid,
         contentType: "application/json;",
         dataType: "json",
                //If GET request if successful then the divs are cleared and the data is grabbed and outputted to the divs
         success: function (data, status, jqXHR) {
            $( "#Alert1" ).remove();
             $.each(data, function(v) {
                 
                 if(data[v].Noti >= 1){
           
                     $( "#sidecontrol" ).prepend( "<a onclick='$(\"#NotificationsButton\").click();' href='javascript:void(0);'><div id='Alert'><div class='textside'>"+data[v].Noti+" Alerts</div></div></a>" );
        }else{
            $( "#sidecontrol" ).prepend( "<a onclick='$(\"#NotificationsButton\").click();' href='javascript:void(0);'><div id='Alert1'><div class='textside'>0 Alerts</div></div></a>" );
    
        }
    }
                 
             
                    )}});
    }

</script>
		
		
	
<div id='backgroundimage'>	<div id='content'>
	
	
	
<?php
	require_once("nav.php");
	?>
	

	<?php
	require_once("Profile.php");
	?>
		

		
		
		//Setup

			<?php
	require_once("AlertsSetup.php");
	?>
		
		
		
		
		
			
	<div id="NotificationsDIV" style="display: none;">
		
			  </div>
	
			
	<?php
	require_once("Controller.php");
	?>

	
		


		
		
<?php
include 'Sidecontrol.php';
?>

		




	
	</div>	

</div>
		</div></div>
</body>
</html>
