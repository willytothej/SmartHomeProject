<?php

$response = array();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/Database/DatabaseConnector.php");
    $db = new DB_CONNECT();
//Check if registion is for elderly or carer

//Check parameters
if (isset($_GET['FirstName'])&&
	isset($_GET['LastName'])&&
	isset($_GET['UserName'])&&
	isset($_GET['EmailAddress'])&&
	isset($_GET['Password'])&&
	isset($_GET['ConfirmCode'])){
		$create = 1;
	
	$FirstName = $_GET['FirstName'];
	$LastName = $_GET['LastName'];
	$UserName = $_GET['UserName'];
	$EmailAddress = $_GET['EmailAddress'];
	$Password = $_GET['Password'];
	$ConfirmCode = $_GET['ConfirmCode'];
	

//Check Username
$CheckUserName = mysql_query("SELECT * FROM `Users` WHERE `Username` = '". $UserName . "'");
if(mysql_num_rows($CheckUserName) >= 1){
	echo "[{\"Username\":\"1\",";
	$username = 0;
	$create = 0;	
}else{
	echo "[{\"Username\":\"0\",";
}
	
	
	
$CheckEmailAddress = mysql_query("SELECT * FROM `Users` WHERE `Email` = '". $EmailAddress . "'");
if(mysql_num_rows($CheckEmailAddress) >= 1){
		echo "\"Email\":\"1\",";
	$email = 0;
	$create = 0;
}else{

	echo "\"Email\":\"0\",";
}
	
//Check code
$PermissionsData = mysql_query("SELECT * FROM `Permissions` WHERE `ConfirmCode` = '". $ConfirmCode . "'");
	if(mysql_num_rows($PermissionsData) >= 1){
	echo "\"Code\":\"1\"}]";
	$code = 1;
}else{
		
		$create = 0;
		echo "\"Code\":\"0\"}]";
	}
	
	
//Create User
	if($create == 1){
		if($username== "0"&&$email== "0"&&$code=="1"){
			echo "[{\"Username\":\"1\",\"Email\":\"1\",\"Code\":\"1\"}]";
		}
		$result2 = mysql_query("INSERT INTO `Users`( `Username`, `FirstName`, `LastName`, `Password`, `Email`, `Type`) VALUES ('". $UserName. "','". $FirstName. "','". $LastName. "','". $Password. "','". $EmailAddress. "','". $Type. "')");
 $UserID = mysql_insert_id();
	
	



 //Get User ID
		$PermissionsData = mysql_query("SELECT * FROM `Permissions` WHERE `ConfirmCode` = '". $ConfirmCode . "'");
while($row = mysql_fetch_array( $PermissionsData )) {
	// Print out the contents of each row into a table
		$HouseID =  $row['HouseID'];

} 
	
	

	
	
$result = mysql_query("INSERT INTO `Permissions`(`UserID`, `HouseID`, `ConfirmCode`, `CanDelete`) VALUES (".$UserID.",".$HouseID.",'0',0)");
	}
	

	
}else{
	
	echo "[{\"DataComplete\":\"0\",\"Username\":\"0\",\"Email\":\"0\",\"Code\":\"0\"}]";
	
}
?>