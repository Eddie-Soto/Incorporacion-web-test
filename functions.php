<?php 



require_once('conexion.php'); /*ConexiÃ³n*/


//Generar consecutivo de cÃ³digo

function Code_consecutive()

{

	$dbHost = '104.238.83.157';

	$dbName = 'nikkenla_incorporation';

	$dbUser = 'nikkenla_mkrt';

	$dbPass = 'NNikken2011$$';



	try

	{

		$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		$queryResult = $pdo->prepare("SELECT code FROM consecutive_codes order by id_consecutive_code desc");

		$queryResult->execute();

		$done = $queryResult->fetch();

		if($done)

		{

			$code = $done['code'] + 2;



			$sql = "INSERT INTO consecutive_codes (code) VALUES (:code)";

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

//Generar consecutivo de cÃ³digo

//Generar consecutivo de código alternativa
function Code_consecutive_second()
{
	$dbHost = '104.238.83.157';
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
//Generar consecutivo de código alternativa
//Información por país
	function Search_country_info($country){
		if($country == 0)
		{
			return array("servicio.lat@nikkenlatam.com", "latinoamerica", "Latinoamérica", "LAT");
		}
		if($country == 1)
		{
			return array("servicio.col@nikkenlatam.com", "colombia", "Colombia", "COL");
		}
		if($country == 2)
		{
			return array("servicio.mex@nikkenlatam.com", "mexico", "México", "MEX");
		}
		if($country == 3)
		{
			return array("servicio.per@nikkenlatam.com", "peru", "Perú", "PER");
		}
		if($country == 4)
		{
			return array("servicio.ecu@nikkenlatam.com", "ecuador", "Ecuador", "ECU");
		}
		if($country == 5)
		{
			return array("servicio.pan@nikkenlatam.com", "panama", "Panamá", "PAN");
		}
		if($country == 6)
		{
			return array("servicio.gtm@nikkenlatam.com", "guatemala", "Guatemala", "GTM");
		}
		if($country == 7)
		{
			return array("servicio.slv@nikkenlatam.com", "el-salvador", "El Salvador", "SLV");
		}
		if($country == 8)
		{
			return array("servicio.cri@nikkenlatam.com", "costa-rica", "Costa Rica", "CRI");
		}
		if($country == 9)
		{
			return array("servicio.lat@nikkenlatam.com", "estados-unidos", "Estados Unidos" ,"USD");
		}
		if($country == 10)
		{
			return array("servicio.lat@nikkenlatam.com", "chile", "Chile", "CHL");
		}
	}
//Información por país
//Asignar sponsor automaticamente
function Assigned_sponsores($name,$email,$phone,$country,$state,$platform,$user)
{

	
/*vars*/
$name_client = trim($name);
$email_client = trim($email);
$phone_client = trim($phone);
$country_client = trim($country);
$state_client = trim($state);
$platform_client = trim($platform);
$user_client = trim($user);
/*vars*/

//Concatenar variables post
	$concat_post = "";
	while ($post = each($_POST)){ $concat_post = $concat_post . $post[0] . " = " . $post[1] . "<br/>"; }
	$detail = base64_encode($concat_post);
//Concatenar variables post

//Generar archivo de bitacora
$file = fopen("bitacora1.txt","a");
fputs($file, $detail);
fputs($file,"\r\n");
fclose($file);
//Generar archivo de bitacora
$dbHost = '104.238.83.157';
$dbName = 'nikkenla_office';
$dbUser = 'nikkenla_blog';
$dbPass = 'N1kk3nbl0g2020$$..';

try{
	$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (Exception $e){
	exit($e->getMessage());
}

if($email_client != ""){
	//Asignar cliente de UBI
		$queryResult = $pdo->prepare("SELECT code as code_customers, name as name_customers, email as email_customers, phone as phone_customers, id_catalog_countrie as id_catalog_countrie_customer FROM nikkenla_ubi.customers where email = :email and status = 1 ORDER BY create_at DESC LIMIT 1");
	  	$queryResult->execute(array(':email' => $email_client));
	  	$row = $queryResult->fetch(PDO::FETCH_ASSOC);
	  	if($row > 0){
	  		$code_customers = $row["code_customers"];

	  		/*Validar si el asesor está como nivel 0 -> Manual */
				$queryResult = $pdo->prepare("SELECT id_panel_assigned_sponsor, name as name_abi, country as country_abi FROM nikkenla_administracion.panel_assigned_sponsor where code = :code and level = 0");
			  	$queryResult->execute(array(':code' => $code_customers));
			  	$row = $queryResult->fetch(PDO::FETCH_ASSOC);
			  	if($row > 0){
			  		$id = $row["id_panel_assigned_sponsor"];
			  		$name_abi = $row["name_abi"];
			  		$country_abi = $row["country_abi"];

			  		list($email_country_office, $name_country_nikkenlatam, $name_country) = Search_country_info($country_abi);
			  	}else{
			  		/*Guardar en base de datos*/
						$sql = "INSERT INTO nikkenla_administracion.panel_assigned_sponsor (code, level, user_create) VALUES (:code, :level, :user_create)";
						$query = $pdo->prepare($sql);
						$result = $query->execute([
							'code' => $code_customers,
							'level' => 0,
							'user_create' => 'Proceso automático UBI'
						]);
					/*Guardar en base de datos*/

					/*Actualizar información del nuevo registro*/
						$queryResult = $pdo->prepare("SELECT t0.id_panel_assigned_sponsor, t1.nombre, t1.correo, t1.pais, t1.telefono, t1.celular, t1.estado, t1.rango FROM nikkenla_administracion.panel_assigned_sponsor t0 inner join nikkenla_marketing.control_ci t1 on t0.code = t1.codigo and t1.estatus = 1 and t1.b1 = 1 and t1.tipo = 'CI' WHERE t0.code = :code and t0.status = 1");
					  	$queryResult->execute(array(':code' => $code_customers));
					  	while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
					  		$id = $row["id_panel_assigned_sponsor"];
					  		$name_abi = trim($row["nombre"]);
					  		$email_abi = trim($row["correo"]);
					  		$cellular_abi = trim($row["telefono"]);
					  		$cellular1_abi = trim($row["celular"]);
					  		$state_abi = trim($row["estado"]);
					  		$country_abi = trim($row["pais"]);
					  		list($email_country_office, $name_country_nikkenlatam, $name_country) = Search_country_info($country_abi);
					        $rank_abi = trim($row["rango"]);

					        $phone_abi = "";
				            if($cellular_abi != ""){ $phone_abi = $cellular_abi; }

				            if($cellular1_abi != ""){
				                if($phone_abi != ""){ $phone_abi = $phone_abi . " / " . $cellular1_abi;
				                }else{ $phone_abi = $cellular1_abi;}
				            }

			                $sql = "UPDATE nikkenla_administracion.panel_assigned_sponsor SET name = :name, email = :email, rank = :rank, phone = :phone, state = :state, country = :country WHERE code = :code and status = 1";
			                $query = $pdo->prepare($sql);
			                $result = $query->execute([
			                    'name' => $name_abi,
			                    'email' => $email_abi,
			                    'rank' => $rank_abi,
			                    'phone' => $phone_abi,
			                    'state' => $state_abi,
			                    'country' => $country_abi,
			                    'code' => $code_customers
			                ]);
					  	}
				  	/*Actualizar información del nuevo registro*/
			  	}
			/*Validar si el asesor está como nivel 0 -> Manual */

			/*Guardar registro cliente manual*/
				$sql = "INSERT INTO nikkenla_administracion.panel_assigned_sponsor_clients (id_panel_assigned_sponsor, name, email, phone, state, country, user_assigned, external_url, type) VALUES (:id_panel_assigned_sponsor, :name, :email, :phone, :state, :country, :user_assigned, :external_url, :type)";
				$query = $pdo->prepare($sql);
				$result = $query->execute([
					'id_panel_assigned_sponsor' => $id,
					'name' => $name_client,
					'email' => $email_client,
					'phone' => $phone_client,
					'state' => $state_client,
					'country' => $country_client,
					'user_assigned' => 'Proceso automático UBI',
					'external_url' => $platform_client,
					'type' => 'Automático'
				]);
			/*Guardar registro cliente manual*/

			exit("1///" . $code_customers . "|" . $name_abi . "|" . $name_country);
	  	}
	//Asignar cliente de UBI

	if($country_client == "6"){ /*Guatemala*/
		if($user_client != "NIKKENLATAM"){
			/*Guardar registro cliente*/
				$sql = "INSERT INTO nikkenla_administracion.panel_assigned_sponsor_clients (id_panel_assigned_sponsor, name, email, phone, state, country, user_assigned, external_url) VALUES (:id_panel_assigned_sponsor, :name, :email, :phone, :state, :country, :user_assigned, :external_url)";
				$query = $pdo->prepare($sql);
				$result = $query->execute([
					'id_panel_assigned_sponsor' => 1123,
					'name' => $name_client,
					'email' => $email_client,
					'phone' => $phone_client,
					'state' => $state_client,
					'country' => $country_client,
					'user_assigned' => $user_client,
					'external_url' => $platform_client
				]);
			/*Guardar registro cliente*/

			exit("1///14796603|NEGOCIOS CON VITALIDAD|Guatemala");
		}else{ exit ("14796603///0"); }
	}elseif($country_client == "7"){ /*El Salvador*/
		if($user_client != "NIKKENLATAM"){
			/*Guardar registro cliente*/
				$sql = "INSERT INTO nikkenla_administracion.panel_assigned_sponsor_clients (id_panel_assigned_sponsor, name, email, phone, state, country, user_assigned, external_url) VALUES (:id_panel_assigned_sponsor, :name, :email, :phone, :state, :country, :user_assigned, :external_url)";
				$query = $pdo->prepare($sql);
				$result = $query->execute([
					'id_panel_assigned_sponsor' => 1124,
					'name' => $name_client,
					'email' => $email_client,
					'phone' => $phone_client,
					'state' => $state_client,
					'country' => $country_client,
					'user_assigned' => $user_client,
					'external_url' => $platform_client
				]);
			/*Guardar registro cliente*/

			exit("1///16939803|NEGOCIO CON VITALIDAD SLV|El Salvador");
		}else{ exit ("16939803///0"); }
	}elseif($country_client == "10"){ /*Chile*/
		/*Reinicar contadores*/
			$queryResult = $pdo->prepare("SELECT code FROM nikkenla_administracion.panel_assigned_sponsor where country = :country and phone != '' and email != '' and state != '' and counter = 0 and status = 1 and level != 0");
		  	$queryResult->execute(array(':country' => $country_client));
		  	$row = $queryResult->fetch(PDO::FETCH_ASSOC);
		  	if($row > 0){
		  	}else{
		  		$sql = "UPDATE nikkenla_administracion.panel_assigned_sponsor SET counter = 0 WHERE country = :country";
				$query = $pdo->prepare($sql);
				$result = $query->execute([
					'country' => $country_client
				]);
		  	}
		/*Reinicar contadores*/

		$queryResult = $pdo->prepare("SELECT id_panel_assigned_sponsor as id, code, name, country FROM nikkenla_administracion.panel_assigned_sponsor where country = :country and phone != '' and email != '' and state != '' and counter = 0 and status = 1 and level != 0 order by rand()");
	  	$queryResult->execute(array(':country' => $country_client));
	  	$row = $queryResult->fetch(PDO::FETCH_ASSOC);
	  	if($row > 0){
	  		$id = $row["id"];
	  		$code = $row["code"];
	  		$name = $row["name"];

	  		$country = $row["country"];
	  		list($email_country_office, $name_country_nikkenlatam, $name_country) = Search_country_info($country);

	  		if($user_client != "NIKKENLATAM"){
	  			/*Guardar registro cliente*/
		  			$sql = "INSERT INTO nikkenla_administracion.panel_assigned_sponsor_clients (id_panel_assigned_sponsor, name, email, phone, state, country, user_assigned, external_url) VALUES (:id_panel_assigned_sponsor, :name, :email, :phone, :state, :country, :user_assigned, :external_url)";
					$query = $pdo->prepare($sql);
					$result = $query->execute([
						'id_panel_assigned_sponsor' => $id,
						'name' => $name_client,
						'email' => $email_client,
						'phone' => $phone_client,
						'state' => $state_client,
						'country' => $country_client,
						'user_assigned' => $user_client,
						'external_url' => $platform_client
					]);
		  		/*Guardar registro cliente*/

		  		/*Marcar asesor como procesado*/
			  		$sql = "UPDATE nikkenla_administracion.panel_assigned_sponsor SET counter = 1 WHERE id_panel_assigned_sponsor = :id";
					$query = $pdo->prepare($sql);
					$result = $query->execute([
						'id' => $id
					]);
		  		/*Marcar asesor como procesado*/

		  		exit("1///" . $code . "|" . $name . "|" . $name_country);
	  		}else{ exit ($code . "///0"); }
	  	}
	}

	$level = 1;
	$validate = 0;

	try{
		/*Reinicar contadores*/
			$queryResult = $pdo->prepare("SELECT code FROM nikkenla_administracion.panel_assigned_sponsor where country = :country and phone != '' and email != '' and state != '' and counter = 0 and status = 1 and level != 0");
		  	$queryResult->execute(array(':country' => $country_client));
		  	$row = $queryResult->fetch(PDO::FETCH_ASSOC);
		  	if($row > 0){
		  	}else{
		  		$sql = "UPDATE nikkenla_administracion.panel_assigned_sponsor SET counter = 0 WHERE country = :country";
				$query = $pdo->prepare($sql);
				$result = $query->execute([
					'country' => $country_client
				]);
		  	}
		/*Reinicar contadores*/

		/*Validar por nivel con estado*/
			while($level <= 8){
				$queryResult = $pdo->prepare("SELECT id_panel_assigned_sponsor as id, code, name, country FROM nikkenla_administracion.panel_assigned_sponsor where level = :level and country = :country and state = :state and phone != '' and email != '' and counter = 0 and status = 1 order by rand()");
			  	$queryResult->execute(array(':country' => $country_client, ':state' => $state_client, ':level' => $level));
			  	$row = $queryResult->fetch(PDO::FETCH_ASSOC);
			  	if($row > 0){
			  		$id = $row["id"];
			  		$code = $row["code"];
			  		$name = $row["name"];

			  		$country = $row["country"];
			  		list($email_country_office, $name_country_nikkenlatam, $name_country) = Search_country_info($country);

			  		if($user_client != "NIKKENLATAM"){
			  			/*Guardar registro cliente*/
				  			$sql = "INSERT INTO nikkenla_administracion.panel_assigned_sponsor_clients (id_panel_assigned_sponsor, name, email, phone, state, country, user_assigned, external_url) VALUES (:id_panel_assigned_sponsor, :name, :email, :phone, :state, :country, :user_assigned, :external_url)";
							$query = $pdo->prepare($sql);
							$result = $query->execute([
								'id_panel_assigned_sponsor' => $id,
								'name' => $name_client,
								'email' => $email_client,
								'phone' => $phone_client,
								'state' => $state_client,
								'country' => $country_client,
								'user_assigned' => $user_client,
								'external_url' => $platform_client
							]);
				  		/*Guardar registro cliente*/

				  		/*Marcar asesor como procesado*/
					  		$sql = "UPDATE nikkenla_administracion.panel_assigned_sponsor SET counter = 1 WHERE id_panel_assigned_sponsor = :id";
							$query = $pdo->prepare($sql);
							$result = $query->execute([
								'id' => $id
							]);
				  		/*Marcar asesor como procesado*/
			  		}

			  		$validate++;
			  		break;
			  	}

			  	$level++;
			}
		/*Validar por nivel con estado*/

		$level = 1;

		/*Validar por nivel sin estado*/
			if($validate == 0){
				while($level <= 8){
					$queryResult = $pdo->prepare("SELECT id_panel_assigned_sponsor as id, code, name, country FROM nikkenla_administracion.panel_assigned_sponsor where level = :level and country = :country and phone != '' and email != '' and counter = 0 and status = 1 order by rand()");
				  	$queryResult->execute(array(':country' => $country_client, ':level' => $level));
				  	$row = $queryResult->fetch(PDO::FETCH_ASSOC);
				  	if($row > 0){
				  		$id = $row["id"];
				  		$code = $row["code"];
				  		$name = $row["name"];

				  		$country = $row["country"];
				  		list($email_country_office, $name_country_nikkenlatam, $name_country) = Search_country_info($country);

				  		if($user_client != "NIKKENLATAM"){
				  			/*Guardar registro cliente*/
					  			$sql = "INSERT INTO nikkenla_administracion.panel_assigned_sponsor_clients (id_panel_assigned_sponsor, name, email, phone, state, country, user_assigned, external_url) VALUES (:id_panel_assigned_sponsor, :name, :email, :phone, :state, :country, :user_assigned, :external_url)";
								$query = $pdo->prepare($sql);
								$result = $query->execute([
									'id_panel_assigned_sponsor' => $id,
									'name' => $name_client,
									'email' => $email_client,
									'phone' => $phone_client,
									'state' => $state_client,
									'country' => $country_client,
									'user_assigned' => $user_client,
									'external_url' => $platform_client
								]);
					  		/*Guardar registro cliente*/

					  		/*Marcar asesor como procesado*/
						  		$sql = "UPDATE nikkenla_administracion.panel_assigned_sponsor SET counter = 1 WHERE id_panel_assigned_sponsor = :id";
								$query = $pdo->prepare($sql);
								$result = $query->execute([
									'id' => $id
								]);
					  		/*Marcar asesor como procesado*/
				  		}

				  		$validate++;
				  		break;
				  	}

				  	$level++;
				}
			}
		/*Validar por nivel sin estado*/

		/*if($user_client != "NIKKENLATAM"){ exit("1///" . $code . "|" . $name . "|" . $name_country); }
		else{ exit ($code . "///0"); }*/
	}catch (Exception $e){ exit("0///" . $e); }
}
 return $code; 
}
//Asignar sponsor automaticamente

//Asignar sponsor automaticamente
function Assigned_sponsor($name,$email,$phone,$country,$state,$platform,$user)
{

	//Asignar sponsor
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://nikkenlatam.com/interno/regional/panel-marketing-v1/administracion/services/assigned-sponsor/prod.php");
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

		echo "<strong>no fue posible toda la incorporación</strong>, error al asignar sponsor";
		exit;
	//Asignar sponsor

}
//Asignar sponsor automaticamente



//Letra segÃºn el tipo

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

//Letra segÃºn el tipo



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

			return "MÃ©xico";

		}

		if($country == 3)

		{

			return "PerÃº";

		}

		if($country == 4)

		{

			return "Ecuador";

		}

		if($country == 5)

		{

			return "PanamÃ¡";

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

			return "LatinoamÃ©rica";

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

    $dias = array('Domingo', 'Lunes', 'Martes', 'MiÃ©rcoles', 'Jueves', 'Viernes', 'SÃ¡bado');

    $dia = $dias[date('w', strtotime($fecha))];

    return $dia;

}

//Fecha en letras



function Search_ce($sponsor, $email)

{

	$dbHost = '104.238.83.157';

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