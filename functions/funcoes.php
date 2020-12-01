<?php
include_once "../conexao/conexao.php";

function MontaSelectEstados(){
	echo "<select class='inputestado' name='txtestados' id='estados'>";
	echo "<option>Selecione</option>";
	$sql = "select * from estados";
	$query = mysqli_query(pegarConexao(),$sql);
	while ($vetorestados = mysqli_fetch_array($query)){
		echo "<option value='". $vetorestados['estcodigo']."'>".$vetorestados['estdescricao']." </option>";
	}
	echo "</select>";
}

function MontaSelectFabricantes(){
	echo "<select class='layout' name='carfabcodigo' id='carfabcodigo'>";
	echo "<option>Selecione</option>";
	$sql = "select * from fabricantes";
	$query = mysqli_query(pegarConexao(),$sql);
	while ($vetorfabricantes = mysqli_fetch_array($query)){
		echo "<option value='". $vetorfabricantes['fabcodigo']."'>".$vetorfabricantes['fabnome']." </option>";
	}
	echo "</select>";
}

function exibeLogin(){
	echo "<td><div class='div2'>Bem-Vindo: ".$_SESSION['nome']."</div></td>";
}

function verificaSexo(){
	if($_SESSION['sexo']== 'Masculino'){
		echo "<td><img src='../imagens/avatar_m_livre.png' alt='Image' height='100' width='100'></td>";
	}else if($_SESSION['sexo']== 'Feminino'){
		echo "<td><img src='../imagens/avatar_f_livre.png' alt='Image' height='100' width='100'></td>";
	}else{
		echo "<td><img src='../imagens/avatar_outros.png' alt='Image' height='100' width='100'></td>";
	}
}

function limpaCPF($cpf){
	$cpf = trim($cpf);
	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace(",", "", $cpf);
	$cpf = str_replace("-", "", $cpf);
	return $cpf;
}

