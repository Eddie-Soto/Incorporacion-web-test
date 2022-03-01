<?php 

echo '<script> //AJAX

    function Ajax()

    {

        /* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por

        lo que se puede copiar tal como esta aqui */

        var xmlhttp=false;

        try

        {

            // Creacion del objeto AJAX para navegadores no IE

            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");

        }

        catch(e)

        {

            try

            {

                // Creacion del objet AJAX para IE

                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

            }

            catch(E) { xmlhttp=false; }

        }

        if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); }



        return xmlhttp;

    }

    //AJAX
 </script>';

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
					$row = mysqli_fetch_row($resultado);

					echo "<script>Swal.fire({
  title: '¿Deseas liberar el correo, para contunuar con tu incorporación?',
  showDenyButton: true,
  confirmButtonText: 'Si, Liberar Correo".$email = $row[0]."',
  denyButtonText: `Cancelar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
  	var email = document.getElementById('email-incorporate').value;

   
   $.ajax({

        url: './../mexico/custom/page/delete-email.php',

        data: 'email=' + email,

        success: function(resp){

         Swal.fire('¡Correo Liberado!', '', 'success')

         }

    });

    
    
  } else if (result.isDenied) {
    Swal.fire('Solicitud Cancelada', '', 'info')
  }
})
</script>";
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