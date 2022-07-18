<?php 



require_once('../../functions.php'); /*Funciones*/


// changueMI
/*vars*/

$email = $_POST["email"];
$item1 = 5006;

/*vars*/



//$queryResult = $pdo->prepare("SELECT type, payment, sponsor FROM contracts where email = :email union SELECT CASE WHEN tipo_incorporacion = 'ab' THEN 1 ELSE 0 END, pago, patrocinador FROM nikkenla_incorporacion.informacion where correo = :email");
$queryResult = $pdo->prepare("SELECT type, payment, sponsor, kit, playera, country, code, changueMI FROM contracts_test where email = :email");

$queryResult->execute(array(':email' => $email));

$done = $queryResult->fetch();

if($done)

{
$type_kit=$done['kit'];
$playera=$done['playera'];
$changueMI=$done['changueMI'];
if ($changueMI == 1) {
		$discount_abi = "S";

		$products_checkout=$type_kit.':1;'.$done['playera'].':1;';

		$data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

		echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
		exit;
}
	if($done['payment'] != 0)

	{

		echo "el <strong>correo electrónico ya ha concluido con la incorporación</strong>";

		exit;

	}

	else

	{

		if($done['sponsor'] == 0)

		{

			echo "aún <strong>no se te ha asignado un patrocinador</strong> para retomar la incorporación";

			exit;

		}

		else

		{

		if($done['kit'] == "5027" && $done['country'] == 1){

				echo "1///http://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=502719&item2=" . $playera;

			}elseif($done['kit'] == "5026" && $done['country'] == 1){

				echo "1///http://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$type_kit. "&item2=" . $playera;

			}elseif($done['kit'] == "5025" && $done['country'] == 1){

				echo "1///http://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$type_kit. "&item2=" . $playera;

			}elseif($done['kit'] == "5024" && $done['country'] == 1){

				$discount_abi = "S";

				 $products_checkout='50249:1;'.$done['playera'].':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				 echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				//echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=pruebas&data=$data";

			}elseif($done['kit'] == "5023" && $done['country'] == 1 ){

				$discount_abi = "S";

				 $products_checkout='50239:1;'.$done['playera'].':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				 echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				//echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=pruebas&data=$data";

			}elseif($done['kit'] == "5028" && $done['country'] == 1 || $done['kit'] == 5028 && $done['country'] == 1){

				$discount_abi = "S";

				 $products_checkout='502819:1;'.$item1.':1;'.$done['playera'].':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				//echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=pruebas&data=$data";

			}
			elseif($done['type'] == 0 && $done['country'] == 1){

				echo "1///https://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email);


			}

			//if($done['type'] == 1)
			elseif($done['type'] == 1 && $done['kit'] == "5006" && $done['country'] !=1  || $done['type'] == 1 && $done['kit'] == "5023" && $done['country'] !=1  || $done['type'] == 1 && $done['kit'] == "5024" && $done['country'] !=1  || $done['type'] == 1 && $done['kit'] == "5025" && $done['country'] !=1  || $done['type'] == 1 && $done['kit'] == "5026" && $done['country'] !=1  || $done['type'] == 1 && $done['kit'] == "5027" && $done['country'] !=1  || $done['type'] == 1 && $done['kit'] == "5028" && $done['country'] !=1 || $done['type'] == 1 && $done['kit'] == "5002")
			{

				/*Enviar al 7/10*/

				echo "1///https://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email) . '&item=' . $done['kit'] . "&item2=" . $done['playera'];

			}

			elseif($done['type'] == 0 && $done['country'] != 1)

			{

				/*Enviar a arma tu entorno*/

				echo "1///https://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email);

			}

			else

			{

				echo "<strong>no se detecto el tipo de incorporación</strong>";

				exit;

			}

		}

		

	}

}

else

{

	$queryResult = $pdo->prepare("SELECT * FROM nikkenla_provider.challenge_contracts where email = :email");

	$queryResult->execute(array(':email' => $email));

	$done = $queryResult->fetch();

	if($done)

	{

		echo "1///https://nikkenlatam.com/incorporacion-web/nikken-challenge.php?email=" . base64_encode($email);

	}

	else

	{

		echo "<strong>el correo electrónico no se encuentra registrado</strong>";

		exit;

	}

}

?>