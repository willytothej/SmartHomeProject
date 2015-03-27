<?php $response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters
$houseid = $_GET['houseid'];
$cardid = $_GET['cardid'];
$StringKey = $_GET['loginstring'];
$UserID = $_GET['userid'];



$result2 = mysql_query('SELECT * FROM LoggedInSessions WHERE UserID= '.$UserID. ' AND UserIDString = "'.$StringKey.'"');
	
if(mysql_num_rows($result2) > 0) {
//Execute a mysql query to the database and store in $result
$result = mysql_query("SELECT * FROM House WHERE HouseID ='". $houseid ."' AND uniquecardid ='" . $cardid."'");
$rs = mysql_fetch_array($result);

//Check if Query brought back any results and either return userloggedin true or false
if (mysql_num_rows($result) > 0){
		$outp = "[";
		$outp .= '{"LoginSuccess":"'. "true"     . '",';
		$outp .= '"UserID":"'. $UserID     . '",';
		$outp .= '"HouseID":"'. $rs["HouseID"]     . '"}';
		$outp .="]";		
		echo $outp;
		}else{	
		$outp = "[";
		$outp .= '{"LoginSuccess":"'. "false"     . '"}';
		$outp .="]";		
		echo $outp;
	}
	if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
	}
	
	$result = mysql_query("UPDATE `Devices` SET `Status` = '180'  WHERE `HouseID`='". $houseid ."' AND `DeviceID`= '9'");
	sleep(5);
	$result = mysql_query("UPDATE `Devices` SET `Status` = '0'  WHERE `HouseID`='". $houseid ."' AND `DeviceID`= '9'");
	
}
?>
