<?php
require_once "../conexao/conexao.php";
include "../functions/funcoes.php";

$carmodelo 			= $_POST['carmodelo'];
$carfabcodigo		= $_POST['carfabcodigo'];

$result = "INSERT INTO carros (carmodelo, carfabcodigo) VALUES ('$carmodelo','$carfabcodigo')";
mysqli_query($conexao, $result);
mysqli_affected_rows($conexao);

if(mysql_insert_id($result)){
	header('Location: ../view/cadcarros.php');
}else{
	echo("erro");
	//header('Location: ../view/cadcarros.php');
}

?>