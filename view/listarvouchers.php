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
	<form class="form" name="formlistarvouchers" action="" method="post" accept-charset="utf-8">
		<table>
			
			<thead>
				<tr>
					<th colspan="9">LISTA DE VOUCHERS</th>
				</tr>
			</thead>
			<tbody>
				<tr align="right">
					<td colspan="8"><label>INFORME NOME DO CLIENTE OU PLACA DO CARRO:</label><input type="text" class="input" name="txtpesqvouchers" size="40" autofocus="txtpesqvouchers"></td>
					<td><input class="button" type="submit" name="btpesqvouchers" value="PESQUISAR"></td>
				</tr>
				<tr><td colspan="9"></td></tr>
				<tr><td colspan="9"></td></tr>
				<tr><td colspan="9"></td></tr>
				<tr>
					<td class="tdcenter">CÓDIGO</td>
					<td class="tdcenter">NOME CLIENTE</td>
					<td class="tdcenter">MODELO CARRO</td>
                    <td class="tdcenter">PLACA CARRO</td>
					<td class="tdcenter">MODALIDADE</td>
					<td class="tdcenter">DATA HORA ENTRADA</td>
					<td class="tdcenter">EDITAR</td>
					<td class="tdcenter">EXCLUIR</td>
					<td class="tdcenter">FINALIZAR</td>
				</tr>
				<tr>
					<?php
					if(isset($_POST['btpesqvouchers'])){ 
						$pesquisa = $_POST['txtpesqvouchers'];
						pesquisaVoucherByLikeNomePlaca($pesquisa);
					}else{
						pesquisaTodosVouchers();
					}
					?>
				</tr>
			</tbody>
			<footer>
				<tfoot>
					<tr align="right"><td colspan="9"><input class="button" type="button" name="Voltar" value="VOLTAR" onclick="location='http:../view/home.php';"></td></tr>
				</tfoot>
			</footer>
			
		</table>
	</form>
	<?php 
	require_once '../view/rodape.php';
	?>
</body>
</html>