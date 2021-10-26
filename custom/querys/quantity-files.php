<?php 
@session_name("pruebas");
session_start();
if(isset($_SESSION["count_files"])){
	session_destroy();
}
@session_name("pruebas");
session_start();
/*vars*/
$id = $_POST["id"];
$carpeta = '../../files-upload/' . $id . '/';
/*vars*/

$counter = 0;

if(is_dir($carpeta)){
    if($dir = opendir($carpeta)){
        while(($archivo = readdir($dir)) !== false){
        	if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                $counter++;
                $_SESSION["count_files"]=$counter;
            }
        }

        closedir($dir);
    }
}

echo $counter;

?>