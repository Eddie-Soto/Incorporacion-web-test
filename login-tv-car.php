<?php 

date_default_timezone_set("America/Bogota");
session_name("incorporacion");
session_start();
/*

$_SESSION["sponsor"] = 123456;
$_SESSION["kitcupon"] = 5030;
$_SESSION["codeticket"] = "12314503-P-AB";
*/



if(isset($_GET["products"]))
{
	
	$products = base64_decode($_GET["products"]);
	
}

/*Redireccionar*/
header('location: index.html');
exit;

?>