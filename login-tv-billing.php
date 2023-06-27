<?php
ob_start();
require_once('conexion-modified-for-tv.php');

date_default_timezone_set("America/Bogota");
session_name("incorporacion");
session_start();


// $sponsor = base64_decode($_GET["sap_code"]);
$sponsor = $_GET["sap_code"];
$country = $_GET["country"];

if(isset($sponsor) && isset($country)){
	return "se recibio -".$sponsor ." - ".$country;
}else{
	return "no se recibio alguno";
}

if(isset($_GET["sap_code"])){
	$_SESSION["sponsor"] = base64_decode($_GET["sap_code"]);

}else{
	echo "no se obtuvó el dato";
	exit;
}




/*Redireccionar*/
header('location: index.php');
exit;
ob_end_flush();
?>