<?php 
date_default_timezone_set("America/Bogota");
session_name("incorporacion");
session_start();
require_once('../../conexion-modified-for-tv.php');
require_once('../../functions.php'); /*Funciones*/

$type = $_POST["type"];

$country = $_POST["country"];

$type_incorporate = $_POST["type_incorporate"];

/*SEGMENTACION*/
$segmentacion = $_POST["segmentacion"];



/* Logica que verifica el nuemro de archivos al final del formular�o solo para COLOMBIA */
/*
if($country == 1){
	if($type == 1 and $type_incorporate == 1){ // si es asesor y es persona natural
		if(isset($_SESSION["cou"])) {
				$count1=$_SESSION["count_files"];
				$ope = $count1 - $_SESSION["cou"];
				if($ope < 1){
					echo "Verifica el n�mero de archivos que debes subir en el paso 3 <strong> debes subir 1 archivo </strong> <br>";
					//echo "se han borrado hasta el momento".$_SESSION["cou"];
					//echo "<br>se deben subir: ".$count1;
					//echo "<br> la operacion da:".$ope;
					?>
					<script>
                           document.getElementById("validator").value = "";
                            </script>
                            <?php
					exit;
				}
			}
	}else if($type == 1 and $type_incorporate == 0){ // si es asesor y es empresa
		if(isset($_SESSION["cou"])) {
				$count1=$_SESSION["count_files"];
				$ope = $count1 - $_SESSION["cou"];
				if($ope < 5){
					echo "Verifica el n�mero de archivos que debes subir en el paso 3 <strong> debes subir 5 archivos </strong> <br>";
					//echo "se han borrado hasta el momento".$_SESSION["cou"];
					//echo "<br>se deben subir: ".$count1;
					//echo "<br> la operacion da:".$ope;
					?>
					<script>
                           document.getElementById("validator").value = "";
                            </script>
                            <?php
					exit;
				}
			}
	}else if($type == 0 and $type_incorporate == 1){ // si es club y es persona natural

	}else if($type == 0 and $type_incorporate == 0){ // si es club y es empresa
		if(isset($_SESSION["cou"])) {
				$count1=$_SESSION["count_files"];
				$ope = $count1 - $_SESSION["cou"];
				if($ope < 4){
					echo "Verifica el n�mero de archivos que debes subir en el paso 3 <strong> debes subir 4 archivos </strong> <br>";
				//	echo "se han borrado hasta el momento".$_SESSION["cou"];
			//		echo "<br>se deben subir: ".$count1;
			//		echo "<br> la operacion da:".$ope;
					?>
					<script>
                           document.getElementById("validator").value = "";
                            </script>
                            <?php
					exit;
				}
			}
	}
session_destroy();
}
*/
/* Logica que verifica el nuemro de archivos al final del formular�o solo para COLOMBIA */


/*Variables*/

if (empty($_POST['checkip'])){ $ip = $_SERVER["REMOTE_ADDR"]; }else{ $ip = $_POST['checkip']; } //Consultar IP

$browser = $_SERVER['HTTP_USER_AGENT']; //Consultar navegador



$id = $_POST["id"];

//$type = $_POST["type"];

$type_letter = Type_letter($type);

//country = $_POST["country"];

//$type_incorporate = $_POST["type_incorporate"];

$last_name = strtoupper($_POST["last_name"]);

/* =====================================================*/

$item =  $_POST["type-kit"];
$msi =  $_POST["type-msi"];

if($country == 2)
{
	if ($msi == 6) {
		
		$item = $item.'m';
	}
}

/* =====================================================*/

$name = strtoupper($_POST["name"]);

if($last_name != ""){	$name = $last_name . ", " . $name;	}



$birthday = substr($_POST["birthday"], 6 ,4) . "-" . substr($_POST["birthday"], 3 ,2) . "-" . substr($_POST["birthday"], 0 ,2);

$email = strtolower($_POST["email"]);

