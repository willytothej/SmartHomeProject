<?php
header("Access-Control-Allow-Origin: *");
//Specify that page will be in JSON format
header("Content-Type: application/json; charset=UTF-8");
//Create an array
$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/WebService/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Check if Password, Username and Email has been passed in URL and then get them and store in Vers.
if(isset($_GET['password'])&&isset($_GET['username'])&&isset($_GET['email'])){
	$username = $_GET['username'];
	$email = $_GET['email'];
	$password = $_GET['password'];
	
	//$Status ledgend
	//if 1 then email address taken
	//if 2 then username taken
	//if 3 then both taken
	$Status = 0;
	//Check if Username taken
	$result = mysql_query("SELECT * FROM UserData WHERE UserName = '". $username ."'");
	if (mysql_num_rows($result) > 0){
			$Status = 2;
		}
		//Check if Email taken
		$result = mysql_query("SELECT * FROM UserData WHERE Email = '". $email ."'");
		if (mysql_num_rows($result) > 0){
			//Check if Both are taken
			if($Status == 2){
			$Status = 3;	
			}else{
			$Status = 1;
			}	
		}
	//Start outputting JSON
	$outp ="[";
	//Output Status Code in JSON depending on code.
	switch ($Status) {
    case 0:
		  $result = mysql_query("INSERT INTO `UserData`(`UserName`, `Password`, `Email`) VALUES ('". $_GET['username'] ."','". $_GET['password'] ."','". $_GET['email'] ."')");
	if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
	}
$outp .= '{"Errorcode":"'   . "$Status"        . '"}';
        break;
    case 1:
$outp .= '{"Errorcode":"'   . "$Status"        . '"}';
        break;
    case 2:
$outp .= '{"Errorcode":"'   . "$Status"        . '"}';
        break;
	 case 3:
		$outp .= '{"Errorcode":"'   . "$Status"        . '"}';
        break;
}
	$outp .="]";
	echo $outp;
}else{
	echo "Invalid Data Sent to Server";
}
// check if row inserted or not
?>