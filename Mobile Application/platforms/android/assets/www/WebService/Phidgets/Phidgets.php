<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$id = $_GET['userid'];
$status = $_GET['value'];
$port = $_GET['port'];

settype($status, "integer");

$response = array();

$root = realpath($_SERVER["DOCUMENT_ROOT"]);


require_once($root."/WebService/Database/DatabaseConnector.php");

$db = new DB_CONNECT();

if(isset($id) && isset($status) && isset($port)){		
	$result = mysql_query("UPDATE `Devices` SET `Status` = '". $status . "' WHERE `DeviceID`='" . $port . "' AND `UserID`='" .$id. "'");
	if($port == 1)
	{
		$ReadStatus = ($status / 999 * 180);
		settype($ReadStatus, "integer");
		$result = mysql_query("UPDATE `Devices` SET `Status` = '". $ReadStatus  ."' WHERE `DeviceID`=11 AND `UserID`='". $id ."'");
	}
	if($port == 2)
	{
		$ReadStatus = ($status / 999 * 180);
		settype($ReadStatus, "integer");
		$result = mysql_query("UPDATE `Devices` SET `Status` = '". $ReadStatus  ."' WHERE `DeviceID`=12 AND `UserID`='". $id ."'");
	}
	
	if($port == 4)
	{
		$ReadStatus = (($status * 0.2222) - 61.1111);
		settype($ReadStatus, "integer");
		$result = mysql_query("UPDATE `Devices` SET `Status` = '". $ReadStatus  ."' WHERE `DeviceID`='". $port. "' AND `UserID`='". $id ."'");
		if($ReadStatus < 16)
		{
			$result = mysql_query("UPDATE `Devices` SET `Status` = 0 WHERE `DeviceID`=10 AND `UserID`='". $id ."'");
		}
		else if($ReadStatus < 28)
		{
			$result = mysql_query("UPDATE `Devices` SET `Status` = 180 WHERE `DeviceID`=10 AND `UserID`='". $id ."'");
		}
		else
			{
			$result = mysql_query("UPDATE `Devices` SET `Status` = 90 WHERE `DeviceID`=10 AND `UserID`='". $id ."'");
		}	
	}
	if($port == 6)
	{
		if($status == 0){
			
		$result = mysql_query("UPDATE `Devices` SET `Status` = 180 WHERE `DeviceID`=9 AND `UserID`='". $id ."'");
		}
		else{
		$result = mysql_query("UPDATE `Devices` SET `Status` = 0 WHERE `DeviceID`=9 AND `UserID`='". $id ."'");

		}
	}
}

$result = mysql_query("SELECT * FROM Devices");

$rows = array();

while($r = mysql_fetch_object($result)) {
    $rows[] = $r;
}

print json_encode($rows);
?>