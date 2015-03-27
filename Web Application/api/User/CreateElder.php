





<?php 

	$response = array();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/Database/DatabaseConnector.php");
    $db = new DB_CONNECT();
//Check if registion is for elderly or carer
$create = 1;


//Create Elderly
	
//Check if parameters passed
if (isset($_GET['FirstName'])&&isset($_GET['LastName'])&&isset($_GET['UserName'])&&isset($_GET['EmailAddress'])&&isset($_GET['Password'])){
	$FirstName = $_GET['FirstName'];
	$LastName = $_GET['LastName'];
	$UserName = $_GET['UserName'];
	$EmailAddress = $_GET['EmailAddress'];
	$Password = $_GET['Password'];
//Create User
	$CheckUserName = mysql_query("SELECT * FROM `Users` WHERE `Username` = '". $UserName . "'");
if(mysql_num_rows($CheckUserName) >= 1){
	echo "[{\"Username\":\"0\",";
	$username = 0;
	$create = 0;	
}else{
	echo "[{\"Username\":\"1\",";
}
	$CheckEmailAddress = mysql_query("SELECT * FROM `Users` WHERE `Email` = '". $EmailAddress . "'");
if(mysql_num_rows($CheckEmailAddress) >= 1){
	echo "\"Email\":\"0\"}]";
	$email = 0;
	$create = 0;
}else{
	echo "\"Email\":\"1\"}]";
}
	
	
	if($create == 1){
	$result = mysql_query("INSERT INTO `Users`( `Username`, `FirstName`, `LastName`, `Password`, `Email`, `Type`) VALUES ('". $UserName. "','". $FirstName. "','". $LastName. "','". $Password. "','". $EmailAddress. "','". $Type. "')") or die(mysql_error());
	if($result)
{
 //Get User ID

	$UserIDD = mysql_query("SELECT * FROM `Users` WHERE `Username` = '". $UserName . "'");
	
		$numrows = mysql_num_rows($UserIDD);
	if (mysql_num_rows($UserIDD) > 0){
		
		while($row = mysql_fetch_array($UserIDD)){
		$UserID = $row["UserID"];	
		}
		
		
	
			}
		
		

 function gethouseid(){
$a = mt_rand(100000,999999); 
	return $a;
}
		
		 function getUNIQUEcRDid(){
$a = mt_rand(100000,999999); 
	return $a;
}
				 function ConfirmCode(){
$a = mt_rand(100000,999999); 
	return $a;
}
$confirmcode = ConfirmCode();
 
 //Create house with User ID
	$result = mysql_query("INSERT INTO `House`(`HouseName`, `UniqueCardID`) VALUES ('Willyhamham house','".gethouseid()."')");
			if($result){
					
 $HouseID = mysql_insert_id();

	
	//Create permissions

				
$result = mysql_query("INSERT INTO `Permissions`(`UserID`, `HouseID`, `ConfirmCode`, `CanDelete`) VALUES ('".$UserID."','".$HouseID."','".$confirmcode."','1')") or die(mysql_error());


			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'1','CurtainSlider','NULL')") or die(mysql_error());

			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'2','FanSlider','NULL')") or die(mysql_error());
	
			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'3','PhillipsHueDimer','NULL')") or die(mysql_error());
			
			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'4','TempratureSensor','NULL')") or die(mysql_error());

			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'5','DoorLockSensor','NULL')") or die(mysql_error());
	
			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'6','DoorButton','NULL')") or die(mysql_error());

			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'7','FloorVibrationSensor','NULL')") or die(mysql_error());

			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'8','LightSwitch','NULL')") or die(mysql_error());

			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'9','DoorLockMotor','NULL')") or die(mysql_error());

			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'10','TempratureIndicatorMotor','NULL')") or die(mysql_error());
	
			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'11','CurtainMotor','NULL')") or die(mysql_error());

			$result = mysql_query("INSERT INTO `Devices`(`HouseID`, `DeviceID`, `Name`, `Status`) VALUES (".$HouseID.",'12','FanMotor','NULL')") or die(mysql_error());

			$result = mysql_query("INSERT INTO `AlertConfig`(`HouseID`) VALUES (".$HouseID.")") or die(mysql_error());


		
}
else
{
echo "Error";

}
	
	
	
	}
}

}





?>
