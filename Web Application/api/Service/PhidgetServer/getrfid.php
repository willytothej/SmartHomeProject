<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
//Create an array for the response

$username = $_GET["username"];

$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters

//Execute mysql query and insert in $result
  $result = mysql_query("SELECT * FROM Users WHERE Username = '" . $username . "'");
//Output error if no Phidget results returned
$rs = mysql_fetch_array($result);

if (mysql_num_rows($result) > 0){
		$userID = $rs["UserID"];
		}


else{	
		$outp = "[";
		$outp .= '{"CheckSuccess":"'. "false"     . '"}';
		$outp .="]";		
		echo $outp;
	}


$result2 = mysql_query("SELECT * FROM Permissions WHERE UserID = '" . $userID . "'");
		$rs2 = mysql_fetch_array($result2);
		if (mysql_num_rows($result2) > 0){
			$houseidvalue = $rs2["HouseID"];
		}


else{	
	$outp = "[";
	$outp .= '{"LoginSuccess":"'. "false"     . '"}';
	$outp .="]";		
	echo $outp;
}


$result2 = mysql_query("SELECT * FROM House WHERE HouseID = '" . $houseidvalue . "'");
		$rs2 = mysql_fetch_array($result2);
		if (mysql_num_rows($result2) > 0){
			$outp = "[";
			$outp .= '{"CheckSuccess":"'. "true"     . '",';
			$outp .= '"houseID":"'. $houseidvalue     . '",';
			$outp .= '"UniqueCardID":"'. $rs2["UniqueCardID"]     . '"';
			$outp .="}]";		
			echo $outp; 
		}


else{	
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