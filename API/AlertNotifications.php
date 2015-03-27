<?php
$HouseID = $_GET['HouseID'];
$CheckNotification = $_GET['CheckNotifcation'];

	header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
//Create an array for the response
$response = array();

//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters

 $result = mysql_query("SELECT * FROM AlertNotifications WHERE HouseID='".$HouseID."'");
if($CheckNotification == 1){
$num_rows = mysql_num_rows($result);	
	$arr = array('Noti' => $num_rows);

echo"[". json_encode($arr, JSON_PRETTY_PRINT)."]";
}else{

//Execute mysql query and insert in $result
          
//Output error if no Phidget results returned
if(!$result){
	echo "No Alerts! Lucky you!";
}
//Create an array
$rows = array();
//Create first part of JSON output from standard Phidget database
while($r = mysql_fetch_object($result)) {
    $rows[] = $r;
}



echo json_encode($rows, JSON_PRETTY_PRINT);
	
}


?>