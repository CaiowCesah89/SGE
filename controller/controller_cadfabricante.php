<?php
require_once "../conexao/conexao.php";
include "../functions/funcoes.php";

$razaosocial = $_POST['razaosocial'];
$nomefantasia = $_POST['nomefantasia'];

$sql = "INSERT INTO fabricantes (fabrazaosocial, fabnomefantasia) VALUES ('$razaosocial', '$nomefantasia');";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_affected_rows($conexao);

if($linhas > 0){
	echo "<script> alert('Fabricante salvo com sucesso!');</script>";
	header("refresh: 0; url=http:../view/home.php");
}else{
	echo "<script> alert('Operação não realizada, o fabricante não foi adicionado ao banco de dados.');</script>";
	header("refresh: 0; url=http:../view/cadfabricante.php");
}
?>