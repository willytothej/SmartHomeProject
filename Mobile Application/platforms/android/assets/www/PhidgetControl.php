<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/LoginTracking.php");
$Auth = Authenticate();
if($Auth == 0){
	echo "<script>window.location.replace(\"/Login.php\");</script>";
}

if($Auth == 1){
	
require_once($root."/Control.php");	
	
}
?>

