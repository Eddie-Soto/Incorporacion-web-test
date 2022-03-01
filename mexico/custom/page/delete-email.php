<?php
try
      {
        $mysqli = new mysqli("52.8.217.47", "forge", "jTalzP67KvNYWDVH4UBo","testmitiendanikken_04_05_2019");

        /* comprobar la conexión */
        if ($mysqli->connect_errno){
          echo ("Falló la conexión:".$mysqli->connect_error);
          exit;
        }
        $resultado = $mysqli->query("UPDATE users set email='' where email=''
          SELECT email from users where email='$email' and client_type = 'CLIENTE'");
        /* Crear una tabla que no devuelve un conjunto de resultados */
        if (mysqli_num_rows($resultado)){


          echo "<script>Swal.fire({
  title: '¿Deseas liberar el correo, para contunuar con tu incorporación?',
  showDenyButton: true,
  confirmButtonText: 'Si, Liberar Correo',
  denyButtonText: `Cancelar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    var isbilling = $('input[name=billing-type]:checked', '#wrapped').val();

    $.ajax({

        url: 'custom/page/delete-email.php',

        data: 'type_incorporate=' + type_incorporate + '&isbilling=' + isbilling,

        success: function(resp){

         $('#type-billing').html(resp)

         }

    });
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
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

?>