<?php


$serverName = "200.66.68.173"; //serverName\instanceName
$connectionInfo = array( "Database"=>"RETOS_ESPECIALES", "UID"=>"latamti", "PWD"=>"N1k3N$17!");
try {
	$conn = sqlsrv_connect($serverName, $connectionInfo);

if($conn) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die(print_r(sqlsrv_errors(),true));
}
} catch (Exception $e) {
	echo "ocuerio un erroo".$e;
	exit;
}

?>