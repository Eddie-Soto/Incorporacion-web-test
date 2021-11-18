<?php 
date_default_timezone_set("America/Bogota");
if(!isset($_SESSION)) 
    { 
         
    

session_name("incorporacion");
session_start();
@session_name("pruebas");
session_start();
}
require_once('../../conexion-modified-for-tv.php');
require_once('../../functions.php'); /*Funciones*/

$type = $_POST["type"];

$country = $_POST["country"];

$type_incorporate = $_POST["type_incorporate"];

/* Logica que verifica el nuemro de archivos al final del formularío solo para COLOMBIA */
/*
if($country == 1){
	if($type == 1 and $type_incorporate == 1){ // si es asesor y es persona natural
		if(isset($_SESSION["cou"])) {
				$count1=$_SESSION["count_files"];
				$ope = $count1 - $_SESSION["cou"];
				if($ope < 1){
					echo "Verifica el número de archivos que debes subir en el paso 3 <strong> debes subir 1 archivo </strong> <br>";
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
					echo "Verifica el número de archivos que debes subir en el paso 3 <strong> debes subir 5 archivos </strong> <br>";
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
					echo "Verifica el número de archivos que debes subir en el paso 3 <strong> debes subir 4 archivos </strong> <br>";
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
/* Logica que verifica el nuemro de archivos al final del formularío solo para COLOMBIA */


/*Variables*/

if (empty($_POST['checkip'])){ $ip = $_SERVER["REMOTE_ADDR"]; }else{ $ip = $_POST['checkip']; } //Consultar IP

$browser = $_SERVER['HTTP_USER_AGENT']; //Consultar navegador



$id = $_POST["id"];

//$type = $_POST["type"];

$type_letter = Type_letter($type);

//country = $_POST["country"];

//$type_incorporate = $_POST["type_incorporate"];

$last_name = strtoupper($_POST["last_name"]);

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


/* =====================================================*/

//$item =  $_POST["type-kit"];
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

if(isset($_SESSION["boleto"])){
		$sponsor=$_SESSION["sponsor"];
//if (isset($_SESSION["sponsor"]) && isset($_SESSION["kit"]) && isset($_SESSION["boleto"])) {

	$idticket=$_SESSION["boleto"];

	$type_kit=5002;


try

	{

		$sql = "INSERT INTO nikkenla_incorporation.user_promotion_kit_test (code_sponsor, code_redeem, kit, status, country_id, code_ticket, created_at) VALUES (:code_sponsor, :code_redeem, :kit, :status, :country_id, :code_ticket, :created_at)";

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


try

{

	if ($bank=='') {
		$bank=0;
		# code...
	}


		$conn = connect_mk();
		$query="INSERT INTO nikkenla_incorporation.contracts_test (id_contract, country, code, name, type, type_incorporate, type_sponsor, sponsor, email, cellular, birthday, address, residency_one, residency_two, residency_three, residency_four, name_legal_representative, type_document, number_document, name_cotitular, type_document_cotitular, number_document_cotitular, bank, bank_type, number_account, number_clabe, ip, browser, gender, kit, playera, talla) VALUES ('$id', '$country', '$code', '$name', '$type', '$type_incorporate', '$type_sponsor', '$sponsor', '$email', '$cellular', '$birthday', '$address', '$residency_one', '$residency_two', '$residency_three', '$residency_four', '$name_legal_representative', '$type_document', '$number_document', '$name_cotitular', '$type_document_cotitular', '$number_document_cotitular', '$bank', '$bank_type', '$number_account', '$number_clabe', '$ip', '$browser',  '$gender', '$type_kit', '$playera', '$tallaLetra')";

		$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

		disconnect($conn);

}

catch (Exception $e)

{

	$result = $e;
	echo $result;
	exit;

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
				 echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				// echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
			}elseif($type == 1 && $country == 1 && $type_kit==5027){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);
				 echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				 //echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
			}elseif($type == 1 && $country == 1 && $type_kit==5026){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.'502419:1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				 echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				 //echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
			}
			elseif($type == 1 && $country == 1 && $type_kit==5025){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$item1.':1;'.'502319:1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				 echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				// echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
			}
			elseif($type == 1 && $country == 1 && $type_kit==5024){
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				 echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				 //echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
			}elseif($type == 1 && $country == 1 && $type_kit==5023){
				echo "entro al kit 5023";
				exit;
				$discount_abi = "S";

				 $products_checkout=$item.':1;'.$playera.':1;';

				 $data = base64_encode($email . "&" . $products_checkout . "&" . $discount_abi);

				echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
				 //echo "1///https://nikkenlatam.com/services/checkout/testredirect.php?app=incorporacion&data=$data";
			}elseif($type == 1 && $country == 1 && $type_kit==5006){
				echo "1///https://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$type_kit. "&item2=" . $playera;
			}
			elseif($type == 1 && $country == 1 && $type_kit==5002){
				echo "1///https://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$type_kit. "&item2=" . $playera;
			}

			elseif($type == 1 && $country != 1) /*Enviar a 7/10*/

			{

				echo "1///https://shopingcarttest.nikkenlatam.com/login-integration-incorporate.php?email=" . base64_encode($email)."&item=".$type_kit. "&item2=" . $playera;

			}
			elseif($type == 0 and $country!=1) /*Enviar a arma tu entorno*/

			{

				//echo "1///https://nikkenlatam.com/armatuentorno/login-integration-incorporation.php?email=" . base64_encode($email);

				echo "1///https://test.mitiendanikken.com/mitiendanikken/auto/login/". base64_encode($email);

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