function pesquisaTodosFuncionarios(){
	$sql = "select funcodigo, funnome, funcpf, funsexo, usulogin, usustatus from funcionarios inner join usuarios on funusucodigo = usucodigo order by funnome asc;";
	$query = mysqli_query(pegarConexao(),$sql);
	while ($dados = mysqli_fetch_array($query)){
		$codigo = $dados['funcodigo'];
		$nome = $dados['funnome'];
		$cpf = $dados['funcpf'];
		$sexo = $dados['funsexo'];
		$login = $dados['usulogin'];
		$status = $dados['usustatus'];

		if($status == 'Inativo'){
			echo ("<tr bgcolor='#c87e7e'>
				<td class='td'>".$codigo."</td>
				<td class='td'>".$nome."</td>
				<td class='td'>".$cpf."</td>
				<td class='td'>".$sexo."</td>
				<td class='td'>".$login."</td>
				<td class='td'>".$status."</td>

				<form action='' method='POST'>
				<td class='td'><a href='../view/alterarfuncionario.php?acao=Alterar&codigoAlterar=".$codigo."'><img src='../imagens/bt_editar.png' title='Editar dados do funcionário' name='Alterar' border='0'></a></td>
				<td class='td'><a href='../controller/controller_dropfuncionario.php?funcodigo=".$codigo."'><img src='../imagens/bt_dropar.png' title='Excluir funcionário do sistema' border='0'></a></td>
				<td class='td'><a href='../controller/controller_desativarusuario.php?funcodigo=".$codigo."'><img src='../imagens/bt_desativar.png' title='Desativar usuário' border='0'></a> -- <a href='../controller/controller_ativarusuario.php?funcodigo=".$codigo."'><img src='../imagens/bt_ativar.png' title='Ativar usuário' border='0'></a></td>
				</tr>");
		}else{
			echo ("<tr>
				<td class='td'>".$codigo."</td>
				<td class='td'>".$nome."</td>
				<td class='td'>".$cpf."</td>
				<td class='td'>".$sexo."</td>
				<td class='td'>".$login."</td>
				<td class='td'>".$status."</td>

				<form action='' method='POST'>
				<td class='td'><a href='../view/alterarfuncionario.php?acao=Alterar&codigoAlterar=".$codigo."'><img src='../imagens/bt_editar.png' title='Editar dados do funcionário' name='Alterar' border='0'></a></td>
				<td class='td'><a href='../controller/controller_dropfuncionario.php?funcodigo=".$codigo."'><img src='../imagens/bt_dropar.png' title='Excluir funcionário do sistema' border='0'></a></td>
				<td class='td'><a href='../controller/controller_desativarusuario.php?funcodigo=".$codigo."'><img src='../imagens/bt_desativar.png' title='Desativar usuário' border='0'></a> -- <a href='../controller/controller_ativarusuario.php?funcodigo=".$codigo."'><img src='../imagens/bt_ativar.png' title='Ativar usuário' border='0'></a></td>
				</tr>");
		}
	}
}

function pesquisaFuncionarioByLikeNome($nome){
	$sql = "select funcodigo, funnome, funcpf, funsexo, usulogin, usustatus from funcionarios inner join usuarios on funusucodigo = usucodigo where funnome like '%$nome%' or funcpf like '%$nome%' order by funnome asc;";
	$query = mysqli_query(pegarConexao(),$sql);
	while ($dados = mysqli_fetch_array($query)){
		$codigo = $dados['funcodigo'];
		$nome = $dados['funnome'];
		$cpf = $dados['funcpf'];
		$sexo = $dados['funsexo'];
		$login = $dados['usulogin'];
		$status = $dados['usustatus'];

		if($status == 'Inativo'){
			echo ("<tr bgcolor='#c87e7e'>
				<td class='td'>".$codigo."</td>
				<td class='td'>".$nome."</td>
				<td class='td'>".$cpf."</td>
				<td class='td'>".$sexo."</td>
				<td class='td'>".$login."</td>
				<td class='td'>".$status."</td>

				<form action='' method='POST'>
				<td class='td'><a href='../view/alterarfuncionario.php?acao=Alterar&codigoAlterar=".$codigo."'><img src='../imagens/bt_editar.png' title='Editar dados do funcionário' name='Alterar' border='0'></a></td>
				<td class='td'><a href='../controller/controller_dropfuncionario.php?funcodigo=".$codigo."'><img src='../imagens/bt_dropar.png' title='Excluir funcionário do sistema' border='0'></a></td>
				<td class='td'><a href='../controller/controller_desativarusuario.php?funcodigo=".$codigo."'><img src='../imagens/bt_desativar.png' title='Desativar usuário' border='0'></a> -- <a href='../controller/controller_ativarusuario.php?funcodigo=".$codigo."'><img src='../imagens/bt_ativar.png' title='Ativar usuário' border='0'></a></td>
				</tr>");
		}else{
			echo ("<tr>
				<td class='td'>".$codigo."</td>
				<td class='td'>".$nome."</td>
				<td class='td'>".$cpf."</td>
				<td class='td'>".$sexo."</td>
				<td class='td'>".$login."</td>
				<td class='td'>".$status."</td>

				<form action='' method='POST'>
				<td class='td'><a href='../view/alterarfuncionario.php?acao=Alterar&codigoAlterar=".$codigo."'><img src='../imagens/bt_editar.png' title='Editar dados do funcionário' name='Alterar' border='0'></a></td>
				<td class='td'><a href='../controller/controller_dropfuncionario.php?funcodigo=".$codigo."'><img src='../imagens/bt_dropar.png' title='Excluir funcionário do sistema' border='0'></a></td>
				<td class='td'><a href='../controller/controller_desativarusuario.php?funcodigo=".$codigo."'><img src='../imagens/bt_desativar.png' title='Desativar usuário' border='0'></a> -- <a href='../controller/controller_ativarusuario.php?funcodigo=".$codigo."'><img src='../imagens/bt_ativar.png' title='Ativar usuário' border='0'></a></td>
				</tr>");
		}
	}
}

function RecuperaSelectEstadosByCodigo($estcodigo){
	echo "<select class='inputestado' name='txtestados' id='estados'>";
	$sql = "select * from estados;";
	$query = mysqli_query(pegarConexao(),$sql);
	while ($vetorestados = mysqli_fetch_array($query)){
		$codigo = $vetorestados['estcodigo'];
		$descricao = $vetorestados['estdescricao'];
		if($codigo == $estcodigo){
			echo "<option selected='selected' value='".$vetorestados['estcodigo']."'>".$vetorestados['estdescricao']."</option>";
		}else{
			echo "<option value='".$vetorestados['estcodigo']."'>".$vetorestados['estdescricao']."</option>";
		}
	}
	echo "</select>";
}

function RecuperaSelectCidadesByCodigo($cidcodigo){
	echo "<select class='inputestado' name='txtcidades' id='cidades'>";
	$sql = "select * from cidades;";
	$query = mysqli_query(pegarConexao(),$sql);
	while ($vetorcidades = mysqli_fetch_array($query)){
		$codigo = $vetorcidades['cidcodigo'];
		$descricao = $vetorcidades['ciddescricao'];
		if($codigo == $cidcodigo){
			echo "<option selected='selected' value='".$vetorcidades['cidcodigo']."'>".$vetorcidades['ciddescricao']."</option>";
		}else{
			echo "<option value='".$vetorcidades['cidcodigo']."'>".$vetorcidades['ciddescricao']."</option>";
		}
	}
	echo "</select>";
}

function RecuperaSelectBairrosByCodigo($baicodigo){
	echo "<select class='inputestado' name='txtbairros' id='bairros'>";
	$sql = "select * from bairros;";
	$query = mysqli_query(pegarConexao(),$sql);
	while ($vetorbairros = mysqli_fetch_array($query)){
		$codigo = $vetorbairros['baicodigo'];
		$descricao = $vetorbairros['baidescricao'];
		if($codigo == $baicodigo){
			echo "<option selected='selected' value='".$vetorbairros['baicodigo']."'>".$vetorbairros['baidescricao']."</option>";
		}else{
			echo "<option value='".$vetorbairros['baicodigo']."'>".$vetorbairros['baidescricao']."</option>";
		}
	}
	echo "</select>";
}
?>