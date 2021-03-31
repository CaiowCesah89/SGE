<?php
require_once "../conexao/conexao.php";
include "../functions/funcoes.php";

$carmodelo 			= $_POST['carmodelo'];
$carfabcodigo		= $_POST['carfabcodigo'];

if($carfabcodigo == "Selecione"){
	echo "<script> alert('Você deve selecionar um fabricante.');</script>";
	header("refresh: 0; url=http:../view/cadcarros.php");
}else{

$sql = "INSERT INTO carros (carmodelo, carfabcodigo) VALUES ('$carmodelo','$carfabcodigo')";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_affected_rows($conexao);

if($resultado > 0){
	echo "<script> alert('Veículo adicionado ao banco de dados com sucesso!');</script>";
	header("refresh: 0; url=http:../view/cadcarros.php");
}else{
	echo "<script> alert('Veículo não adicionado ao banco de dados!');</script>";
	header("refresh: 0; url=http:../view/cadcarros.php");
}
}
?>