<?php 

require_once('../../functions.php'); /*Funciones*/

@session_name("incorporacion");
@session_start();


$type = $_GET["type"];
$country = $_GET["country"];
$type_incorporate = $_GET["type_incorporate"];

echo $type;

/*vars*/

$type_billing_value = "Regimwn Fiscal";

?><option value="" selected><?php echo $type_billing_value ?></option><?php


$queryResult = $pdo->prepare("SELECT id_sap,name FROM nikkenla_incorporation.type_billing WHERE type_incorporate = :type and type_person = :type_incorporate and country = :country;");
//$queryResult = $pdo->prepare("SELECT id_type, name FROM type_documents where type = :type and country = :country order by name ASC");
$queryResult->execute(array(':type' => $type, ':type_incorporate' => $type_incorporate ':country' => $country));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	$name = trim($row['name']);
	?><option value="<?php echo $row['id_sap'] ?>"><?php echo $name ?></option>

	
	<?php
}

?>
