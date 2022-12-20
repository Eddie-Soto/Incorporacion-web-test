<?php

$queryResult = $pdo->prepare("SELECT number_document FROM contracts_test where number_document = :identification");
$queryResult->execute(array(':identification' => $identification));
$done = $queryResult->fetch();



echo "test";