

<?php

//Create an array for the response
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

$StringKey = $_GET['loginstring'];
$HouseID = $_GET['houseid'];

$response = array();
require_once($root."/Database/DatabaseConnector.php");
$db = new DB_CONNECT();
//Set root path of the web server
//include 'Check.php';


	$result2 = mysql_query("SELECT * FROM AlertConfig WHERE HouseID = '" . $HouseID . "'") or die(mysql_error());	
			
					$rows2 = array();
while($r = mysql_fetch_object($result2)) {
    $rows2[] = $r;
}

print json_encode($rows2);



?>
	
	
	
	




