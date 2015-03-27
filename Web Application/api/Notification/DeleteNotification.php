<?php

$HouseID = $_GET['HouseID'];
$StringKey = $_GET['loginstring'];
$UserID = $_GET['userid'];
$RowID = $_GET['RowID'];

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

$response = array();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/Database/DatabaseConnector.php");
$db = new DB_CONNECT();



$result2 = mysql_query("SELECT * FROM LoggedInSessions WHERE UserID= '".$UserID."' AND UserIDString = '".$StringKey."'");

if(mysql_num_rows($result2) > 0) {

$result4 = mysql_query("SELECT * FROM AlertNotifications WHERE HouseID=".$HouseID." AND UniqueID=".$RowID);
while($row = mysql_fetch_assoc($result4)) {	

	$DevNum = $row['Device'];
		echo $DevNum;
		switch ($DevNum) {
    case 8:
					echo "RUNNING 8";
         $query  = "UPDATE `AlertConfig` SET SentLightAlert = 0 WHERE HouseID ='".$HouseID."'" ;
        break;
    case 9:
				echo "RUNNING 9";
         $query  = "UPDATE `AlertConfig` SET SentDoorAlert = 0 WHERE HouseID ='".$HouseID."'" ;
        break;
	case 1: 
					echo "RUNNING 1";
		$query  = "UPDATE `AlertConfig` SET SentCurtainsAlert = 0 WHERE HouseID ='".$HouseID."'" ;
		break;
	case 4: 
		echo "RUNNING 4";
		$query  = "UPDATE `AlertConfig` SET SentTempAlert = 0 WHERE HouseID =".$HouseID."" ;
		break;			
}
	mysql_query($query) or die(mysql_error());
}

	$result = mysql_query("DELETE FROM AlertNotifications WHERE HouseID=".$HouseID." AND UniqueID=".$RowID);
	
if(!$result){
	echo "No Phidgets in database";
}

}

echo"[{\"Perfect\":\"isggood\"}]";

?>