$cellular = $_POST["cellular"];

$address = $_POST["address"];

$residency_one = $_POST["residency_one"];

$residency_two = $_POST["residency_two"];

$residency_three = $_POST["residency_three"];

$residency_four = $_POST["residency_four"];



/*Deseo factura*/

$address_invoice = $_POST["address_invoice"];

$residency_one_invoice = $_POST["residency_one_invoice"];

$residency_two_invoice = $_POST["residency_two_invoice"];

$residency_three_invoice = $_POST["residency_three_invoice"];

$residency_four_invoice = $_POST["residency_four_invoice"];

$cfdi = $_POST["cfdi"];



if($address_invoice == "")

{

	$address_invoice = $address;

	$residency_one_invoice = $residency_one;

	$residency_two_invoice = $residency_two;

	$residency_three_invoice = $residency_three;

	$residency_four_invoice = $residency_four;

}

/*Deseo factura*/

$name_legal_representative = $_POST["name_legal_representative"];

$verify_digit = $_POST['verify_digit'];

if ($verify_digit == undefined || $verify_digit=='undefined') {
	$verify_digit=0;
	# code...
}

if ($verify_digit == 0 and $country == 7) {
	$ContribuyenteIva = $_POST['number_document_nrc'];
	$verify_digit = $ContribuyenteIva;
}

$type_document = $_POST["type_document"];

//Cambios Adolfo

if($type_document == 0){

	$type_document = 0;	

}



	$dgi = $_POST["dgi"];
	if($dgi == 0){
		$dgi = 'Consumidor Final';
	}
	elseif($dgi == 1){
		$dgi = 'Contribuyente';
	}
	else{
		$dgi = '';
	}
// return $_POST;

$number_document = $_POST["number_document"];
if ($country == 7 || $country == '7') {
	$type_document_two = $_POST["type_document_two"];
	$number_document_two = $_POST["number_document_two"];
	$number_document=$number_document.",".$number_document_two;
}



$rfc = $_POST["rfc"];

if($rfc == ""){	$rfc = 0;	}





$name_cotitular = strtoupper($_POST["name_cotitular"]);



$type_document_cotitular = $_POST["type_document_cotitular"];

if($type_document_cotitular == 0){	$type_document_cotitular = 0;	}



$number_document_cotitular = $_POST["number_document_cotitular"];

$bank = $_POST["bank"];

if($bank == 0){	$bank = 0;	}


$bank_type = $_POST["bank_type"];

if($bank_type == 0){	$bank_type = 0;	}



$number_account = $_POST["number_account"];

$number_clabe = $_POST["number_clabe"];



$gender = $_POST["gender"];

$type_kit = $_POST["type-kit"];

$playera = $_POST["shirt-size"];

$tallaLetra = $_POST['tallaLetra'];


$created_at=date("Y-m-d H:i:s");

$type_sponsor = $_POST["type_sponsor"];



if($type_sponsor == 3)

