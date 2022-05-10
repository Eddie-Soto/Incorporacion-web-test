<?php 

require_once('../../functions.php'); /*Funciones*/

@session_name("incorporacion");
@session_start();

$type = $_GET["type"];
$type_person = $_GET["type_incorporate"];
$country = $_GET["country"];

/*vars*/

$type_billing_value = "Selecciona una Opción";

?><option value="" selected><?php echo $type_billing_value ?></option><?php


$queryResult = $pdo->prepare("SELECT id_sap,name FROM nikkenla_incorporation.type_billing WHERE type_person = :type_person and type_incorporate = :type and country = :country;");
//$queryResult = $pdo->prepare("SELECT id_type, name FROM type_documents where type = :type and country = :country order by name ASC");
$queryResult->execute(array(':type_person' => $type_person, ':type' => $type, ':country' => $country));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	$name = trim($row['name']);
	?><option value="<?php echo $row['id_sap'] ?>"><?php echo $name ?></option>

	
	<?php
}

?>
