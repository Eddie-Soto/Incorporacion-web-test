<?php 
date_default_timezone_set("America/Bogota");
ini_set('display_errors','Off'); 
if(!isset($_SESSION)) 
    { 
session_name("incorporacion");
session_start();
}
require_once('../../conexion-modified-for-tv.php');
require_once('../../functions.php'); /*Funciones*/

/*Variables*/
if (empty($_POST['checkip'])){ $ip = $_SERVER["REMOTE_ADDR"]; }else{ $ip = $_POST['checkip']; } //Consultar IP
$browser = $_SERVER['HTTP_USER_AGENT']; //Consultar navegador
$segmentacion = $_POST["segmentacion"];
//$id = date("ymd") . date("His") . rand(1, 99);
$id = $_POST["id"];
$type = $_POST["type"];
$type_letter = Type_letter($type);
$country = $_POST["country"];
$type_incorporate = $_POST["type_incorporate"];
$last_name = strtoupper($_POST["last_name"]);

$item =  $_POST["type-kit"];
$msi =  $_POST["type-msi"];

$name = strtoupper($_POST["name"]);
if($last_name != ""){	$name = $last_name . ", " . $name;	}

$birthday = substr($_POST["birthday"], 6 ,4) . "-" . substr($_POST["birthday"], 3 ,2) . "-" . substr($_POST["birthday"], 0 ,2);
$email = strtolower($_POST["email"]);
$cellular = $_POST["cellular"];
$residency_one = $_POST["residency_one"];
$residency_two = $_POST["residency_two"];
$residency_three = $_POST["residency_three"];
$residency_four = $_POST["residency_four"];
$name_legal_representative = $_POST["name_legal_representative"];
$secret_nikken = "6cl4nHQECtM=";
$created_at = date("Y-m-d H:i:s");
$type_document = $_POST["type_document"];

$type_kit = $_POST["type-kit"];
//Cambios Adolfo
if($type_document == 0){
	$type_document = 0;	
}

$number_document = $_POST["number_document"];

$rfc = $_POST["rfc"];
if($rfc == ""){	$rfc = 0;	}

$address = $_POST["address"];
$name_cotitular = strtoupper($_POST["name_cotitular"]);

$type_document_cotitular = $_POST["type_document_cotitular"];
if($type_document_cotitular == 0){	$type_document_cotitular = 0;	}

$number_document_cotitular = $_POST["number_document_cotitular"];
$bank = $_POST["bank"];

$bank_type = $_POST["bank_type"];
if($bank_type == 0){	$bank_type = 0;	}

$number_account = $_POST["number_account"];
$number_clabe = $_POST["number_clabe"];

$gender = $_POST["gender"];
$playera = $_POST["shirt-size"];
$tallaLetra = $_POST['tallaLetra'];

$type_sponsor = $_POST["type_sponsor"];
if($type_sponsor == 3)
{

	$user="Incorporacion web";
	$platform="https://nikkenlatam.com/incorporacion-web/";
	//$sponsor = Assigned_sponsor($name,$email,$cellular,$country,$residency_two,$platform,$user);
	$sponsor = Assigned_sponsor($name,$email,$cellular,$country,$residency_two,$platform,$user);
}
else
{
	$sponsor = $_POST["sponsor"];
	if($sponsor == 0){	$sponsor = 0;	}
}
/*Variables*/

/*Generar codigo*/
$code = Code_consecutive();
/*Generar codigo*/
$created_at=date("Y-m-d H:i:s");
$secret_nikken="";
/*Guardar en base de datos*/

try

	{



		$sql = "INSERT INTO nikkenla_incorporation.segmentacion_iw (sap_code, email, option_chosen, created_at) VALUES (:sap_code, :email, :option_chosen, :created_at)";

		$query = $pdo->prepare($sql);

		$result = $query->execute([

			

			'sap_code'	=> $code, 

			'email'	=> $email, 

			'option_chosen'	=> $segmentacion, 

			'created_at'	=> $created_at 

			

		]);

	}

	catch (Exception $e)

	{

		$result = $e;

	}

