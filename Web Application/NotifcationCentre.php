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

	

	<script>
	function get_cookie ( cookie_name )
{
  // http://www.thesitewizard.com/javascripts/cookies.shtml
  var cookie_string = document.cookie ;
  if (cookie_string.length != 0) {
    var cookie_value = cookie_string.match ( '(^|;)[\s]*' + cookie_name + '=([^;]*)' );
    return decodeURIComponent ( cookie_value[2] ) ;
  }
  return '' ;
}
		
		jQuery.ajax({
	//Send request
    type: "GET",
	contentType: "application/json",
         url: "http://www.fluidityhome.me/api/Notification/Notification.php",
		data:{"loginstring": "sizL37CPb6OMWVLL4x7QLHkj5Lf9wCXZVxLZEnOQuDCqyocDWktH1N06zff6Sd6NKRMofBfJeSaNgnqcHTUIHUPh94o1iuP2mCqBeGltyvgOTG1BAVjiQ9A0eY1wtRyPtZrIFMbdir2c84NJ061QgCQuAS04JyUdxlWc87pqzrCHwprwwsmM4dgF5hKPPE3mZZz86YyFqbnWBOs8hPVm2c27tMXjq0FqZey6d7LDj9AVY34fSZCVcE3Gq0ZR1Ei0TR66ZSKi2le0oighiSduxgbYhaQiO8jIZqPZjzimVwmjPDB7wOC35N2nXSFM0Zv0qkZJUi5POs9E6KLDzoGEcJ2aBIWCHsC7MCRGUXwJqFnxp9aZxRDKAGUboRN5jqd525MX2iHtX40neamM10wCGqN4hBaA1nG4tt1wMJZKN072buOdukPbLCf2dqDfOkjhOlNA4NlSNtUZXJcs31DPETRSjv77QrpEMdfR0AKO3FN1o0ts17hF09ykEFsu7R8T5oL5YvU2bI3zIx1KEjqEsYZ6ErBLjKFo8qu7Wp977dHQKJAo213uZ2BDtdpNX4b5vGds5nAdAh3k0EJ3FMyEOaiinH6kMhqhYEK31kgBBkWCYFGDseihpBAMjG76YynWc80eshP4BMHAsneUCwc18MOssVyruWnH4nVwELBgxiQZG4UiB7kKT8cm4KNyGbfKyahdVSutbktRpo90vtKpBXLFHzenKt8jEqwAi14ulxlLWuLrYwQAtCgbcuzWYIfD8MerNiV9PgULLGdJd4kHHAST5rP495HiRVJFdEO3UJPGq3pD7KkOlcIqEyuODc6v8QamuZppJf59ivMpf6eAjX1YvwN8IUDRKOdeNCEwSJFafsAuyP5SM7RhDEpmy3diRqxE3cbVWR6bjHGSwMKiTBAwg0TO367VxFzARLwOCDZVkGOQsy9laJSrJLfNRnIp3i0V4wJGaICupqlRZvdae5BYRRMJeu8iN8dRFWyP",            "userid": "1"          },
    //If successfully sent then book created else book has not been         
	success: function (data, status, jqXHR) {
		
			$.each(data, function(i) {
    alert(data[i].Device);
});
	}});
	
	
	
	</script>
	
<div id='content'>
<center>
	<style type="text/css">
		top:50px;
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;border-top-width:1px;border-bottom-width:1px;}
</style>
<table class="tg">
  <tr>
    <th class="tg-031e">Notifications</th>
    <th class="tg-031e">Notifications</th>
    <th class="tg-031e">Notifications</th>
    <th class="tg-031e">Notifications</th>
  </tr>
  <tr>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
  </tr>
  <tr>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
  </tr>
  <tr>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
    <td class="tg-031e">Notifications</td>
  </tr>
</table>
		
</center>


<div id='sidecontrol'><center><div id='ProfileButton'>
	<div class='textside'>My Profile</div></div><div id='ProfileButton'><div class='textside'>My Profile</div>
	</div><div id='ProfileButton'><div class='textside'>My Profile</div></div><div id='ProfileButton'><div class='textside'>My Profile</div></div><div id='bottomlogo'>
	<img  src="http://www.fluidityhome.me/image/logoside.png" ></center></div></div>

	




	
	</div>	



	

</div>
		</div></div>
</body>
</html>