
<?php
	$response = array();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/Database/DatabaseConnector.php");
    $db = new DB_CONNECT();
$result = mysql_query("INSERT INTO `House`(`HouseName`, `UniqueCardID`) VALUES ('Willyhamham house','4563456345')");
			if($result){
				echo "House Created";}	
printf("Last inserted record has id %d\n", mysql_insert_id());
?>