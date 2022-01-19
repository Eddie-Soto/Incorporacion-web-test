
/*
[dbo].[logErroresSignup]
*/

<?php
/* EL web service detecta si escribes un correo con la palabra test o nikken no aisgna el sponsor y esto genera un error */
$name="Jose Daniel Chacón Bogarín";
$email="jdcb92@gmail.com ";
$phone="8339-3124";
$country="8";
$state="San José";
$platform="Incorporacion Web";
$user="Asesor";


echo "nombre: ".$name."<br>";
echo "correo: ".$email."<br>";
echo "telefono: ".$phone."<br>";
echo "pais: ".$country."<br>";
echo "estado: ".$state."<br>";
echo "plataforma: ".$platform."<br>";
echo "usuario: ".$user."<br>";
        
            try {
                 //Asignar sponsor

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,"https://servicios.nikkenlatam.com/panel/administracion/services/assigned-sponsor/prod.php");
              //  curl_setopt($ch, CURLOPT_URL,"servicios.nikkenlatam.com/panel/administracion/services/assigned-sponsor/index.php");
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&email=$email&phone=$phone&country=$country&state=$state&platform=$platform&user=$user");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $remote_server_output = curl_exec ($ch);

                $data = $remote_server_output;

                print_r($data);
                
                $codes =  substr($data, 4);
                $array = explode("|",$codes);

                $code = $array[0];

                $id = $data[0];
               
                trim($id);

                if($id == "1"){
            return $code;
        }else{
            echo "<strong>no fue posible toda la incorporación</strong>, error al asignar sponsor";
                exit;
        }     
               
            } catch (Exception $e) {

                echo($e->getMessage());
               
            }
        

?>