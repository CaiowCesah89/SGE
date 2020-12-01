<?php
require_once "../conexao/conexao.php";
include "../functions/funcoes.php";

$fabnome 			= $_POST['fabnome'];
$fabdescricao		= $_POST['fabdescricao'];

$result = "INSERT INTO fabricantes (fabnome, fabdescricao) VALUES ('$fabnome','$fabdescricao')";
mysqli_query($conexao, $result);

if(mysql_insert_id($conexao)){
	header('Location: ../view/cadfabricante.php');
}else{
	header('Location: ../view/cadfabricante.php');
}

?>