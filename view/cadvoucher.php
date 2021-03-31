<?php 
include "../functions/funcoes.php";

function pegaDataHora(){
	echo $today = date("Y-m-d H:i:s");
}
?>
<!DOCTYPE html>
<html>
<head>
	<script language="javascript" src="../js/script_projdesenweb.js"></script>
	<script src="../jquery/jQuery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/css_cadvoucher.css">
	<meta charset="utf-8"/>
	<title>Voucher</title>
</head>
<body onload="showtime()">
	<?php 
	require_once "../view/cabecalho.php";
	?>
	<form class="form" name="clock" method="POST" action="../controller/controller_cadvoucher.php" accept-charset="utf-8">
		<fieldset>
			<table border="0">
				<legend>Registro de Entrada de Veículos</legend>	
				<tbody>
					<tr>
						<td><label>DATA/HORA ENTRADA:</label></td>
						<td><input class="inputhora" type="text" name="entrada" value="<?php pegaDataHora(); ?>" autocomplete="off" readonly></td>
						<td><label>HORA ATUAL:<input class="inputrelogio" type="text" name="txthora" disabled></label></td>
					</tr>
					<tr>
						<td><label>CLIENTE:</label></td>
						<td><input class="input" type="text" name="txtnomecliente" autofocus autocomplete="off" maxlength="100" required></td>
					</tr>
					<tr>
						<td><label>VEÍCULO:</label></td>
						<td><?php MontaSelectVeiculos(); ?></td>
					</tr>
					<tr>
						<td><label>MODALIDADE:</label></td>
						<td><?php MontaSelectModalidades(); ?></td>
					</tr>					
					<tr>
						<td><label>PLACA:</label></td>
						<td><input class="inputplaca" type="text" name="txtplaca" autocomplete="off" maxlength="8" onkeyup="FormataPlaca(this,event)" required></td>
					</tr>
					<tr>
						<td><label>FORMA DE PAGAMENTO:</label></td>
						<td>
							<input type='radio' name='txtformapagamento' id='formapagamento' value='Dinheiro' checked>Dinheiro
							<input type='radio' name='txtformapagamento' id='formapagamento' value='Cartao'>Cartão
						</td>
					</tr>
					<tr align="right">
						<td colspan="4">
							<input class="submit" type="submit" name="btsalvar" value="SALVAR">
							<input class="submit" type="button" name="btvoltar" value="VOLTAR" onclick="location='http:../view/home.php';">
							<input class="submit" type="reset" name="reset" value="LIMPAR">
							<input type="hidden" name="txtlogin" value="<?php echo $_SESSION['codigo']; ?>">
						</td>
					</tr>					
				</tbody>			
			</table>
		</fieldset>
	</form>
	<script>
		function showtime()
		{ setTimeout("showtime();",1000);
		callerdate.setTime(callerdate.getTime()+1000);
		var hh = String(callerdate.getHours());
		var mm = String(callerdate.getMinutes());
		var ss = String(callerdate.getSeconds());
		document.clock.txthora.value =
		((hh < 10) ? " " : "") + hh +
		((mm < 10) ? ":0" : ":") + mm +
		((ss < 10) ? ":0" : ":") + ss;
	}
	callerdate=new Date(<?php echo date("Y,m,d,H,i,s");?>);
</script>
<?php 
require_once "../view/rodape.php";
?>
</body>
</html>