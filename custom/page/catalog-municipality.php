<?php 

require_once('../../functions.php'); /*Funciones*/


$state = $_GET["state"];
/*vars*/


?><option value="" selected>Ciudad</option><?php

$queryResult = $pdo->prepare("SELECT DISTINCT province_code, province_name FROM nikkenla_marketing.control_states where pais = 1 and abreviature_state = :state order by province_name ASC");
$queryResult->execute(array(':state' => $state));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['province_name'] ?>"><?php echo $row['province_name']; ?></option><?php
}

?>
