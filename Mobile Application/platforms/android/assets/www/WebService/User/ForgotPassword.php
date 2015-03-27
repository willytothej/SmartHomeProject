<?php
header("Access-Control-Allow-Origin: *");
//Specify that page will be in JSON format
header("Content-Type: application/json; charset=UTF-8");
//Get Username and Email from the URL.
$username = $_GET['username']; 
$email = $_GET['email'];
//Create an array for the response
$response = array();
//Set root path of the web server
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//Get Database Classes from the DatabaseConnector.php
require_once($root."/WebService/Database/DatabaseConnector.php");
//Create a new database connection
    $db = new DB_CONNECT();
//Execute a mysql query to the database and store in $result
$result = mysql_query("SELECT * FROM UserData WHERE UserName ='". $username ."' AND Email ='" . $email."'");
//If result has a data entry then send out email and output JSON stating the Status is true meaning that user has been sent recovery email.
if (mysql_num_rows($result) > 0){
while($rs = mysql_fetch_array($result)) {
		$outp = "[{";
		$outp .= '"Username":"' . $rs["username"] . '",';
		$outp .= '"Email":"'. $rs["email"] . '",';
		$outp .= '"Status":"'. "true"     . '"';
		$outp .="}]";
		$to = $rs["email"];
		$subject = "You Recovered Password for SparrowHome";
		$message = "Hi " . $rs ["username"] . ", Your recovered password is " . $rs ["password"] . ". Please try to remember it next time!";
}
	mail($to, $subject, $message);
	echo $outp;
}
//Output Status false meaning no user was found in the database.
else
{
	$outp = "[{";
	$outp .= '"Status":"'. "false"     . '"';
	$outp .="}]";
}
?>