<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?php echo time();?>"></script>	 
<head>
	<title>ProfitBot</title>
<link rel="stylesheet" type="text/css" href="/meow2.css?<?php echo time();?>">
<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<?php include_once("analyticstracking.php") ?>
<link rel="icon" 
      type="image/png" 
      href="http://www.insertcoinhere.me/image/favicon.ico">
</head>
<body>

	

<style>
	
	
	</style>

	

	
<div id='nav'>
		
	<div id='navtext'>
		
		<ul>
  <li><a href="http://www.insertcoinhere.me/#">Home</a></li>
  <li><a href="javascript:meow()">Log-in</a></li>
  <li>Register</li>
  <li><a href="http://www.insertcoinhere.me/#AboutUs">About Us</a></li>
	<li><a href="http://www.insertcoinhere.me/forum">Forum</a></li>
			<li><a href="javascript:showbot()">Application</a></li>
			<li><a href="http://www.insertcoinhere.me/#ContactUs">Contact Us</a></li>
</ul>
	</div>
	</div>
	<iframe width src="http://www.insertcoinhere.me/forum/" style="border: 0; position:absolute; top:0; left:0; right:0; bottom:0; width:100%; height:100%"></iframe>
	


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
	
	
			$(document).ready(function() {
$("#login").hide();
				$("#Application").hide();
		
});
		


		
		function showbot(){
	if ( $('#Application').is(':visible') ){
			$("#Application").hide();	
		$("#API").show();	
		$("#AboutUs").show();	
	
		
	}else{
			$("#Application").hide();	
		$("#API").hide();	
		$("#AboutUs").hide();	
		$("#Application").show();	
		document.getElementById('Application').scrollIntoView();
		
	}
			
			}
			
			
		
		
	
	


	


	</script>
</body>
</html>