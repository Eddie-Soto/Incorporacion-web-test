<?php
ob_start();
require_once('conexion-modified-for-tv.php');

date_default_timezone_set("America/Bogota");
session_name("incorporacion");
session_start();
/*

$_SESSION["sponsor"] = 123456;
$_SESSION["kitcupon"] = 5030;
$_SESSION["codeticket"] = "12314503-P-AB";
*/
$kit_cupon="";

$sponsor = $_GET["sponsorid"];
$code_ticket = $_GET["kit"];
$kit_cupon = $_GET["boleto"];



if(isset($_GET["sponsorid"]) && isset($_GET["kit"]) && isset($_GET["boleto"]))
{
	/*
	try
		{
			$conn = connect_kit();
			$query="SELECT code_ticket FROM user_promotion_kit where code_ticket = '$kit_cupon'";

			$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
			
			

			disconnect($conn);

		}
		catch (Exception $e)
		{
			$result = $e;
		}

		if ($result->num_rows == 1) {
			echo "El codigo de boleto ya fue redimido, por favor regresa al sitio KIT MOKUTEKI";
			header("Location: https://www.nikkenlatam.com");
			exit;
		}
*/
	/*
	$_SESSION["sponsor"] = base64_decode($_GET["sponsorid"]);
	$_SESSION["kit"] = base64_decode($_GET["kit"]);
	$_SESSION["boleto"] = base64_decode($_GET["boleto"]);
	*/

	$_SESSION["sponsor"] = $_GET["sponsorid"];
	$_SESSION["kit"] = $_GET["kit"];
	$_SESSION["boleto"] = $_GET["boleto"];
}



/*Redireccionar*/
header('location: index.php');
exit;
ob_end_flush();
?>