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
	
		
				<h1>Login</h1>
		
		
	
	<br />
		<form class="form">
		<br /><table style="margin:auto; color: white;">
  <tr>
    <td><label for="name">User Name</label> </td>
    <td><p class="name"> 
		     
        <input type="text" name="FirstName" id="Username" required/> 
   
    </p></td> 
	  <td><label for="name">Password</label> </td>
    <td><p class="name"> 
		     
        <input type="password" name="SecondName" id="Password" required/> 
   
    </p></td> 
	  
   
  </tr>
  
</table>
			
		
 
   
    


   
  
    </p> 
    
 
    <p class="submit"> 
       <button id="buttoner" type="button">Login</button>
    </p> 
   
</form>
	
	</div>
	<div id="Error">
		
	</div>

	
		
	
		



<div id='sidecontrol'></div>

	
<div id='PhidgetsHolder'>



</div>









?>



	
	</div>	



	
	<script>

	function Send(){ 
		
		

		var Password = $('#Password').val();

		var Username = $('#Username').val();
		
	
	jQuery.ajax({
	//Send request
    type: "GET",
	contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Authenticate/Login.php",
		data:{"password": Password,          "username": Username         },
    //If successfully sent then book created else book has not been         
	success: function (data, status, jqXHR) {
		
		if(data[0].LoginSuccess === "true"){
			document.cookie ="LoggedInString=" + data[0].LoggedInString + "; expires=Thu, 18 Dec 2015 12:00:00 UTC + ;path=/";
			document.cookie ="HouseID=" + data[0].HouseID + "; expires=Thu, 18 Dec 2015 12:00:00 UTC + ;path=/";
			document.cookie ="UserID=" + data[0].UserID + "; expires=Thu, 18 Dec 2015 12:00:00 UTC + ;path=/";
			window.location.href = "http://www.fluidityhome.me/Siter/App.php";
		}
		if(data[0].LoginSuccess === "false"){
			alert("Incorrect Details");
		}
		
		 
	
				
				 

	
	},
         error: function (jqXHR, status) {
			console.log("meow error"+status)
         }
}
				);
					   }
	


    $("#buttoner").click(function(){
		$( "#Error" ).empty();
        Send();
		console.log("emwo");
    });
		
		
		

</script>
</div>
		</div></div>
</body>
</html>
