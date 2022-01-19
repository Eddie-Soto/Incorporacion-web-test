<?php 



require_once('../../functions.php'); /*Funciones*/



/*vars*/

$email = $_POST["email"];

/*vars*/



$queryResult = $pdo->prepare("SELECT payment,email,status FROM contracts where email = :email and status = 0");

$queryResult->execute(array(':email' => $email));

$done = $queryResult->fetch();

if($done)

{

	if($done['payment'] == 0)

	{

		echo "el correo ingresado esta pendiente por generar el pago del Kit de inicio, por favor, utiliza la opción <strong>RETOMAR INCORPORACIÓN</strong>";

		exit;

	}

	else

	{

		echo "el <strong>correo ingresado ya se encuentra utilizado</strong>, por favor utilizar uno nuevo";

		exit;

	}

}

else

{

	$queryResult = $pdo->prepare("SELECT correo FROM nikkenla_marketing.control_ci where correo = :email and estatus = 1");

	$queryResult->execute(array(':email' => $email));

	$done = $queryResult->fetch();

	if($done)

	{

		echo "el <strong>correo ingresado ya se encuentra utilizado</strong>, por favor utilizar uno nuevo";

		exit;

	}else{
		try
			{
				$mysqli = new mysqli("52.52.67.160", "forge", "8L8xQ1O9l6cVZMBtBBKS","mitiendanikken");

				/* comprobar la conexión */
				if ($mysqli->connect_errno){
					echo ("Falló la conexión:".$mysqli->connect_error);
					exit;
				}
				$resultado = $mysqli->query("SELECT email from users where email='$email'");
				/* Crear una tabla que no devuelve un conjunto de resultados */
				if (mysqli_num_rows($resultado)){
					echo "el <strong>correo ingresado ya se encuentra registrado en la tienda virtual</strong>, por favor utilizar uno nuevo";
					exit;
				}
   

   				$mysqli->close();

			}
			catch (Exception $e)
			{
				$result = $e;
			}
	}

}



?>