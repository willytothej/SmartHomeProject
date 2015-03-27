<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$houseID = $_GET['houseid'];
$status = $_GET['value'];
$userid = $_GET['userid'];
$stringkey = $_GET['stringkey'];

$response = array();

$root = realpath($_SERVER["DOCUMENT_ROOT"]);


require_once($root."/Database/DatabaseConnector.php");

$db = new DB_CONNECT();



$result2 = mysql_query('SELECT * FROM LoggedInSessions WHERE UserID= '.$UserID. ' AND UserIDString = "'.$StringKey.'"');
	
if(mysql_num_rows($result2) > 0) {


if(isset($houseID) && isset($status)){		
	$result = mysql_query("UPDATE `House` SET `UniqueCardID` = '". $status . "' WHERE `HouseID`='" .$houseID. "'");
}

$result = mysql_query("SELECT `UniqueCardID` FROM `House` Where `HouseID` = '" .$houseID. "'");

$rows = array();

while($r = mysql_fetch_object($result)) {
    $rows[] = $r;
}
}
print json_encode($rows);
?>