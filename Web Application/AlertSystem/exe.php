

<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);



//Get Database Classes from the DatabaseConnector.php
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
	

	
if($SentTempAlert == 0){
	
	if($TempLow != "NULL" && $TempHigh != "NULL"){
CheckTemp($HouseID,$TempLow,$TempHigh,$RowID);
	}
	}
//Check Light
	if($LightTime != "NULL"){
	CheckLight($HouseID,$RowID,$LightTime);
	}
	if($row['Curtains'] != "NULL"){
	CheckCurtains($HouseID,$RowID,$CurtainsTime);
	}
	if($row['Door'] != "NULL"){
	CheckDoorLock($HouseID,$RowID,$DoorTime);
	}
}
	
}


//Create a new database connection

function Checktime($time){
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


function CheckLight($houseID,$hour1){
	
			if(CheckTime($DoorTime) == 1){
	$query2  = "SELECT * FROM Devices WHERE DeviceID = 9 AND HouseID=".$HouseID;
$result2 = mysql_query($query2) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)) {
		
		if($row['Status'] <= 500){	
			echo "Warn User";
			
			$query  = "INSERT INTO `AlertNotifications` (`HouseID`, `Device`, `Status`, `Time`, `Notification`, `NotificationID`) VALUES ('".$HouseID."', '9', '1', '2015-03-20 00:00:00', '1', '1') ";
			
			$result3 = mysql_query($query) or die(mysql_error());
			
			$query  = "UPDATE `AlertConfig` SET SentDoorAlert = 1 WHERE ID ='".$RowID."'" ;
$result = mysql_query($query) or die(mysql_error());
		}else{
			echo "No Warning! Temprature inside home is ".$row['Status'].". This is inside the set range of ".$TempLow."C-".$TempHigh."C." ;

		}
}
	
	}
	
	
}

function CheckDoorLock($houseID,$RowID,$CurtainsTime ){
		if(CheckTime($DoorTime) == 1){
	$query2  = "SELECT * FROM Devices WHERE DeviceID = 9 AND HouseID=".$HouseID;
$result2 = mysql_query($query2) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)) {
		
		if($row['Status'] <= 500){	
			echo "Warn User";
			
			$query  = "INSERT INTO `AlertNotifications` (`HouseID`, `Device`, `Status`, `Time`, `Notification`, `NotificationID`) VALUES ('".$HouseID."', '9', '1', '2015-03-20 00:00:00', '1', '1') ";
			
			$result3 = mysql_query($query) or die(mysql_error());
			
			$query  = "UPDATE `AlertConfig` SET SentDoorAlert = 1 WHERE ID ='".$RowID."'" ;
$result = mysql_query($query) or die(mysql_error());
		}else{
			echo "No Warning! Temprature inside home is ".$row['Status'].". This is inside the set range of ".$TempLow."C-".$TempHigh."C." ;

		}
}
	
	}
	
	
	
}

function CheckCurtains($houseID,$RowID,$CurtainsTime ){
	if(CheckTime($CurtainsTime) == 1){
	$query2  = "SELECT * FROM Devices WHERE DeviceID = 1 AND HouseID=".$HouseID;
$result2 = mysql_query($query2) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)) {
		
		if($row['Status'] <= 500){	
			echo "Warn User";
			
			$query  = "INSERT INTO `AlertNotifications` (`HouseID`, `Device`, `Status`, `Time`, `Notification`, `NotificationID`) VALUES ('".$HouseID."', '1', '1', '2015-03-20 00:00:00', '1', '1') ";
			
			$result3 = mysql_query($query) or die(mysql_error());
			
			$query  = "UPDATE `AlertConfig` SET SentCurtainsAlert = 1 WHERE ID ='".$RowID."'" ;
$result = mysql_query($query) or die(mysql_error());
		}else{
			echo "No Warning! Temprature inside home is ".$row['Status'].". This is inside the set range of ".$TempLow."C-".$TempHigh."C." ;

		}
}
	
	}
	
}

//Get parameters
function CheckTemp($HouseID,$TempLow,$TempHigh,$RowID){
$query2  = "SELECT * FROM Devices WHERE DeviceID = 4 AND HouseID=".$HouseID;
$result2 = mysql_query($query2) or die(mysql_error());
	while($row = mysql_fetch_assoc($result2)) {
		
		if($row['Status'] <= $TempLow | $row['Status'] >= $TempHigh){	
			echo "Warn User";
			
			$query  = "INSERT INTO `AlertNotifications` (`HouseID`, `Device`, `Status`, `Time`, `Notification`, `NotificationID`) VALUES ('".$HouseID."', '4', '1', '2015-03-20 00:00:00', '1', '1') ";
			
			$result3 = mysql_query($query) or die(mysql_error());
			
			$query  = "UPDATE `AlertConfig` SET SentTempAlert = 1 WHERE ID ='".$RowID."'" ;
$result = mysql_query($query) or die(mysql_error());
		}else{
			echo "No Warning! Temprature inside home is ".$row['Status'].". This is inside the set range of ".$TempLow."C-".$TempHigh."C." ;

		}
}
}






?>


