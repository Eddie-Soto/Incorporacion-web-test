<?php 



require_once('../../functions.php'); /*Funciones*/



/*vars*/

$email = $_POST["email"];

/*vars*/



//$queryResult = $pdo->prepare("SELECT type, payment, sponsor FROM contracts where email = :email union SELECT CASE WHEN tipo_incorporacion = 'ab' THEN 1 ELSE 0 END, pago, patrocinador FROM nikkenla_incorporacion.informacion where correo = :email");

$queryResult = $pdo->prepare("SELECT type, payment, sponsor, kit, playera  FROM contracts_test where email = :email");

$queryResult->execute(array(':email' => $email));

$done = $queryResult->fetch();

if($done)

{

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

			//if($done['type'] == 1)

			if($done['type'] == 1 && $done['kit'] == "5006" || $done['type'] == 1 && $done['kit'] == "5023" || $done['type'] == 1 && $done['kit'] == "5024" || $done['type'] == 1 && $done['kit'] == "5025" || $done['type'] == 1 && $done['kit'] == "5026" || $done['type'] == 1 && $done['kit'] == "5027" || $done['type'] == 1 && $done['kit'] == "5028" || $done['type'] == 1 && $done['kit'] == "5002")

			{

				/*Enviar al 7/10*/

				//echo "1///https://nikkenlatam.com/interno/carrito-compras/login-integration-incorporate.php?email=" . base64_encode($email);

				echo "1///https://nikkenlatam.com/interno/carrito-compras-test/login-integration-incorporate.php?email=" . base64_encode($email) . '&item=' . $done['kit'] . "&item2=" . $done['playera'];

			}

			else if($type == 0 and $done['kit'] =="5032") /*Enviar a arma tu entorno*/

			{

				echo "1///https://nikkenlatam.com/interno/carrito-compras-test/login-integration-incorporate-apartado.php?email=" . base64_encode($email)."&item=5032";
				//echo "1///http://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email);
				//echo "1///https://nikkenlatam.com/armatuentornotest/login-integration-incorporation.php?email=" . base64_encode($email);

			}
			else if($type == 0 and $done['kit'] =="5031") /*Enviar a arma tu entorno*/

			{

				//echo "1///https://nikkenlatam.com/interno/carrito-compras-test/login-integration-incorporate-apartado.php?email=" . base64_encode($email)."&item=5032";
				echo "1///http://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email);
				//echo "1///https://nikkenlatam.com/armatuentornotest/login-integration-incorporation.php?email=" . base64_encode($email);

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