if(isset($_SESSION["boleto"])){
		$sponsor=$_SESSION["sponsor"];
//if (isset($_SESSION["sponsor"]) && isset($_SESSION["kit"]) && isset($_SESSION["boleto"])) {

	$idticket=$_SESSION["boleto"];
	//Verificar que no exista el codigo
	$queryResult = $pdo->prepare("SELECT code_ticket FROM nikkenla_incorporation.user_promotion_kit where code_ticket = :idticket");
	$queryResult->execute(array(':idticket' => $idticket));
	$done = $queryResult->fetch();
	if($done)
	{
		echo 'el <strong>boleto'.$idticket.' ya se encuentra redimido</strong>, por favor utilizar uno nuevo';
		exit;
	}else{


try

	{

		$sql = "INSERT INTO nikkenla_incorporation.user_promotion_kit (code_sponsor, code_redeem, kit, status, country_id, code_ticket, created_at) VALUES (:code_sponsor, :code_redeem, :kit, :status, :country_id, :code_ticket, :created_at)";

		$query = $pdo->prepare($sql);

		$result = $query->execute([

			//'id' => $id_kit,

			'code_sponsor'	=> $sponsor, 

			'code_redeem'	=> $code, 

			'kit'	=> $type_kit, 

			'status'	=> 2, 

			'country_id'	=> $country, 

			'code_ticket'	=> $idticket, 

			'created_at'	=> $created_at
		]);

	}

	catch (Exception $e)

	{

		$result = false;

	}



if($result != true)

{
	echo "<strong>no fue posible guardar la incorporación</strong>, por favor verifica la información e intentalo de nuevo kit USD ";

	exit;
}
}
}

//Verificar que no exista el codigo en contracts
$queryResult = $pdo->prepare("SELECT code FROM nikkenla_incorporation.contracts_test where code = :code");
$queryResult->execute(array(':code' => $code));
$done = $queryResult->fetch();
if($done)
{
	echo 'el <strong>codigo'.$code.' ya se encuentra utilizado en la Incorporacion Web</strong>, por favor utilizar uno nuevo';
	$code = Code_consecutive_second();
	try

	{



		if ($bank=='') {
		$bank=0;
		# code...
	}


		$conn = connect_kit();
		$query="INSERT INTO nikkenla_incorporation.contracts_test (id_contract, country, code, name, type, type_incorporate, type_sponsor, sponsor, email, cellular, birthday, address, residency_one, residency_two, residency_three, residency_four, name_legal_representative, type_document, number_document, name_cotitular, type_document_cotitular, number_document_cotitular, bank, bank_type, number_account, number_clabe, ip, browser, gender, kit, playera, talla) VALUES ('$id', '$country', '$code', '$name', '$type', '$type_incorporate', '$type_sponsor', '$sponsor', '$email', '$cellular', '$birthday', '$address', '$residency_one', '$residency_two', '$residency_three', '$residency_four', '$name_legal_representative', '$type_document', '$number_document', '$name_cotitular', '$type_document_cotitular', '$number_document_cotitular', '$bank', '$bank_type', '$number_account', '$number_clabe', '$ip', '$browser',  '$gender', '$type_kit', '$playera', '$tallaLetra')";

		$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

		disconnect($conn);

	}

	catch (Exception $e)

	{

		$result = $e;

	}
}
else
{


try
{
	if ($bank=='') {
		$bank=0;
		# code...
	}


		$conn = connect_kit();
		$query="INSERT INTO nikkenla_incorporation.contracts_test (id_contract, country, code, name, type, type_incorporate, type_sponsor, sponsor, email, cellular, birthday, address, residency_one, residency_two, residency_three, residency_four, name_legal_representative, type_document, number_document, name_cotitular, type_document_cotitular, number_document_cotitular, bank, bank_type, number_account, number_clabe, ip, browser, gender, kit, playera, talla) VALUES ('$id', '$country', '$code', '$name', '$type', '$type_incorporate', '$type_sponsor', '$sponsor', '$email', '$cellular', '$birthday', '$address', '$residency_one', '$residency_two', '$residency_three', '$residency_four', '$name_legal_representative', '$type_document', '$number_document', '$name_cotitular', '$type_document_cotitular', '$number_document_cotitular', '$bank', '$bank_type', '$number_account', '$number_clabe', '$ip', '$browser',  '$gender', '$type_kit', '$playera', '$tallaLetra')";

		$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

		disconnect($conn);
	
}
catch (Exception $e)
{
	$result = $e;
}
}
if($result != true)
{
	echo "<strong>no fue posible guardar la incorporación</strong>, por favor verifica la información e intentalo de nuevo " . $result;
	exit;
}
else{
	/*Guardar registro en marketing*/

/*Verificar que no exista el codigo en control_ci*/
	$queryResult = $pdo->prepare("SELECT codigo FROM nikkenla_marketing.control_ci_test where codigo = :code");
	$queryResult->execute(array(':code' => $code));
	$done = $queryResult->fetch();
	if($done)
	{
		echo 'el <strong>codigo'.$code.' ya se encuentra utilizado en la ov</strong>, por favor utilizar uno nuevo';
		$code = Code_consecutive_second();
		

		try

		{

			$sql = "INSERT INTO nikkenla_marketing.control_ci_test (pais, tipo, codigo, nombre, codigop, correo, celular, b1, b2) VALUES (:pais, :tipo, :codigo, :nombre, :codigop, :correo, :celular, :b1, :b2)";

			$query = $pdo->prepare($sql);

			$result = $query->execute([

				'pais'	=> $country, 

				'tipo'	=> $type_letter, 

				'codigo'	=> $code, 

				'nombre'	=> $name, 

				'codigop'	=> $sponsor, 

				'correo'	=> $email, 

				'celular'	=> $cellular, 

				'b1'	=> 1, 

				'b2'	=> 1

			]);

		}

		catch (Exception $e)

		{

			$result = false;

		}
	}
	else
	{
		
//Verificar que no exista el codigo en control_ci
	try
	{
		$conn = connect_mk();
		$query="INSERT INTO nikkenla_marketing.control_ci_test (pais, tipo, codigo, nombre, codigop, correo, celular, b1, b2) VALUES ('$country', '$type_letter', '$code', '$name', '$sponsor', '$email', '$cellular', '1', '1')";
		$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

		disconnect($conn);
		
	}
	catch (Exception $e)
	{
		$result = false;
	}
}
}
if($result == false)
{
	echo "<strong>no fue posible toda la incorporación</strong>, por favor verifica la información e intentalo de nuevo";
	exit;
}
else
{

	try
	{
		$conn = connect_new_tv_test();
		$query="INSERT INTO users (country_id, email, sap_code, sap_code_sponsor, password,secret_nikken, client_type, rank, name, phone, cell_phone, state, status, created_at) values ('$country','$email','$code','$sponsor','0','$secret_nikken','$type_letter','Directo','$name','$cellular','$cellular','$residency_two','1','$created_at')";

		$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

		disconnect($conn);

	}
	catch (Exception $e)
	{
		$result = $e;
	}
}


