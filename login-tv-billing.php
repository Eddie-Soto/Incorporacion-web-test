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
	// echo "se recibio -".$sponsor ." - ".$country;
	$_SESSION["sponsor"] = $sponsor;
	$_SESSION["country_tv"] = $country;
	
}else{
	echo "no se obtuvó el dato";
	exit;
}

// if(isset($_GET["sap_code"])){
// 	$_SESSION["sponsor"] = base64_decode($_GET["sap_code"]);

// }else{
// 	echo "no se obtuvó el dato";
// 	exit;
// }


//echo $_SESSION["country_tv"];

// /*Redireccionar*/
header('location: index.php');
exit;
ob_end_flush();
?>