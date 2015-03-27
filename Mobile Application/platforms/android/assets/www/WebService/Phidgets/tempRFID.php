<?php
//Create an array for the response
$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/WebService/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Check if taggained passed and update accordingly
if(isset($_GET['taggained'])){
	    $result = mysql_query("UPDATE `TemporaryRFID` SET `Tag` = '". $_GET['taggained'] . "'");
	echo "UPDATE `tempRFID` SET `TagGained` = '". $_GET['taggained'] . "'";
	if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);		
}
}
?>
