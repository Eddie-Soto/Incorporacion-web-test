<?php

require_once('../../conexion-modified-for-tv.php');
require_once('../../functions.php'); /*Funciones*/

$type = $_POST["type"];

$country = $_POST["country"];

$type_incorporate = $_POST["type_incorporate"];


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

$item1=5006;
$item =  $_POST["type-kit"];
if($item == 5027 || $item=="5027"){
	$item=502719;
}elseif ($item == 5028 || $item=="5028") {
	$item=502819;
}elseif ($item == 5026 || $item=="5026") {
	$item=502619;
}elseif ($item == 5025 || $item=="5025") {
	$item=502519;
}elseif ($item == 5024 || $item=="5024") {
	$item=50249;
}elseif ($item == 5023 || $item=="5023") {
	$item=50239;
}



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

$residency_one = $_POST["residency_one"];

$residency_two = $_POST["residency_two"];

$residency_three = $_POST["residency_three"];

$residency_four = $_POST["residency_four"];

$name_legal_representative = $_POST["name_legal_representative"];

$verify_digit = $_POST['verify_digit'];

$type_document = $_POST["type_document"];

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

$type_kit = $_POST["type-kit"];

$playera = $_POST["shirt-size"];

$tallaLetra = $_POST['tallaLetra'];



$type_sponsor = $_POST["type_sponsor"];

if($type_sponsor == 3)

{

	$user="Incorporacion web";

	$platform="https://nikkenlatam.com/incorporacion-web/";

	$sponsor = Assigned_sponsor($name,$email,$cellular,$country,$residency_two,$platform,$user);
	$sponsor=12345;

}


else

{

	$sponsor = $_POST["sponsor"];
	$sponsor=12345;

	if($sponsor == 0){	$sponsor = 0;	}



}

/*Variables*/



/*Generar codigo*/

$code = Code_consecutive();

/*Generar codigo*/


$created_at=date("Y-m-d H:i:s");

$sponsor=123456;

if(isset($_SESSION["boleto"])){
//if (isset($_SESSION["sponsor"]) && isset($_SESSION["kit"]) && isset($_SESSION["boleto"])) {

	$idticket=$_SESSION["boleto"];


try

	{

		$sql = "INSERT INTO user_promotion_kit (code_sponsor, code_redeem, kit, status, country_id, code_ticket, created_at) VALUES (:code_sponsor, :code_redeem, :kit, :status, :country_id, :code_ticket, :created_at)";

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
	echo "<strong>no fue posible guardar la incorporación</strong>, por favor verifica la información e intentalo de nuevo kit USD " . $e;

	exit;
}

}
/*Guardar en base de datos*/

try

{

	$sql = "INSERT INTO contracts (id_contract, country, code, name, type, type_incorporate, type_sponsor, sponsor, email, cellular, birthday, address, residency_one, residency_two, residency_three, residency_four, name_legal_representative, type_document, number_document, name_cotitular, type_document_cotitular, number_document_cotitular, bank, bank_type, number_account, number_clabe, rfc, ip, browser, gender, kit, playera, talla, verify_digit) VALUES (:id, :country, :code, :name, :type, :type_incorporate, :type_sponsor, :sponsor, :email, :cellular, :birthday, :address, :residency_one, :residency_two, :residency_three, :residency_four, :name_legal_representative, :type_document, :number_document, :name_cotitular, :type_document_cotitular, :number_document_cotitular, :bank, :bank_type, :number_account, :number_clabe, :rfc, :ip, :browser, :gender, :kit, :playera, :tallaLetra, :verify_digit)";

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

		'verify_digit' => $verify_digit

	]);

}

catch (Exception $e)

{

	$result = $e;

}



if($result != true)

{

	echo "<strong>no fue posible guardar la incorporación</strong>, por favor verifica la información e intentalo de nuevo " . $result;

	exit;

}

else

{

	/*Guardar registro en marketing*/

	try

	{

		$sql = "INSERT INTO nikkenla_marketing.control_ci (pais, tipo, codigo, nombre, codigop, correo, celular, b1, b2) VALUES (:pais, :tipo, :codigo, :nombre, :codigop, :correo, :celular, :b1, :b2)";

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



	if($result == false)

	{

		echo "<strong>no fue posible toda la incorporación</strong>, por favor verifica la información e intentalo de nuevo";

		exit;

	}

	else

	{

		try
	{
		/*
		$conn = connect_new_tv_test();
		$query="INSERT INTO users (country_id, email, sap_code, sap_code_sponsor, password,secret_nikken, client_type, rank, name, phone, cell_phone, state, status, created_at) values ('$country','$email','$code','$sponsor','0','$secret_nikken','$type_letter','Directo','$name','$cellular','$cellular','$residency_two','1','$created_at')";

		$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

		disconnect($conn);
	*/
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


			if($type == 0 && $country == 1){
				echo "1///https://colsiniva.nikkenlatam.com/autologinc?sap_code=".base64_encode($code);
			}elseif($type == 1 && $country == 1 && $type_kit==5028){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);
				// echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
				 echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
			}elseif($type == 1 && $country == 1 && $type_kit==5027){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);
				 //echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
				 echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
			}elseif($type == 1 && $country == 1 && $type_kit==5026){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.'502419:1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				 //echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
				 echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
			}
			elseif($type == 1 && $country == 1 && $type_kit==5025){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.'502319:1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				 //echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
				 echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
			}
			elseif($type == 1 && $country == 1 && $type_kit==5024){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				 //echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
				 echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
			}elseif($type == 1 && $country == 1 && $type_kit==5023){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				// echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
				 echo "1///https://nikkenlatam.com/services/checkout/redirect.php?app=incorporacion&data=$data";
			}elseif($type == 1 && $country == 1 && $type_kit==5006){
				echo "1///https://shopingcart.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$type_kit. "&item2=" . $playera;
			}

			elseif($type == 1 && $country != 1) /*Enviar a 7/10*/

			{

				echo "1///https://shopingcart.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$type_kit. "&item2=" . $playera;

			}
			elseif($type == 0 and $country!=1) /*Enviar a arma tu entorno*/

			{

				//echo "1///https://nikkenlatam.com/armatuentorno/login-integration-incorporation.php?email=" . base64_encode($email);

				echo "1///http://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email);

			}

			else

			{

				echo "<strong>no fue posible detectar el tipo de incorporación</strong>, por favor verifica la información e intentalo de nuevo";

				exit;

			}


		}

	}

	/*Guardar registro en marketing*/

}

/*Guardar en base de datos*/



?>