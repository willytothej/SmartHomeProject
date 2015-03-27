<?php
header("Access-Control-Allow-Origin: *");
//Specify that page will be in JSON format
header("Content-Type: application/json; charset=UTF-8");
//Get parameters from URL
$id = $_GET['ID'];
$status = $_GET['Status'];
//Create an array for the response
$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/WebService/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Check if ID and Status have been passed then update accordingly
if(isset($_GET['ID']) && isset($_GET['Status'])){	
	$result = mysql_query("UPDATE `PhidgetData` SET `DeviceStatus` = '". $_GET['Status'] . "' WHERE `PhidgetID`='" . $_GET['ID']. "'");
}
//Mysql query to check phidgets
$result = mysql_query("SELECT * FROM PhidgetData");
//Create an array for the response
$rows = array();
//Loop through results and insert into $rows
while($r = mysql_fetch_object($result)) {
    $rows[] = $r;
}
//Output $row in JSON fomat
print json_encode($rows);
?>