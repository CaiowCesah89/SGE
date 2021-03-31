<?php 
require_once "../conexao/conexao.php";
include "../functions/funcoes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<script language="javascript" src="../js/script_projdesenweb.js"></script>
	<script src="../jquery/jQuery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/css_cadfabricante.css">
	<meta charset="utf-8"/>
	<title>Cadastro de Fabricantes</title>
</head>
<body>
	<?php 
	require_once "../view/cabecalho.php";
	?>
		<fieldset >
				<legend>Cadastro de Fabricantes</legend>
				<form class="form" method="post" action="../controller/controller_cadfabricante.php">
					<div>
						<label>Nome da Fabricante:</label>
						<input class="input" type="text" name="razaosocial" autocomplete="off" required autofocus>	
					</div>
					<div>
						<label>Descrição da Fabricante:</label>
						<input class="input" type="text" name="nomefantasia" autocomplete="off" required>	
					</div>
					<div class="submit">
						<input class="submitlayout" type="submit" name="btsalvar" value="SALVAR">
						<input class="submitlayout" type="button" name="btvoltar" value="VOLTAR" onclick="location='http:../view/home.php';">
						<input class="submitlayout" type="reset" name="reset" value="LIMPAR">
					</div>
				</form>
		</fieldset>
	<?php 
	require_once "../view/rodape.php";
	?>
</body>
</html>