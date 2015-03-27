<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
//Create an array for the response
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root.'/api/Generate/Authenticate2.php';


$username = $_GET["UserID"];
$password = $_GET["StringKey"];

$response = array();
//Set root path of the web server

//Get Database Classes from the DatabaseConnector.php
require_once($root."/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters

//Execute mysql query and insert in $result

  $result2 = mysql_query("SELECT * FROM Users WHERE UserID = '" . $username . "'");
//Output error if no Phidget results returned

$rs2 = mysql_fetch_array($result2);



if(mysql_num_rows($result2) > 0){
	
	
	$UserID = $rs2["UserID"];



	

	
	
	
	
	
	
	
	
	
	$result38 = mysql_query("SELECT * FROM LoggedInSessions WHERE UserID = " . $UserID . " AND UserIDString = '".$password."'");

	

	
	if(mysql_num_rows($result38) > 0){

	$result2 = mysql_query("SELECT UserID,Type,Username,FirstName,LastName,Email FROM Users WHERE UserID = '" . $username . "'");	
	
		if(mysql_num_rows($result2) > 0){

		$rows = array();
while($r = mysql_fetch_object($result2)) {
    $rows[] = $r;
}

			
			
			
			
			
			$result2 = mysql_query("SELECT ConfirmCode FROM Permissions WHERE UserID = '" . $username . "'");	
			
					$rows2 = array();
while($r = mysql_fetch_object($result2)) {
    $rows2[] = $r;
}
			
			
			$resulter = array_merge($rows,$rows2);
			
			print json_encode($resulter);
			
			
		}
		
	

	}
	
	
	
}


?>