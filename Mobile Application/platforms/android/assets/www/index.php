<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?php echo time();?>"></script>	 
<head>
	<title>Smart Home</title>
<link rel="stylesheet" type="text/css" href="/meow.css?<?php echo time();?>">
<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<?php include_once("analyticstracking.php") ?>
<link rel="icon" 
      type="image/png" 
      href="http://www.insertcoinhere.me/image/favicon.ico">
</head>
<body>
<?php
	
	require_once("nav.php");
	
	
	?>
	
<div id='backimage'><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<center><img width="200px" height="200px" src="http://www.fluidityhome.me/New/img/LOGO-Fluidity.png" ></center>
	</div>
	
	
<div id='content'>
	
		<div id='login'>
<?php include 'login.php';?>
	</div>
	<div id='AboutUs'>
	<p>
		<div id='logocontainer'>
			<div id='logoholder'>
		<img src="http://designmodo.github.io/Flat-UI/img/icons/svg/loop.svg" >	
			</div>
			<div id='title'>
				<h1>About Us</h1>
			</div>
		</div>
		</p>
		Fluidity home is a product designed to help the elderly and people with disabilities. 
	It zones in on making their lifes easier with the power of technology. It also strives to create a 
	platform where family members and carers can look after their loved ones. We have developed technologies that
	automate the lifes of its users to ensure that they are aways safe and cared for. We have made a comprehensive suite of 
	technologies that help carers monitor and look after people. 
</div>
	<div id='API'>
			<p>
		<div id='logocontainer'>
			<div id='logoholder'>
		<img src="http://designmodo.github.io/Flat-UI/img/icons/svg/map.svg" >	
			</div>
			<div id='title'>
				<h1>API</h1>
			</div>
		</div>
		</p>
		Design Phidget Sensors.
Design and implement Backend and Frontend Server.
Design a web service with the Backend server and Frontend Server.
Develop android application that communicates with web service.
Develop smart-watch application that communicates with web service.
Ensure that communications between servers and applications are encrypted and secure.
Gather user requirements and express them as user stories.
Make all interfaces simple and intuitive for maximum ease of use
	</div>
<div id='backgroundtrading'>
		<div id='Application'>
		<p>
		<div id='logocontainer'>
		<div id='logoholder'>
		<img src="http://designmodo.github.io/Flat-UI/img/icons/svg/compas.svg" >	
			</div>
			<div id='title'>
				<h1>Application</h1>
			</div>
		</div>
		</p>
		Design Phidget Sensors.
Design and implement Backend and Frontend Server.
Design a web service with the Backend server and Frontend Server.
Develop android application that communicates with web service.
Develop smart-watch application that communicates with web service.
Ensure that communications between servers and applications are encrypted and secure.
Gather user requirements and express them as user stories.
Make all interfaces simple and intuitive for maximum ease of use
</div>
</div>
<div id='ContactUs'>
		<p>
		<div id='logocontainer'>
			<div id='logoholder'>
		<img src="http://designmodo.github.io/Flat-UI/img/icons/svg/mail.svg" >	
			</div>
			<div id='title'>
				<h1>Contact Us</h1>
			</div>
		</div>
		</p>
	Design Phidget Sensors.
Design and implement Backend and Frontend Server.
Design a web service with the Backend server and Frontend Server.
Develop android application that communicates with web service.
Develop smart-watch application that communicates with web service.
Ensure that communications between servers and applications are encrypted and secure.
Gather user requirements and express them as user stories.
Make all interfaces simple and intuitive for maximum ease of use
</div>
	</div>
	</div>
<script>
	$(document).ready(function() {
	$("#login").hide();
		
});
function meow(){
	if ( $('#login').is(':visible') ){
		
		$("#login").hide();	
		
	}else{
		$("#login").show();	
		document.getElementById('login').scrollIntoView();
		
	}
			
			}
</script>
</body>
</html>