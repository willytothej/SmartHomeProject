	function getdata(){
	        jQuery.ajax({
         type: "GET",
         url: "http://www.fluidityhome.me/api/DeviceStatus.php?HouseID=1",
         contentType: "application/json;",
         dataType: "json",
				//If GET request if successful then the divs are cleared and the data is grabbed and outputted to the divs
         success: function (data, status, jqXHR) {
			 $.each(data, function(v) {
				 
				 //Curtain slider
	if(data[v].DeviceID == 1){
		if(data[v].Status >= 500){
		$('#cmn-toggle-1').prop('checked', true);	
		}else{
		$('#cmn-toggle-1').prop('checked', false);
		}
	}
				// fan
				 if(data[v].DeviceID == 2){
		if(data[v].Status >= 500){
		$('#FanToggle').prop('checked', true);	
		}else{
		$('#FanToggle').prop('checked', false);
		}
	}
				 
				 //
				 if(data[v].DeviceID == 3){
		if(data[v].Status >= 500){
		$('#PhillipsHueToggle').prop('checked', true);	
		}else{
		$('#PhillipsHueToggle').prop('checked', false);
		}
	}
				 
				 if(data[v].DeviceID == 4){
		if(data[v].Status == 1){
		$('#cmn-toggle-7').prop('checked', true);	
		}else{
		$('#cmn-toggle-7').prop('checked', false);
		}
	}
				 
				 if(data[v].DeviceID == 5){
		if(data[v].Status == 1){
		$('#cmn-toggle-7').prop('checked', true);	
		}else{
		$('#cmn-toggle-7').prop('checked', false);
		}
	}
				 
				 if(data[v].DeviceID == 6){
		if(data[v].Status == 1){
		$('#cmn-toggle-7').prop('checked', true);	
		}else{
		$('#cmn-toggle-7').prop('checked', false);
		}
	}
				 
				 			 if(data[v].DeviceID == 7){
		if(data[v].Status == 1){
		$('#cmn-toggle-7').prop('checked', true);	
		}else{
		$('#cmn-toggle-7').prop('checked', false);
		}
	}
				 
				 			 if(data[v].DeviceID == 8){
		if(data[v].Status == 1){
		$('#cmn-toggle-7').prop('checked', true);	
		}else{
		$('#cmn-toggle-7').prop('checked', false);
		}
	}
				
			

			 
			 
			 
			 });
         },
         error: function (jqXHR, status) {

         }
						}); }
	
	
	