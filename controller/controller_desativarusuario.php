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
	$sql1="update usuarios set usustatus='Inativo' where usucodigo = '$codigousuario';";
	$resultado1= mysqli_query($conexao,$sql1);
	$linhas1= mysqli_affected_rows($conexao);

	echo "<script> alert('Usuário desativado com sucesso!');</script>";
	header("refresh: 0; url=http:../view/listarfuncionarios.php");
}else{
	echo "<script> alert('Operação não realizada, usuário não encontrado!');</script>";
	header("refresh: 0; url=http:../view/listarfuncionarios.php");
}
?>