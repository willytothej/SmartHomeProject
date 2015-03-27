<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
//Create an array for the response
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root.'/api/Generate/Authenticate2.php';


$username = $_GET["username"];
$password = $_GET["password"];

$response = array();
//Set root path of the web server

//Get Database Classes from the DatabaseConnector.php
require_once($root."/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Get parameters

//Execute mysql query and insert in $result

  $result2 = mysql_query("SELECT * FROM Users WHERE Username = '" . $username . "' AND Password = '" . $password . "'");
//Output error if no Phidget results returned

$rs2 = mysql_fetch_array($result2);



if(mysql_num_rows($result2) > 0){
	
	
	$UserID = $rs2["UserID"];
	
	$result3 = mysql_query("SELECT * FROM LoggedInSessions WHERE UserID = '" . $UserID . "'");
	$rs6 = mysql_fetch_array($result3);
	$rs3 = mysql_fetch_array($result2);
	if(mysql_num_rows($result3) > 0){
	
		$STRINGSTRING = $rs6["UserIDString"];
		$add = 1;
	}else{
		
		$STRINGSTRING = getString();	
		$add = 0;
		$result = mysql_query("INSERT INTO `LoggedInSessions` (`UserID`,`UserIDString`, `IPAddress`) VALUES ('".$UserID."','".$STRINGSTRING."','".$_SERVER['REMOTE_ADDR']."')");
		
		
	}

	}
	
	
	


if (mysql_num_rows($result2) > 0){
		$useridvalue = $rs2["UserID"];
	
		$result2 = mysql_query("SELECT * FROM Permissions WHERE UserID = '" . $useridvalue . "'");
		$rs2 = mysql_fetch_array($result2);
		if (mysql_num_rows($result2) > 0){
			$outp = "[";
			$outp .= '{"LoginSuccess":"'. "true"     . '",';
			$outp .= '"UserID":"'. $UserID     . '",';
			$outp .= '"HouseID":"'. $rs2["HouseID"]     . '",';
			$outp .= '"LoggedInString":"'.   $STRINGSTRING   . '"';
			$outp .="}]";		
			echo $outp; 
		}


else{	
	$outp = "[";
	$outp .= '{"LoginSuccess":"'. "false"     . '"}';
	$outp .="]";		
	echo $outp;
}
		}


else{	
		$outp = "[";
		$outp .= '{"LoginSuccess":"'. "false"     . '"}';
		$outp .="]";		
		echo $outp;
	}








if (!$result2) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
	}


?>