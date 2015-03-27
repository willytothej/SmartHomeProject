<?php
$UserID = $_GET['UserID'];
header("Access-Control-Allow-Origin: *");
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

//Execute mysql query and insert in $result
           $result = mysql_query("SELECT * FROM Devices WHERE UserID=".$UserID);
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




echo json_encode($rows, JSON_PRETTY_PRINT);

?>