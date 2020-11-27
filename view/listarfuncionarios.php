<?php 
include "../functions/funcoes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="icon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/css_listarfuncionarios.css">
	<script language="javascript" src="../js/script_projdesenweb.js"></script>
	<script src="../jquery/jQuery.js"></script>
	<title>Listando Funcionários</title>
</head>
<body>
	<?php
	require_once '../view/cabecalho.php';
	?>
	<form class="form" name="formlistarfuncionarios" action="?acao=Excluir" method="post" accept-charset="utf-8">
		<table>
			
			<thead>
				<tr>
					<th colspan="9">LISTA DE FUNCIONÁRIOS</th>
				</tr>
			</thead>
			<tbody>
				<tr align="right">
					<td colspan="8"><label>INFORME NOME OU CPF:</label><input type="text" name="txtpesqfuncionario" size="70" autofocus="txtpesqfuncionario"></td>
					<td><input class="button" type="submit" name="btpesqfuncionario" value="PESQUISAR"></td>
				</tr>
				<tr><td colspan="9"></td></tr>
				<tr><td colspan="9"></td></tr>
				<tr><td colspan="9"></td></tr>
				<tr>
					<td class="tdcenter">CÓDIGO</td>
					<td class="tdcenter">NOME</td>
					<td class="tdcenter">CPF</td>
					<td class="tdcenter">SEXO</td>
					<td class="tdcenter">USUÁRIO</td>
					<td class="tdcenter">STATUS</td>
					<td class="tdcenter">EDITAR</td>
					<td class="tdcenter">EXCLUIR</td>
					<td class="tdcenter">DESATIVAR / ATIVAR</td>
				</tr>
				<tr>
					<?php
					if(isset($_POST['btpesqfuncionario'])){ 
						$funnome = $_POST['txtpesqfuncionario'];
						pesquisaFuncionarioByLikeNome($funnome);
					}else{
						pesquisaTodosFuncionarios();
					}
					?>
				</tr>
			</tbody>
			<footer>
				<tfoot>
					<tr align="right"><td colspan="9"><input class="button" type="button" name="Voltar" value="VOLTAR" onclick="location='http://localhost:8090/view/home.php';"></td></tr>
				</tfoot>
			</footer>
			
		</table>
	</form>
	<?php 
	require_once '../view/rodape.php';
	?>
</body>
</html>