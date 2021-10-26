<?php
@session_name("pruebas");
session_start();
if(isset($_SESSION["cou"])) {
	$var1=$_SESSION["cou"];
	$counter1 = $var1;
}

$count1=$_SESSION["count_files"];
if(isset($_POST['file'])) {
	$counter1++;
	$_SESSION["cou"]=$counter1;
	if(file_exists($file)){
		unlink($file);
		
	}
}
/*
if (isset($_POST['file'])) {
    $file = $_POST['file'];
	
    if(file_exists($file))
		unlink($file);
}
*/
?>