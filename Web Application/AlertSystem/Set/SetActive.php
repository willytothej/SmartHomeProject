<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
//Create an array for the response
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

$StringKey = $_GET['loginstring'];
$HouseID = $_GET['houseid'];
$Value = $_GET['Value'];
$Mobile = $_GET['Mob'];

$response = array();
require_once($root."/Database/DatabaseConnector.php");
$db = new DB_CONNECT();
//Set root path of the web server
//include 'Check.php';

	mysql_query("UPDATE `AlertConfig` SET Active = ". $Value ." WHERE HouseID =".$HouseID) ;
mysql_query("UPDATE `AlertConfig` SET Mobile = ". $Mobile ." WHERE HouseID =".$HouseID) ;
echo '[{"complete":"1"}]';
?>