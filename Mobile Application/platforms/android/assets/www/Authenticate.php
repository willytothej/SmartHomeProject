<?php
	$RandomUserIDString = generateRandomString();
			$cookie_name = "UserIDString";
	$cookie_value = $RandomUserIDString;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
CreateSession($UserID,$RandomUserIDString);

function generateRandomString($length = 1000) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



function CreateSession($UserID,$UserIDString){
		$response = array();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/Database/DatabaseConnector.php");
    $db = new DB_CONNECT();
$result = mysql_query("INSERT INTO `LoggedInSessions` (`UserID`,`UserIDString`, `IPAddress`) VALUES ('".$UserID."','".$UserIDString."','".$_SERVER['REMOTE_ADDR']."')");
		if($result)
{
			echo "success";
}

}







?>

<script>window.location.replace("http://www.fluidityhome.me");</script>