{

	$user="Incorporacion web";

	$platform="https://nikkenlatam.com/incorporacion-web/";

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


if(isset($_SESSION["boleto"])){

	$idticket=$_SESSION["boleto"];
	

//Verificar que no exista el codigo
	try

	{
	$queryResult = $pdo->prepare("SELECT code_ticket FROM nikkenla_incorporation.user_promotion_kit_test where code_ticket = :code_ticket");
	$queryResult->execute(array(':code_ticket' => $idticket));
	$done = $queryResult->fetch();
	}catch (Exception $e)

	{

		echo "error en la consulta".$e;
		exit;

	}
	if($done)
	{
		echo 'el <strong>boleto'.$idticket.' ya se encuentra redimido</strong>, por favor utilizar uno nuevo';
		exit;
	/*if($done['payment'] == 0)
	{
		echo "el correo ingresado esta pendiente por generar el pago del Kit de inicio, por favor, utiliza la opci�n <strong>RETOMAR INCORPORACI�N</strong>";
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
	

//Verificar que no exista el codigo
	try

	{

		$sql = "INSERT INTO nikkenla_incorporation.user_promotion_kit_test (code_sponsor, code_redeem, kit, status, country_id, code_ticket, created_at) VALUES (:code_sponsor, :code_redeem, :kit, :status, :country_id, :code_ticket, :created_at)";

		$query = $pdo->prepare($sql);

		$result = $query->execute([

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
		echo "<strong>no fue posible guardar la incorporaci�n</strong>, por favor verifica la informaci�n e intentalo de nuevo kit USD " . $result;

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
	exit;
	$code = Code_consecutive_second();
	try

	{



		$sql = "INSERT INTO nikkenla_incorporation.contracts_test (id_contract, country, code, name, type, type_incorporate, type_sponsor, sponsor, email, cellular, birthday, address, residency_one, residency_two, residency_three, residency_four, name_legal_representative, type_document, number_document, name_cotitular, type_document_cotitular, number_document_cotitular, bank, bank_type, number_account, number_clabe, rfc, ip, browser, gender, kit, playera, talla, verify_digit,dgi) VALUES (:id, :country, :code, :name, :type, :type_incorporate, :type_sponsor, :sponsor, :email, :cellular, :birthday, :address, :residency_one, :residency_two, :residency_three, :residency_four, :name_legal_representative, :type_document, :number_document, :name_cotitular, :type_document_cotitular, :number_document_cotitular, :bank, :bank_type, :number_account, :number_clabe, :rfc, :ip, :browser, :gender, :kit, :playera, :tallaLetra, :verify_digit, :dgi)";

		$query = $pdo->prepare($sql);

		$result = $query->execute([

			'id'	=> $id, 

			'country'	=> $country, 

			'code'	=> $code, 

			'name'	=> $name, 

			'type'	=> $type, 

			'type_incorporate'	=> $type_incorporate, 

			'type_sponsor'	=> $type_sponsor, 

			'sponsor'	=> $sponsor, 

			'email'	=> $email, 

			'cellular'	=> $cellular, 

			'birthday'	=> $birthday, 

			'address'	=> $address, 

			'residency_one'	=> $residency_one, 

			'residency_two'	=> $residency_two, 

			'residency_three'	=> $residency_three, 

			'residency_four'	=> $residency_four, 

			'name_legal_representative'	=> $name_legal_representative, 

			'type_document'	=> $type_document, 

			'number_document'	=> $number_document, 

			'name_cotitular'	=> $name_cotitular, 

			'type_document_cotitular'	=> $type_document_cotitular, 

			'number_document_cotitular'	=> $number_document_cotitular, 

			'bank'	=> $bank, 

			'bank_type'	=> $bank_type, 

			'number_account'	=> $number_account, 

			'number_clabe'	=> $number_clabe,

			'rfc'	=> $rfc,

			'ip'	=> $ip,

			'browser'	=> $browser,

			'gender'	=> $gender,

			'kit' => $type_kit,

			'playera' => $playera,

			'tallaLetra' => $tallaLetra,

			'verify_digit' => $verify_digit,

			'dgi' => $dgi

		]);

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



		$sqlt = "INSERT INTO nikkenla_incorporation.contracts_test (id_contract, country, code, name, type, type_incorporate, type_sponsor, sponsor, email, cellular, birthday, address, residency_one, residency_two, residency_three, residency_four, name_legal_representative, type_document, number_document, name_cotitular, type_document_cotitular, number_document_cotitular, bank, bank_type, number_account, number_clabe, rfc, ip, browser, gender, kit, playera, talla, verify_digit, dgi) VALUES (:id, :country, :code, :name, :type, :type_incorporate, :type_sponsor, :sponsor, :email, :cellular, :birthday, :address, :residency_one, :residency_two, :residency_three, :residency_four, :name_legal_representative, :type_document, :number_document, :name_cotitular, :type_document_cotitular, :number_document_cotitular, :bank, :bank_type, :number_account, :number_clabe, :rfc, :ip, :browser, :gender, :kit, :playera, :tallaLetra, :verify_digit, :dgi)";

		$query = $pdo->prepare($sqlt);

		$result = $query->execute([

			'id'	=> $id, 

			'country'	=> $country, 

			'code'	=> $code, 

			'name'	=> $name, 

			'type'	=> $type, 

			'type_incorporate'	=> $type_incorporate, 

			'type_sponsor'	=> $type_sponsor, 

			'sponsor'	=> $sponsor, 

			'email'	=> $email, 

			'cellular'	=> $cellular, 

			'birthday'	=> $birthday, 

			'address'	=> $address, 

			'residency_one'	=> $residency_one, 

			'residency_two'	=> $residency_two, 

			'residency_three'	=> $residency_three, 

			'residency_four'	=> $residency_four, 

			'name_legal_representative'	=> $name_legal_representative, 

			'type_document'	=> $type_document, 

			'number_document'	=> $number_document, 

			'name_cotitular'	=> $name_cotitular, 

			'type_document_cotitular'	=> $type_document_cotitular, 

			'number_document_cotitular'	=> $number_document_cotitular, 

			'bank'	=> $bank, 

			'bank_type'	=> $bank_type, 

			'number_account'	=> $number_account, 

			'number_clabe'	=> $number_clabe,

			'rfc'	=> $rfc,

			'ip'	=> $ip,

			'browser'	=> $browser,

			'gender'	=> $gender,

			'kit' => $type_kit,

			'playera' => $playera,

			'tallaLetra' => $tallaLetra,

			'verify_digit' => $verify_digit,

			'dgi' => $dgi

		]);

	}

	catch (Exception $e)

	{

		$result = $e;
		echo $result;
		exit;

	}
if($result != true)

{

	echo "<strong>no fue posible guardar la incorporaci�n</strong>, por favor verifica la informaci�n e intentalo de nuevo " . $result;

	exit;

}else{
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
}
//Verificar que no exista el codigo en contracts
	/*Guardar en base de datos*/

	
	



}
if($result != true)

{

	echo "<strong>no fue posible guardar la incorporaci�n</strong>, por favor verifica la informaci�n e intentalo de nuevo " . $result;

	exit;

}

else

{

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


		/*Guardar registro en marketing*/

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


	if($result == false)

	{

		echo "<strong>no fue posible toda la incorporaci�n</strong>, por favor verifica la informaci�n e intentalo de nuevo";

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

				
				$url="https://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$item . "&item2=" . $playera;
				
				echo "1///https://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$item . "&item2=" . $playera;
				

			}

			else if($type == 0 and $item=="5032") /*Enviar a arma tu entorno*/

			{

				echo "1///https://shopingcarttest.nikkenlatam.com/login-integration-incorporate-apartado.php?email=" . base64_encode($email)."&item=5032";
				//echo "1///http://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email);
				//echo "1///https://nikkenlatam.com/armatuentornotest/login-integration-incorporation.php?email=" . base64_encode($email);

			}
			else if($type == 0 and $item=="5031") /*Enviar a arma tu entorno*/

			{

				//echo "1///https://nikkenlatam.com/interno/carrito-compras-test/login-integration-incorporate-apartado.php?email=" . base64_encode($email)."&item=5032";
				echo "1///https://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email)."?force_change=".base64_encode('1441:14412');
				
				//echo "1///https://nikkenlatam.com/armatuentornotest/login-integration-incorporation.php?email=" . base64_encode($email);

			}

			else

			{

				echo "<strong>no fue posible detectar el tipo de incorporaci�n</strong>, por favor verifica la informaci�n e intentalo de nuevo";

				exit;

			}

		}

	}

	/*Guardar registro en marketing*/

}

/*Guardar en base de datos*/



?>