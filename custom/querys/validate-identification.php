<?php 

require_once('../../functions.php'); /*Funciones*/

/*vars*/
$identification = $_POST["identification"];
/*vars*/

$queryResult = $pdo->prepare("SELECT number_document FROM contracts_test where number_document = :identification");
$queryResult->execute(array(':identification' => $identification));
$done = $queryResult->fetch();
if($done)
{
	echo 'el <strong>numero de identificacion ya se encuentra utilizado</strong>, por favor utilizar uno nuevo';
	exit;
	/*if($done['payment'] == 0)
	{
		echo "el correo ingresado esta pendiente por generar el pago del Kit de inicio, por favor, utiliza la opción <strong>RETOMAR INCORPORACIÓN</strong>";
		exit;
	}
	else
	{
		echo "el <strong>correo ingresado ya se encuentra utilizado</strong>, por favor utilizar uno nuevo";
		exit;
	}*/
}
else
{
	/*
	$queryResult = $pdo->prepare("SELECT correo FROM nikkenla_marketing.control_ci where correo = :email and estatus = 1");
	$queryResult->execute(array(':email' => $email));
	$done = $queryResult->fetch();
	if($done)
	{
		echo "el <strong>correo ingresado ya se encuentra utilizado</strong>, por favor utilizar uno nuevo";
		exit;
	}
	*/
}

?>