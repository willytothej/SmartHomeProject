<?php


function Authenticate(){
	
	

//Create an array for the response
$cookie_name = "UserIDString";
if(!isset($_COOKIE[$cookie_name])) {
    return "0";
} else {
   
	


$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters
//Execute a mysql query to the database and store in $result

		$rs["UserID"];
			$result = mysql_query("SELECT * FROM LoggedInSessions WHERE UserIDString ='". $_COOKIE[$cookie_name] ."' AND IPAddress ='" . $_SERVER['REMOTE_ADDR']."'");
		if ($result) {
	return "1";
    die($message);
	}
	
	
	if (!$result) {
			return "0";
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
	}	
	
}
}

?>
