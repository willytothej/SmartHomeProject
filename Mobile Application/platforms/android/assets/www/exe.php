

<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);



//Get Database Classes from the DatabaseConnector.php
require_once($root."/Database/DatabaseConnector.php");

    $db = new DB_CONNECT();
$query  = "SELECT * FROM AlertConfig";
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_assoc($result)) {
	CheckTemp($row['UserID'],$row['TempLow'],$row['TempHigh']);
}


//Create a new database connection

//Get parameters
function CheckTemp($UserID,$TempLow,$TempHigh){
$query  = "SELECT * FROM Devices WHERE DeviceID = 4 AND UserID=".$UserID;
$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) {
		if($row['Status'] <= $TempLow | $row['Status'] >= $TempHigh){	
			echo "Warn User";
		}else{
			echo "No Warning! Temprature inside home is ".$row['Status'].". This is inside the set range of ".$TempLow."C-".$TempHigh."C." ;
		}
}
}

function CheckTemp($UserID,$TempLow,$TempHigh){
$query  = "SELECT * FROM Devices WHERE DeviceID = 4 AND UserID=".$UserID;
$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) {
		if($row['Status'] <= $TempLow | $row['Status'] >= $TempHigh){	
			echo "Warn User";
		}else{
			echo "No Warning! Temprature inside home is ".$row['Status'].". This is inside the set range of ".$TempLow."C-".$TempHigh."C." ;
		}
}
}





?>


