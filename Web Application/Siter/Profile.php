<div id="CheckProfile" style="display: none;"><br>
	    <div id='Curtains' class='alertinformation'><h1>My Profile</h1></div>
<div id='holder'><div id='UserID' class='userinformation4'><tr><td>User ID</td><td><br>Loading Data<br></td></tr>  <input type="text" name="FirstName" id="FirstName" required/> </div>
	<div id='UserID' class='userinformation4'><td>UserName</td><td><br>Loading Data<br></td></tr>  <input type="text" name="FirstName" id="FirstName" required/> </div>
	<div id='UserID' class='userinformation4'><tr><td>First Name</td><td><br>Loading Data<br></td>  <input type="text" name="FirstName" id="FirstName" required/> </tr></div>
	<div id='UserID' class='userinformation4'><td>Last Name</td><td><br>Loading Data<br></td></tr>  <input type="text" name="FirstName" id="FirstName" required/> </div>
	<div id='UserID' class='userinformation4'><tr><td>Email Address</td><td><br>Loading Data<br></td></tr>  <input type="text" name="FirstName" id="FirstName" required/> </div></div>
	<script>
		
		function deletediv(){
			
			
			
		}
		
//autoReadEverytime	

    var houseid = getCookie('HouseID');
    var userid = getCookie('UserID');
    var logginstring = getCookie('LoggedInString');

        jQuery.ajax({
			
			
	//Send request         
        type: "GET",	     
        contentType: "application/json",
        url: "http://www.fluidityhome.me/api/User/GetProfile.php",
        data:{ "UserID" : userid, "StringKey" : logginstring},
    //If successfully sent then book created else book has not been         
	success: function (data, status, jqXHR) {
            $( "#holder" ).remove();
                $.each(data, function(v) {

        $("#CheckProfile").append("<div id='UserID' class='userinformation4'><tr><td>User ID</td><td><br>" + data[v].UserID + "</td></tr></div><div id='UserID' class='userinformation4'><td>UserName</td><td><br>" + data[v].Username + "</td></tr></div><div id='UserID' class='userinformation4'><tr><td>First Name</td><td><br>" + data[v].FirstName + "</td></tr></div><div id='UserID' class='userinformation4'><td>Last Name</td><td><br>" + data[v].LastName + "</td></tr></div><div id='UserID' class='userinformation4'><tr><td>Email Address</td><td><br>" + data[v].Email + "</td></tr></div><div id='UserID' class='userinformation4'><tr><td>Confirm Code</td><td><br>" + data[v].ConfirmCode + "</td></tr></div>"  );
             });
         },
         error: function (jqXHR, status) {
			 console.log("error");
         }

		}); 

	
		
</script>
	
	</div>