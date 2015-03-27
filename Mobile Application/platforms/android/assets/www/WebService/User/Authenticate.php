<?php
header("Access-Control-Allow-Origin: *");
//Specify that page will be in JSON format
header("Content-Type: application/json; charset=UTF-8");
//Create an array for the response
$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/WebService/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters
$username = $_GET['username']; 
$password = $_GET['password'];
//Execute a mysql query to the database and store in $result
$result = mysql_query("SELECT * FROM UserData WHERE UserName ='". $username ."' AND Password ='" . $password."'");
$rs = mysql_fetch_array($result);
//Check if Query brought back any results and either return userloggedin true or false
if (mysql_num_rows($result) > 0){
		$outp = "[";
		$outp .= '{"LoginSuccess":"'. "true"     . '"},';
		$outp .= '{"UserID":"'. $rs["UserID"]     . '"}';
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
?>
