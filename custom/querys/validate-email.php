<?php 

require_once('../../functions.php');
require_once('../../conexion-modified-for-tv.php');
 /*Funciones*/

/*vars*/
$email = $_POST["email"];
/*vars*/

$queryResult = $pdo->prepare("SELECT payment,email,status FROM contracts_test where email = :email and status = 0");
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
	$queryResult = $pdo->prepare("SELECT correo FROM nikkenla_marketing.control_ci_test where correo = :email and estatus = 1");
	$queryResult->execute(array(':email' => $email));
	$done = $queryResult->fetch();
	if($done)
	{
		echo "el <strong>correo ingresado ya se encuentra utilizado</strong>, por favor utilizar uno nuevo";
		exit;
	}else{
		/*
		try
			{
				$mysqli = new mysqli("52.8.217.47", "forge", "jTalzP67KvNYWDVH4UBo","testmitiendanikken_04_05_2019");

				
				if ($mysqli->connect_errno){
					echo ("Falló la conexión:".$mysqli->connect_error);
					exit;
				}
				$resultado = $mysqli->query("SELECT email from users where email='$email'");
				
				if (mysqli_num_rows($resultado)){
					echo "el <strong>correo ingresado ya se encuentra registrado en la tienda virtual</strong>, por favor utilizar uno nuevo";
					exit;
				}else{
					$id = 1;
					include_once "base-datos.php";
					$sentencia = $base_de_datos->prepare("SELECT * from Depurados2021_Return  WHERE Email= ?;");
					$sentencia->execute([$email]);
					$mascota = $sentencia->fetchObject();
					if (!$mascota) {
					    
					}else{
						echo "1///https://services.nikken.com.mx/";
						exit;
					}
				}
   

   $mysqli->close();

			}
			catch (Exception $e)
			{
				$result = $e;
			}*/
	}
}

?>