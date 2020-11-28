<?php 
include "../functions/funcoes.php";
//if(isset($_POST['btsalvar'])){ 
//    $login = $_POST['txtlogin'];
 //   pesquisaLogin($login);
//}
?>
<!DOCTYPE html>
<html>
<head>
	<script language="javascript" src="../js/script_projdesenweb.js"></script>
	<script src="../jquery/jQuery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/css_cadfuncionario.css">
	<meta charset="utf-8"/>
	<title>Cadastro de Funcionário</title>
</head>
<body>
	<?php 
	require_once "../view/cabecalho.php";
	?>
	<form class="form" name="formcadfuncionario" method="post" action="../controller/controller_cadfuncionario.php" accept-charset="utf-8">
		<fieldset>
			<table>
				<legend>Cadastro de Funcionário</legend>	
				<tbody>
					<tr>
						<td><label class="label">NOME:</label></td>
						<td><input class="input" type="text" name="txtnome" autocomplete="off" autofocus placeholder="Informe seu nome completo." maxlength="100"></td>
					</tr>
					<tr>
						<td><label>CPF:</label></td>
						<td><input class="inputcpf" type="text" name="txtcpf" autocomplete="off" size="30" maxlength="14" placeholder="Informe seu cpf" onkeyup="FormataCpf(this,event)"></td>
					</tr>
					<tr>
						<td><label>DATA DE NASCIMENTO:</label></td>
						<td><input class="inputdata" type="date" name="txtdtnascimento" autocomplete="off" maxlength="10"></td>
					</tr>
					<tr>
						<td><label>ESTADO:</label></td>
						<td>
							<?php
							MontaSelectEstados();
							?>
						</td>
					</tr>
					<tr>
						<td><label>CIDADE:</label></td>
						<td>
							<select class="inputcidade" name="txtcidades" id="cidades" style="display: none"></select>
						</td>
					</tr>
					<tr>
						<td><label>BAIRRO:</label></td>
						<td>
							<select class="inputbairro" name="txtbairros" id="bairros" style="display: none"></select>
						</td>
					</tr>
					<tr>
						<td><label>ENDEREÇO:</label></td>
						<td><input class="input" type="text" name="txtendereco" autocomplete="off" maxlength="100" placeholder="informe seu endereço aqui"></td>
					</tr>
					<tr>
						<td><label>SEXO:</label></td>
						<td>
							<input class="radio" type='radio' name='txtsexo' id='sexo' value='Masculino' checked>Masculino
							<input class="radio" type='radio' name='txtsexo' id='sexo' value='Feminino'>Feminino
							<input class="radio" type='radio' name='txtsexo' id='sexo' value='Outros'>Não Informar
						</td>
					</tr>
					<tr>
						<td><label>LOGIN:</label></td>
						<td><input class="input" type="text" name="txtlogin" placeholder="informe seu login aqui" autocomplete="off" maxlength="20"></td>
					</tr>
					<tr>
						<td><label>SENHA:</label></td>
						<td><input class="input" type="password" name="txtsenha" placeholder="informe a sua senha aqui"></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input class="submit" type="submit" name="btsalvar" value="SALVAR">
							<input class="submit" type="button" name="btvoltar" value="VOLTAR" onclick="location='http:../view/home.php';">
							<input class="submit" type="reset" name="reset" value="LIMPAR">
						</td>
					</tr>
				</tbody>			
			</table>
		</fieldset>
	</form>
	<script>
		$("#estados").on("change",function(){
			var idEstado = $("#estados").val();
			$.ajax({
				url: 'pega_cidades.php',
				type: 'POST',
				data: {id:idEstado},
				beforeSend: function(){
					$("#cidades").css({'display':'block'});
					$("#cidades").html("Carregano...");
				},
				success: function(data){
					$("#cidades").css({'display':'block'});
					$("#cidades").html(data);
				},
				error: function(data){
					$("#cidades").css({'display':'block'});
					$("#cidades").html("Ocorreu um erro ao carregar...");
				}
			});
		});

		$("#cidades").on("change",function(){
			var idCidade = $("#cidades").val();
			$.ajax({
				url: 'pega_bairros.php',
				type: 'POST',
				data: {id:idCidade},
				beforeSend: function(){
					$("#bairros").css({'display':'block'});
					$("#bairros").html("Carregano...");
				},
				success: function(data){
					$("#bairros").css({'display':'block'});
					$("#bairros").html(data);
				},
				error: function(data){
					$("#bairros").css({'display':'block'});
					$("#bairros").html("Ocorreu um erro ao carregar...");
				}
			});
		});
	</script>
	<?php 
	require_once "../view/rodape.php";
	?>
</body>
</html>