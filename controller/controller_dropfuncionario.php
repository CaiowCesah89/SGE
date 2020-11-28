<?php 
require_once "../conexao/conexao.php";

$codigo = $_GET['funcodigo'];

$sql = "select * from funcionarios where funcodigo = '$codigo';";

$resultado= mysqli_query($conexao,$sql);
$linhas= mysqli_affected_rows($conexao);

if ($linhas>0) {
	while($funcionario=mysqli_fetch_array($resultado)) {			
		$codigousuario= $funcionario[10];
	}
	$sql0= "delete from funcionarios where funcodigo='$codigo';";	
	$resultado0= mysqli_query($conexao,$sql0);
	$linhas0= mysqli_affected_rows($conexao);

	if($linhas0>0){
		$sql1="delete from usuarios where usucodigo = '$codigousuario';";
		$resultado1= mysqli_query($conexao,$sql1);
		$linhas1= mysqli_affected_rows($conexao);

		echo "<script> alert('Exclusão realizada com sucesso!');</script>";
		header("refresh: 0; url=http:../view/listarfuncionarios.php");
	}else{
		echo "<script> alert('Exclusão não realizada, funcionário não encontrado!');</script>";
		header("refresh: 0; url=http:../view/listarfuncionarios.php");
	}
	
}else{
	echo "<script> alert('Funcionário não encontrado!');</script>";
	header("refresh: 0; url=http:../view/listarfuncionarios.php");
}
?>