<?php


$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/Database/DatabaseConnector.php");
    $db = new DB_CONNECT();
$query  = "SELECT * FROM AlertConfig";

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_assoc($result)) {
if($row['Active'] == 1){
$HouseID = $row['HouseID'];
$TempLow = $row['TempLow'];
$TempHigh = $row['TempHigh'];
$LightTime = $row['Light'];
$CurtainsTime = $row['Curtains'];
$DoorTime = $row['Door'];
$RowID = $row['ID'];
$SentTempAlert = $row['SentTempAlert'];
$SentLightAlert = $row['SentLightAlert'];
$SentDoorAlert = $row['SentDoorAlert'];
$SentCurtainsAlert = $row['SentCurtainsAlert'];
	
if($SentTempAlert == 0){
	if($TempLow != "NULL" && $TempHigh != "NULL"){
CheckTemp($HouseID,$TempLow,$TempHigh,$RowID);}}
	
if($SentLightAlert == 0){
	if($LightTime != "NULL"){
	CheckLight($HouseID,$RowID,$LightTime);
	}
	}
	
if($SentCurtainsAlert == 0){
	if($row['Curtains'] != "NULL"){
	CheckCurtains($HouseID,$RowID,$CurtainsTime);
	}
	}
	
if($SentDoorAlert == 0){
	if($row['Door'] != "NULL"){
	CheckDoorLock($HouseID,$RowID,$DoorTime);
	}
	}
}
}
















//FUNCTIONS


function CheckTemp($HouseID,$TempLow,$TempHigh,$RowID){

$query2  = "SELECT * FROM Devices WHERE DeviceID = 4 AND HouseID=".$HouseID;
$result2 = mysql_query($query2) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)) {
	
		if($row['Status'] <= $TempLow | $row['Status'] >= $TempHigh){	

			SendTXT($row['DeviceID']);
			CreateNotification($HouseID,$row['DeviceID']);
			SetSent($row['DeviceID'],$RowID);
		}
}
}




function CheckCurtains($HouseID,$RowID,$AlertTimes ){
	
	if(CompareAlertTimes($AlertTimes) == 1){
	$query2  = "SELECT * FROM Devices WHERE DeviceID = 1 AND HouseID=".$HouseID;
$result2 = mysql_query($query2) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)) {

		if($row['Status'] >= 500){	
		SendTXT($row['DeviceID']);
			CreateNotification($HouseID,$row['DeviceID']);
	
			SetSent($row['DeviceID'],$RowID);	
		}
}
	
	}
	
}


function CheckLight($HouseID,$RowID,$AlertTimes){
			if(CompareAlertTimes($AlertTimes) == 1){
$query2  = "SELECT * FROM Devices WHERE DeviceID = 8 AND HouseID=".$HouseID;
$result2 = mysql_query($query2) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)) {
		if($row['Status'] == 1){	
			SendTXT($row['DeviceID']);
			CreateNotification($HouseID,$row['DeviceID']);
			SetSent($row['DeviceID'],$RowID);
		
		}
		}
	}
}



function CheckDoorLock($HouseID,$RowID,$AlertTimes){
		if(CompareAlertTimes($AlertTimes) == 1){
			$query2  = "SELECT * FROM Devices WHERE DeviceID = 9 AND HouseID=".$HouseID;
$result2 = mysql_query($query2) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)) {
		if($row['Status'] <= 500){	
				SendTXT($row['DeviceID']);
			CreateNotification($HouseID,$row['DeviceID']);
		
			SetSent($row['DeviceID'],$RowID);
		}
}
	}
}


//UTILITIES

function CompareAlertTimes($time){
	$hourinput=substr($time, 0, 2);
	$hourinput2 =substr($time, 2, 2);
	$dt = new DateTime();
	$hour = $dt->format('H');
	$minute = $dt->format('i');
	$hour = $hour + 7;
	if($hour >= $hourinput && $hour <= $hourinput2){
		return 1;
	}else{
		return 0;
	}
}


function Gettime(){
	$dt = new DateTime();
	$hour = $dt->format('H');
	$minute = $dt->format('i');
	$hour = $hour + 7;
	return $hour . ":". $minute;
}


function CreateNotification($HouseID,$Device){
	$query  = "INSERT INTO `AlertNotifications` (`HouseID`, `Device`, `Time`) VALUES ('".$HouseID."', '".$Device."', '".Gettime()."') ";
	$result3 = mysql_query($query) or die(mysql_error());
	
}

function SetSent($DeviceID,$RowID){
	switch ($DeviceID) {
    case 8:
         $query  = "UPDATE `AlertConfig` SET SentLightAlert = 1 WHERE ID ='".$RowID."'" ;
        break;
    case 9:
		
         $query  = "UPDATE `AlertConfig` SET SentDoorAlert = 1 WHERE ID ='".$RowID."'" ;
        break;
	case 1: 
		$query  = "UPDATE `AlertConfig` SET SentCurtainsAlert = 1 WHERE ID ='".$RowID."'" ;
		break;
	case 4: 

		$query  = "UPDATE `AlertConfig` SET SentTempAlert = 1 WHERE ID =".$RowID."" ;
		break;
			
}
	$result = mysql_query($query) or die(mysql_error());
}


function SendTXT($MessageCode){
	

	switch ($MessageCode) {
    case 8:
        $message  = "This is a message from FLHome - Light is ON when meant to be off";
        break;
    case 9:
            $message  = "This is a message from FLHome - Door Lock is unlocked when meant to be locked";
        break;
	case 1: $message  = "This is a message from FLHome - Curtains are open when meant to be closed";
		break;
	case 4: $message  = "This is a message from FLHome - Temprature is out of range!";
		break;
		
}
	
				echo "Sending Alert";
	// Textlocal account details
	// Authorisation details.
	$username = "creativewilly@gmail.com";
	$hash = "5c1853ed8ad832f7255b1c87080f88e9c1d85452";
	// Configuration variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender = "FludityHome"; // This is who the message appears to be from.
	$numbers = "447846921127"; // A single number or a comma-seperated list of numbers
	
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
}












?>