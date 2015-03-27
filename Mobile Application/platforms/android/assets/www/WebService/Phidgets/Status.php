<?php
header("Access-Control-Allow-Origin: *");
//Specify that page will be in JSON format
header("Content-Type: application/json; charset=UTF-8");
//Create an array for the response
$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/WebService/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters
$id = $_GET['ID'];
$status = $_GET['Status'];
//Execute mysql query and insert in $result
           $result = mysql_query("SELECT * FROM PhidgetData");
//Output error if no Phidget results returned
if(!$result){
	echo "No Phidgets in database";
}
//Create an array
$rows = array();
//Create first part of JSON output from standard Phidget database
while($r = mysql_fetch_object($result)) {
    $rows[] = $r;
}
//Execute mysql query on TemporaryRFID database
$result = mysql_query("SELECT * FROM TemporaryRFID");	
if(!$result){
	echo "Phidget Database incorrectly configured";
}
$rows2 = array();
while($r = mysql_fetch_object($result)) {
    $rows2[] = $r;
}
//Execute mysql query on Slider database
            $result = mysql_query("SELECT * FROM Slider");
if(!$result){
	echo "Phidget Database incorrectly configured";
}
$rows3 = array();
while($r = mysql_fetch_object($result)) {
    $rows3[] = $r;
}
//Merge json Vars together
$res = array_merge_recursive( $rows, $rows2, $rows3 );
$resJson = json_encode( $res );
//Output merged JSON
print $resJson;
?>