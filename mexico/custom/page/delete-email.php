<?php

$email = $_GET["email"];
$email_depurado=$email.Date('YmdHis');




try
      {
        $mysqli = new mysqli("52.8.217.47", "forge", "jTalzP67KvNYWDVH4UBo","testmitiendanikken_04_05_2019");

        /* comprobar la conexión */
        if ($mysqli->connect_errno){
          echo ("Falló la conexión:".$mysqli->connect_error);
          exit;
        }
        $resultado = $mysqli->query("UPDATE users SET email='$email_depurado', status = 0, locked = 1 WHERE email='$email'");
        /* Crear una tabla que no devuelve un conjunto de resultados */
        if (mysqli_num_rows($resultado)){
          $row = mysqli_fetch_row($resultado);

          echo $row[0];
        }
   

   $mysqli->close();

      }
      catch (Exception $e)
      {
        $result = $e;
      }

      echo "succes";

?>