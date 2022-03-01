<?php 



require_once('../../functions.php'); /*Funciones*/



/*vars*/

$email = $_POST["email"];

/*vars*/



$queryResult = $pdo->prepare("SELECT payment FROM contracts_test where email = :email");

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
		try
			{
				$mysqli = new mysqli("52.8.217.47", "forge", "jTalzP67KvNYWDVH4UBo","testmitiendanikken_04_05_2019");

				/* comprobar la conexión */
				if ($mysqli->connect_errno){
					echo ("Falló la conexión:".$mysqli->connect_error);
					exit;
				}
				$resultado = $mysqli->query("SELECT email from users where email='$email' and client_type = 'CLIENTE'");
				/* Crear una tabla que no devuelve un conjunto de resultados */
				if (mysqli_num_rows($resultado)){


					echo '<script> swal({
        title: "Cancelar",
        text: "¿Desea cancelar la revision de la aclaración?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, cancelar",
        cancelButtonText: "No deseo cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(result) {
        if (result.value) {
            var associateid = $("#nuevaCodigoPropietario").val();
            $.ajax({
                type: "GET",
                url: "/elimiarAclaracion",
                data: {
                    associateid: associateid,
                    factura: factura,
                },
                beforeSend: function(){
                    $("#loader_div_ajax").show();
                },
                success: function (response) {
                    if(response){
                        alert("Ok", "Se cancelo la solicitud de aclaración correctamente", "success");
                        navigationTracking(associateid, "Aclaracion de envios", "Abre modal de edición aclaracion "" + factura);
                    }
                    else{
                        alert("Ups", "No se pudo actualizar la información de la aclaración, intenta de nuevo", "error");
                    }
                    $("#loader_div_ajax").hide();
                    loadResumenAclaraciones()
                },
                error: function (){
                    alert("Ups", "No se pudo actualizar la información de la aclaración, intenta de nuevo", "error");
                    $("#loader_div_ajax").hide();
                }
            });
        }
    }); </script>';
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