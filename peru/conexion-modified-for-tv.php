<?php
function connect_kit()
{
	$conn = mysqli_connect("104.130.46.73", "nikkenla_mkrt", 'NNikken2011$$');
	mysqli_select_db($conn, "nikkenla_incorporation");
	mysqli_set_charset( $conn, 'utf8');

	return $conn;
}
function connect_mk()
{
	$conn = mysqli_connect("104.130.46.73", "nikkenla_mkrt", 'NNikken2011$$');
	mysqli_select_db($conn, "nikkenla_marketing");
	mysqli_set_charset( $conn, 'utf8');

	return $conn;
}

function connect_new_tv()
{
	$conn = mysqli_connect("52.52.67.160", "forge", "8L8xQ1O9l6cVZMBtBBKS");
	mysqli_select_db($conn, "mitiendanikken");
	mysqli_set_charset( $conn, 'utf8');

	return $conn;
}

function connect_new_tv_test()
{
	$conn = mysqli_connect("35.207.42.243", "forge", "jTalzP67KvNYWDVH4UBo");
	mysqli_select_db($conn, "testmitiendanikken_04_05_2019");
	mysqli_set_charset( $conn, 'utf8');

	return $conn;
}

function disconnect($result)
{
	mysqli_close($result);
}

?>
