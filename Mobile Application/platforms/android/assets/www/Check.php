<?php $response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters
$username = $_GET['username']; 
$password = $_GET['password'];
//Execute a mysql query to the database and store in $result
$result = mysql_query("SELECT * FROM Users WHERE Username ='". $username ."' AND Password ='" . $password."'");
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