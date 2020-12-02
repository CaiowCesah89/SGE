<?php 
require_once "../conexao/conexao.php";

$login= $_POST['login'];
$senha= $_POST['senha'];
$senha_segura = password_hash($senha, PASSWORD_DEFAULT);

$sql= "select usucodigo,usulogin,ususenha,usustatus,funnome,funsexo from usuarios inner join funcionarios on usucodigo = funusucodigo where usulogin='$login';";

$query= mysqli_query($conexao,$sql);
$linhas= mysqli_affected_rows($conexao);

if ($linhas>0) {
	session_start();
	$_SESSION['login']=$login;
	while($vetorusuario=mysqli_fetch_array($query)) {
		
		$id= $vetorusuario[0];
		$login= $vetorusuario[1];
		$senha_db= $vetorusuario[2];
		$status= $vetorusuario[3];
		$nome= $vetorusuario[4];
		$sexo= $vetorusuario[5];
	}
	$_SESSION['codigo']=$id;
	$_SESSION['senha']=$senha_db;
	$_SESSION['status']=$status;
	$_SESSION['nome']=$nome;
	$_SESSION['sexo']=$sexo;
	if($_SESSION['status']=="Inativo"){
		echo "<script> alert('Usuário Inativo. Favor procurar o administrador do sistema!');</script>";
		header("refresh: 0; url=http:../index.php");
	}else if(password_verify($senha, $senha_db)){
		if (($_SESSION['login']=="$login")&&($_SESSION['senha']=="$senha_db")) {
			header("Location:../view/home.php");
		}else{
			echo "<script>alert('Os dados utilizados para LOGIN são inválidos!')</script>";
			echo "<script>location='../index.php';</script>";
		}
	}else{
		echo "<script>alert('Senha errada!');</script>";
		echo "<script>location='../index.php';</script>";
	}
}else{
	echo "<script>alert('Os dados utilizados para LOGIN são inválidos!!');</script>";
	echo "<script>location='../index.php';</script>";
}