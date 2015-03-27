<?php
//Create an array for the response
$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/WebService/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Check if SliderValue has been passed in URL
if(isset($_GET['slidervalue'])){
	//If so update slide to new value
	    $result = mysql_query("UPDATE `Slider` SET `SliderData` = '". $_GET['slidervalue'] . "'");
		echo "UPDATE `Slider` SET `SliderValue` = '". $_GET['slidervalue'] . "'";	
	//If not result then passout error
	if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
	echo "Statement Sent! :D ";		
}
}
?>
