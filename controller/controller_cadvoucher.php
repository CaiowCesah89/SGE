<?php
require_once "../conexao/conexao.php";
include "../functions/funcoes.php";

$entrada = $_POST['entrada'];
$codigologin = $_POST['txtlogin'];
$cliente = $_POST['txtnomecliente'];
$veiculo = $_POST['veiculos'];
$modalidade = $_POST['modalidades'];
$placa = $_POST['txtplaca'];
$tipopagamento = $_POST['txtformapagamento'];


if($entrada == "" || $cliente == "" || $veiculos == "" || $modalidade == "" || $placa == ""){
	echo "<script> alert('Não pode haver campos em branco.\n Você será redirecionado para a mesma página.');</script>";
	//header("refresh: 0; url=http:../view/cadvoucher.php");
}else{

	$sql= "select * from vouchers where vouplaca='$placa' and voustatus = 'Aberto';";
	$resultado= mysqli_query($conexao,$sql);
	$linhas= mysqli_affected_rows($conexao);

	if ($linhas>0) {
		echo "<script> alert('O vaículo informado já está estacionado no pátio!');</script>";
		//header("refresh: 0; url=http:../view/cadvoucher.php");
	}else{
		$sql1= "insert into vouchers(voufuncodigo, vounomecliente, voucarcodigo, vouplaca, voudthrentrada, vouprecodigo, voustatus) values($codigologin, '$cliente', $veiculo, '$placa', '$entrada', $modalidade, 'Aberto');";
		$resultado1 = mysqli_query($conexao,$sql);
		$linhas1 = mysqli_affected_rows($conexao);

		if($sql1){
			$_SESSION['mensagem'] = "gravadocomsucesso";
			echo "<script> alert('Salvo com sucesso!');</script>";
			//header("refresh: 0; url=http:../view/listarvouchers.php");
		}else{
			echo "<script> alert('O vaículo informado já está no pátio!');</script>";
			//header("refresh: 0; url=http:../view/cadvoucher.php");
		}
	}
}
?>