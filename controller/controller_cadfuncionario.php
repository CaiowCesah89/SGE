<?php
require_once "../conexao/conexao.php";
include "../functions/funcoes.php";

$nome 			= $_POST['txtnome'];
$cpf 			= $_POST['txtcpf'];
$dtnascimento 	= $_POST['txtdtnascimento'];
$estado 		= $_POST['txtestados'];
$cidade 		= $_POST['txtcidades'];
$bairro 		= $_POST['txtbairros'];
$endereco 		= $_POST['txtendereco'];
$sexo 			= $_POST['txtsexo'];
$login 			= $_POST['txtlogin'];
$senha 			= $_POST['txtsenha'];


if($nome == "" || $cpf == "" || $dtnascimento == "" || $estado == "Selecione" || $cidade == "Selecione" || $bairro == "Selecione" || $endereco == "" || $sexo == "" || $login == "" || $senha == ""){
	echo "<script> alert('Não pode haver campos em branco.\n Você será redirecionado para a mesma página.');</script>";
	header("refresh: 0; url=http:../view/cadfuncionario.php");
}else{

	$senha_segura = password_hash($senha, PASSWORD_DEFAULT);

	$sql= "select * from usuarios where usulogin='$login';";
	$resultado= mysqli_query($conexao,$sql);
	$linhas= mysqli_affected_rows($conexao);

	$sql0= "select * from funcionarios where funcpf= '$cpf';";
	$resultado0= mysqli_query($conexao,$sql0);
	$linhas0= mysqli_affected_rows($conexao);

	if ($linhas>0) {
		echo "<script> alert('O usário informado já existe no banco de dados!');</script>";
		header("refresh: 0; url=http:../view/cadfuncionario.php");
	}else if($linhas0>0){
		echo "<script> alert('O CPF informado já existe no banco de dados!');</script>";
		header("refresh: 0; url=http:../view/cadfuncionario.php");
	}else{

		$sql1 = "insert into usuarios(usulogin, ususenha, usustatus) VALUES ('$login', '$senha_segura','Ativo');";
		$resultado1 = mysqli_query($conexao,$sql1);
		$linhas1 = mysqli_affected_rows($conexao);

		$sql2= "select * from usuarios where usulogin='$login';";
		$resultado2= mysqli_query($conexao,$sql2);
		$linhas2= mysqli_affected_rows($conexao);

		if ($linhas2>0) {
			while($vetorfuncionarios=mysqli_fetch_array($resultado2)) {			
				$id= $vetorfuncionarios[0];
				$login= $vetorfuncionarios[1];
				$senha_db= $vetorfuncionarios[2];
				$status= $vetorfuncionarios[3];
			}
			$sql3 = "insert into funcionarios(funnome, funcpf, fundtnascimento, funestcodigo, funcidcodigo, funbaicodigo, funendereco, funsexo, funstatus, funusucodigo) VALUES ('$nome', '$cpf', '$dtnascimento', $estado, $cidade, $bairro, '$endereco', '$sexo','Ativo', $id)";

			$resultado3 = mysqli_query($conexao,$sql3);
			$linhas3 = mysqli_affected_rows($conexao);

			if($sql3){
				$_SESSION['mensagem'] = "gravadocomsucesso";
				echo "<script> alert('Salvo com sucesso!');</script>";
				header("refresh: 0; url=http:../view/cadfuncionario.php");
			}else{
				header('Location:../view/home.php');
			}
		}
	}
}
?>