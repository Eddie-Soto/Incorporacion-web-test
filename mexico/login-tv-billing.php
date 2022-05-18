<?php
ob_start();
require_once('conexion-modified-for-tv.php');

date_default_timezone_set("America/Bogota");
session_name("incorporacion");
session_start();


$sponsor = $_GET["sap_code"];

if(isset($_GET["sap_code"])){
	$_SESSION["sponsor"] = $_GET["sap_code"];
	
}else{
	echo "no se obtuvó el dato";
	exit;
}




/*Redireccionar*/
header('location: index.php');
exit;
ob_end_flush();
?>