if($result != true)
{
	echo "<strong>no fue posible guardar la incorporación</strong>, por favor verifica la información e intentalo de nuevo " . $result;
	exit;
}
else{
	if($type_sponsor == 2) /*Pendiente por asignar patrocinador*/
	{
		echo "2///";
		exit;
	}
	else
	{
		if(isset($_SESSION["country_nc"])){ unset($_SESSION["country_nc"]); }
		if(isset($_SESSION["type_nc"] )){ unset($_SESSION["type_nc"] ); }
		if(isset($_SESSION["type_incorporate_nc"])){ unset($_SESSION["type_incorporate_nc"]); }
		if(isset($_SESSION["sponsor_nc"])){ unset($_SESSION["sponsor_nc"]); }
		if(isset($_SESSION["email_nc"] )){ unset($_SESSION["email_nc"] ); }
		if(isset($_SESSION["cellular_nc"] )){ unset($_SESSION["cellular_nc"] ); }
		if(isset($_SESSION["birthday_nc"] )){ unset($_SESSION["birthday_nc"] ); }
		if(isset($_SESSION["address_nc"] )){ unset($_SESSION["address_nc"] ); }
		if(isset($_SESSION["residency_one_nc"] )){ unset($_SESSION["residency_one_nc"] ); }
		if(isset($_SESSION["residency_two_nc"] )){ unset($_SESSION["residency_two_nc"] ); }
		if(isset($_SESSION["residency_three_nc"] )){ unset($_SESSION["residency_three_nc"] ); }
		if(isset($_SESSION["residency_four_nc"] )){ unset($_SESSION["residency_four_nc"] ); }
		if(isset($_SESSION["type_document_nc"] )){ unset($_SESSION["type_document_nc"] ); }
		if(isset($_SESSION["number_document_nc"] )){ unset($_SESSION["number_document_nc"] ); }
		if(isset($_SESSION["rfc_nc"] )){ unset($_SESSION["rfc_nc"] ); }
		if(isset($_SESSION["name_nc"] )){ unset($_SESSION["name_nc"] ); }
		if(isset($_SESSION["name_legal_representative_nc"] )){ unset($_SESSION["name_legal_representative_nc"] ); }



		if($type == 1) /*Enviar a 7/10*/
		{
			echo "1///https://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$item . "&item2=" . $playera;
		}
		/*APARTADO CAMBIO*/
			else if($type == 0 and $item=="5032") /*Enviar a arma tu entorno*/

			{

				echo "1///https://shopingcarttest.nikkenlatam.com/login-integration-incorporate-apartado.php?email=" . base64_encode($email)."&item=5032";
				

			}
/*APARTADO CAMBIO*/
		elseif($type == 0 and $item=="5031") /*Enviar a arma tu entorno En este caso en especial de costarica se enviará a la T.V. con un autologin para que el usuario proceda a comprar*/
		{
			//echo "1///https://nikkenlatam.com/armatuentorno/login-integration-incorporation.php?email=" . base64_encode($email);
			echo "1///https://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email)."?force_change=".base64_encode('1441:14412');

		}
		else
		{
			echo "<strong>no fue posible detectar el tipo de incorporación</strong>, por favor verifica la información e intentalo de nuevo";
			exit;
		}
	}
}
/*Guardar en base de datos*/

?>

