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
//Execute a mysql query to the database and store in $result
$result = mysql_query("SELECT * FROM UserData");
//Create an array
$rows = array();
//Loop through results and insert into $rows
while($r = mysql_fetch_object($result)) {
    $rows[] = $r;
}
//Output $row in JSON fomat
print json_encode($rows);
?>
