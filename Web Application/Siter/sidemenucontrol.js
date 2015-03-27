		$(document).ready(function(){
			
			$("#MyProfile").click(function () {
			$("#controller").show();
            $("#NotificationsDIV").hide();
			$("#CheckProfile").hide();
			$("#profiler").hide();
			$("#setup").hide();	
        });		
			
        $("#EditProfile").click(function () {
			$("#controller").hide();
            $("#NotificationsDIV").hide();
			$("#CheckProfile").show();
			$("#profiler").hide();
			$("#setup").hide();
		
        });		
					
        $("#NotificationsButton").click(function () {
	$("#controller").hide();
            $("#NotificationsDIV").show();
			$("#CheckProfile").hide();
			$("#profiler").hide();
			$("#setup").hide();	
        });		
				
        $("#ConfigureButton").click(function () {
			$("#controller").hide();
            $("#NotificationsDIV").hide();
			$("#CheckProfile").hide();
			$("#profiler").hide();
			$("#setup").show();	
        });
			
			$("#ConfigureButton1").click(function () {
			$("#controller").hide();
            $("#NotificationsDIV").hide();
			$("#CheckProfile").hide();
			$("#profiler").hide();
			$("#setup").show();	
        });

    });
	
	
	
	