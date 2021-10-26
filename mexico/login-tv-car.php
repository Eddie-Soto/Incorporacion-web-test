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
	
	$products = $_GET["products"];

	$_SESSION["products"] = $products;

	$sale_id = $_GET["sale_id"];

	$_SESSION["sale_id"] = $sale_id;
	


}

/*Redireccionar*/
header('location: index.php');
exit;

?>