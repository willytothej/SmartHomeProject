<html>
<header>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?php echo time();?>"></script>	 
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/style.css?<?php echo time();?>">
<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

	<link rel="icon" 
      type="image/png" 
      href="http://www.insertcoinhere.me/image/favicon.ico">
	<title>Smart Home</title>
</header>
	
<body>
	<div id="backgroundwrapper"></div>
	<div id="wrapper">	
<div id='backgroundimage'>	
<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/nav.php");
 ?>
	
	
<div id='content'>


	<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="stylesheet" type="text/css" href="/meow.css?<?php echo time();?>">
<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

<link rel="icon" 
      type="image/png" 
      href="http://www.insertcoinhere.me/image/favicon.ico">
</head>
<body>

	

	
	
<div id='content'>
<br /><br /><br />
	
	
	<div id='Application'>
		<p>
		<div id='logocontainer'>
		<div id='logoholder'>
		<img src="http://designmodo.github.io/Flat-UI/img/icons/svg/compas.svg" >	
			</div>
			<div id='title'>
				<h1>Register as Elderly</h1>
			</div>
		</div>
	
	<br />
		<form class="form" onsubmit="Send()">
		<br /><table style="margin:auto; color: white;">
  <tr>
    <td><label for="name">First Name</label> </td>
    <td><p class="name"> 
		     
        <input type="text" name="FirstName" id="FirstName" required/> 
   
		</p></tr><tr></td> 
	  <td><label for="name">Second Name</label> </td>
    <td><p class="name"> 
		     
        <input type="text" name="SecondName" id="SecondName" required/> 
   
    </p></td> 
	  
   
  </tr>
  <tr>
    <td><label for="name">UserName</label> </td>
    <td><p class="name"> 
		     
        <input type="text" name="Username" id="Username" required/> 
   
		</p></td></tr><tr> 
    <td><label for="name">Email Address</label> </td>
    <td><p class="name"> 
		     
        <input type="email" name="Email" id="Email" required/> 
   
    </p></td> 
   
  </tr>

  
				 <tr>
    <td><label for="name">Password</label> </td>
    <td><p class="name"> 
		     
        <input type="password" name="Password" id="Password" required/> 
   
    </p></td> 
    
  </tr>
 
</table>
 
   
    


   	<div id="Errorr">
		
	</div>
  
    </p> 
    
 
    <p class="submit"> 
     <input type="submit" value="Submit">
    </p> 
   
</form>
	
	</div>


	
		
	
		



<div id='sidecontrol'><center><div id='ProfileButton'>
	<div class='textside'>My Profile</div></div><div id='ProfileButton'><div class='textside'>My Profile</div>
	</div><div id='ProfileButton'><div class='textside'>My Profile</div></div><div id='ProfileButton'><div class='textside'>My Profile</div></div><div id='bottomlogo'>
	<img  src="http://www.fluidityhome.me/image/logoside.png" ></center></div></div>

	
<div id='PhidgetsHolder'>



</div>









?>



	
	</div>	



	
	<script>

	function Send(){ 
		event.preventDefault();
		$( "#Errorr" ).empty();
	var First = $('#FirstName').val();
		var Second = $('#SecondName').val();
		var Password = $('#Password').val();
		var Email = $('#Email').val();
		var ConfirmCode = $('#ConfirmCode').val();
		var Username = $('#Username').val();
		
	jQuery.ajax({
	//Send request
    type: "GET",
	contentType: "application/json",
         url: "http://www.fluidityhome.me/api/User/CreateElder.php",
		data:{"Password": Password       ,"LastName": Second,           "UserName": Username,            "FirstName": First,        "EmailAddress": Email },
    //If successfully sent then book created else book has not been         
	success: function (data, status, jqXHR) {
		
console.log("sent");
          var obj = jQuery.parseJSON(data);
if(obj[0].Username === "1"){

	$( "#Errorr" ).append( "<p>Username taken</p>" );
}
		if(obj[0].Email === "1"){
			
	    
		$( "#Errorr" ).append( "<p>Email taken</p>" );
}
		if(obj[0].Code === "0"){
	
		$( "#Errorr" ).append( "<p>Code missing</p>" );
}
		if(obj[0].Username === "1"&& obj[0].Email === "1" ){
				window.location.href = "http://www.fluidityhome.me/Login.php";
		}
		 
	
				
				 

	
	},
         error: function (jqXHR, status) {
			console.log("meow error"+status)
         }
}
				);
					   }
	



		
		
		

</script>
</div>
		</div></div>
</body>
</html>