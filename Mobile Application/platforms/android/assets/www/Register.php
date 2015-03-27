<?php 

	$response = array();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/Database/DatabaseConnector.php");
    $db = new DB_CONNECT();

if (isset($_GET['FirstName'])&&isset($_GET['LastName'])&&isset($_GET['UserName'])&&isset($_GET['EmailAddress'])&&isset($_GET['Password'])){
	$FirstName = $_GET['FirstName'];
	$LastName = $_GET['LastName'];
	$UserName = $_GET['UserName'];
	$EmailAddress = $_GET['EmailAddress'];
	$Password = $_GET['Password'];
	$result = mysql_query("INSERT INTO `Users`( `Username`, `FirstName`, `LastName`, `Password`, `Email`, `Type`) VALUES ('". $UserName. "','". $FirstName. "','". $LastName. "','". $Password. "','". $Email. "','". $Type. "')") or die(mysql_error());
	if($result)
{
echo "Success";
$result = mysql_query("SELECT * FROM `Users` WHERE `Username` = '". $UserName . "' AND `Password`= '". $Password. "'");
		if($result)
{
			$rs = mysql_fetch_array($result);
			if (mysql_num_rows($result) > 0){
				$UserID = $rs["UserID"];
			}
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'1','CurtainLeftSlider','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'2','CurtainRightSlider','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'3','PhillipsHueDimer','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'4','TempratureSensor','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'5','DoorLockSensor','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'6','DoorButton','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'7','FloorVibrationSensor','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'8','LightSwitch','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'9','DoorLockMotor','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'10','TempratureIndicatorMotor','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'11','CurtainLeftMotor','NULL')");
			$result = mysql_query("INSERT INTO `Devices`(`UserID`, `DeviceID`, `Name`, `Status`) VALUES (".$UserID.",'12','CurtainRightMotor','NULL')");
			$result = mysql_query("INSERT INTO `AlertConfig`(`UserID`, `Mobile`, `Email`, `Phone`, `TempLow`, `TempHigh`) VALUES (".$UserID.",0,0,0,0,0)");
		echo "Completed";
		}
		
}
else
{
echo "Error";

}
	
	
	
	
}






?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?php echo time();?>"></script>	 
<head>
	<title>Smart Home</title>
	<style>input, textarea { 
    padding: 9px; 
    border: solid 1px #E5E5E5; 
    outline: 0; 
    font: normal 13px/100% Verdana, Tahoma, sans-serif; 
    width: 200px; 
    background: #FFFFFF; 
    } 
   
textarea { 
    width: 400px; 
    max-width: 400px; 
    height: 150px; 
    line-height: 150%; 
    } 
   
input:hover, textarea:hover, 
input:focus, textarea:focus { 
    border-color: #C9C9C9; 
    } 
   
.form label { 
    margin-left: 10px; 
    color: #999999; 
    } 
   
.submit input { 
    width: auto; 
    padding: 9px 15px; 
    background: #617798; 
    border: 0; 
    font-size: 14px; 
    color: #FFFFFF; 
    }</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
	

	
	
<div id='content'>
<br /><br /><br />
	
	
	<div id='Application'>
		<p>
		<div id='logocontainer'>
		<div id='logoholder'>
		<img src="http://designmodo.github.io/Flat-UI/img/icons/svg/compas.svg" >	
			</div>
			<div id='title'>
				<h1>Register</h1>
			</div>
		</div>
	
	<br />
<form class="form"> 
   
    <p class="name"> 
		     <label for="name">First Name</label> 
        <input type="text" name="FirstName" id="FirstName" /> 
   
    </p> 
   
    <p class="email">    <label for="email">Last Name</label> 
        <input type="text" name="LastName" id="LastName" /> 
     
    </p> 
   
    <p class="web">    <label for="email">User Name</label> 
        <input type="text" name="UserName" id="UserName" /> 

    </p> 
      <p class="web">    <label for="email">Email Address</label> 
        <input type="text" name="EmailAddress" id="EmailAddress" /> 

    </p> 
	   <p class="web">    <label for="email">Password</label> 
        <input type="text" name="Password" id="Password" /> 

    </p> 
    
   <center> <div class="g-recaptcha" data-sitekey="6Le6-QETAAAAANbUfn_7KxOAv84jf-daCJVY-sPW"></div></center>
    <p class="submit"> 
        <input type="submit" value="Send" /> 
    </p> 
   
</form>
	
	</div>
<script>
	
	
	var UserName = $('#UserName').val();
	var Password = $('#Password').val();
	$.get( "Check.php?username="+UserName+"&password="+Password, function( data ) {
window.location.replace("http://stackoverflow.com");
	} );
	
	
	
	
	
	
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