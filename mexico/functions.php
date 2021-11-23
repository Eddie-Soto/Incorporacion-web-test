<?php 



require_once('conexion.php'); /*Conexión*/



//Generar consecutivo de código

function Code_consecutive()

{

	$dbHost = '104.130.46.73';

	$dbName = 'nikkenla_incorporation';

	$dbUser = 'nikkenla_mkrt';

	$dbPass = 'NNikken2011$$';



	try

	{

		$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$queryResult = $pdo->prepare("SELECT code FROM consecutive_codes_test order by id_consecutive_code desc");

		$queryResult->execute();

		$done = $queryResult->fetch();

		if($done)

		{

			$code = $done['code'] + 2;



			$sql = "INSERT INTO consecutive_codes_test (code) VALUES (:code)";

			$query = $pdo->prepare($sql);

			$result = $query->execute([

				'code'	=> $code

			]);



			if($result == false)

			{

				return 0;

			}

			else

			{

				return $code . "03";

			}

		}

	}

	catch (Exception $e)

	{

		return 0;

		exit;

	}

}

//Generar consecutivo de código

//Generar consecutivo de c�digo alternativa
function Code_consecutive_second()
{
	$dbHost = '104.130.46.73';
	$dbName = 'nikkenla_incorporation';
	$dbUser = 'nikkenla_mkrt';
	$dbPass = 'NNikken2011$$';

	try
	{
		$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$queryResult = $pdo->prepare("SELECT code FROM consecutive_codes_test order by id_consecutive_code desc");
		$queryResult->execute();
		$done = $queryResult->fetch();
		if($done)
		{
			$code = $done['code'] + 1;

			$sql = "INSERT INTO consecutive_codes_test (code) VALUES (:code)";
			$query = $pdo->prepare($sql);
			$result = $query->execute([
				'code'	=> $code
			]);

			if($result == false)
			{
				return 0;
			}
			else
			{
				return $code . "03";
			}
		}
	}
	catch (Exception $e)
	{
		return 0;
		exit;
	}
}
//Generar consecutivo de c�digo alternativa

//Asignar sponsor automaticamente
function Assigned_sponsor($name,$email,$phone,$country,$state,$platform,$user)
{

	//Asignar sponsor
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://panelmrkt.nikkenlatam.com/panel-marketing-v1/administracion/services/assigned-sponsor/prod.php");
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&email=$email&phone=$phone&country=$country&state=$state&platform=$platform&user=$user");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$remote_server_output = curl_exec ($ch);
		curl_close ($ch);

		$data = $remote_server_output;
		
		$codes =  substr($data, 4); 		
		$array = explode("|",$codes);

		$code = $array[0];

		$id = $data[0];
		trim($id);
		
		if($id == "1"){
			return $code;
		}

		echo "<strong>no fue posible toda la incorporaci�n</strong>, error al asignar sponsor";
		exit;
	//Asignar sponsor

}
//Asignar sponsor automaticamente



//Letra según el tipo

function Type_letter($type)

{

	if($type == 1)

	{

		return "CI";

	}

	else

	{

		return "CLUB";

	}

}

//Letra según el tipo



//Country letter

function Country_letter($country, $type)

{

	if($type == 1)

	{

		if($country == 1)

		{

			return "Colombia";

		}

		if($country == 2)

		{

			return "México";

		}

		if($country == 3)

		{

			return "Perú";

		}

		if($country == 4)

		{

			return "Ecuador";

		}

		if($country == 5)

		{

			return "Panamá";

		}

		if($country == 6)

		{

			return "Guatemala";

		}

		if($country == 7)

		{

			return "El Salvador";

		}

		if($country == 8)

		{

			return "Costa Rica";

		}

		if($country == 9)

		{

			return "Latinoamérica";

		}

	}

	else

	{

		if($type == 2)

		{

			if($country == 1)

			{

				return "COL";

			}

			if($country == 2)

			{

				return "MEX";

			}

			if($country == 3)

			{

				return "PER";

			}

			if($country == 4)

			{

				return "ECU";

			}

			if($country == 5)

			{

				return "PAN";

			}

			if($country == 6)

			{

				return "GTM";

			}

			if($country == 7)

			{

				return "SLV";

			}

			if($country == 8)

			{

				return "CRI";

			}

			if($country == 9)

			{

				return "OTRO";

			}

		}

		else

		{

			if($country == 1)

			{

				return "colombia";

			}

			if($country == 2)

			{

				return "mexico";

			}

			if($country == 3)

			{

				return "peru";

			}

			if($country == 4)

			{

				return "ecuador";

			}

			if($country == 5)

			{

				return "panama";

			}

			if($country == 6)

			{

				return "guatemala";

			}

			if($country == 7)

			{

				return "elsalvador";

			}

			if($country == 8)

			{

				return "costarica";

			}

		}

	}

}

//Country letter



//Fecha en letras

function obtenerFechaEnLetra($fecha){

    $dia= conocerDiaSemanaFecha($fecha);

    $num = date("j", strtotime($fecha));

    $anno = date("Y", strtotime($fecha));

    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

    $mes = $mes[(date('m', strtotime($fecha))*1)-1];

    return $dia.', '.$num.' de '.$mes.' del '.$anno;

}



function conocerDiaSemanaFecha($fecha) {

    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');

    $dia = $dias[date('w', strtotime($fecha))];

    return $dia;

}

//Fecha en letras



function Search_ce($sponsor, $email)

{

	$dbHost = '104.130.46.73';

	$dbName = 'nikkenla_elite';

	$dbUser = 'nikkenla_mkrt';

	$dbPass = 'NNikken2011$$';



	try

	{

		$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}

	catch (Exception $e)

	{

		echo $e->getMessage();

		exit;

	}



	$queryResult = $pdo->prepare("SELECT t0.code, t1.nombre FROM clients t0 inner join nikkenla_marketing.control_ci_test t1 on t0.code = t1.codigo where t0.email = :email and t0.status = 1 and t0.name != ''");

	$queryResult->execute(array(':email' => $email));

	$done = $queryResult->fetch();

	if($done)

	{

		return array($done['code'], $done['nombre']);

	}

	else

	{

		return array($sponsor, '');

	}

}



?>