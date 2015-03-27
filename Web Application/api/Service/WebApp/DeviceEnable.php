<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

$id = $_GET['houseid'];
$status = $_GET['value'];
$port = $_GET['port'];
$StringKey = $_GET['loginstring'];
$UserID = $_GET['userid'];

settype($status, "integer");
$response = array();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/Database/DatabaseConnector.php");
$db = new DB_CONNECT();


$result2 = mysql_query('SELECT * FROM LoggedInSessions WHERE UserID= '.$UserID. ' AND UserIDString = "'.$StringKey.'"');
	
if(mysql_num_rows($result2) > 0) {


if(isset($id) && isset($status) && isset($port)){		
	$result = mysql_query("UPDATE `Devices` SET `Active` = '". $status . "' WHERE `DeviceID`='" . $port . "' AND `HouseID`='" .$id. "'");
	
}

$result = mysql_query("SELECT * FROM Devices");

$rows = array();

while($r = mysql_fetch_object($result)) {
    $rows[] = $r;
}
}

echo json_encode($rows, JSON_PRETTY_PRINT);
?>