<?php
require_once "../controller/controller_verifica_sessao.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="../css/css_cabecalho.css">
    <title>Parking</title>
</head>
<body class="body">
    <div class="div">
        <ul class="menu clearfix">
            <li><a>Menu</a>
                <ul class="sub-menu clearfix">
                    <li><a>Cadastros</a>
                        <ul class="sub-menu">
                            <li><a href="#">Modalidade</a></li>
                            <li><a href="#">Fabricante</a></li>
                            <li><a href="#">Carro</a></li>
                            <li><a href="http:../view/cadfuncionario.php">Funcionário</a></li>
                            <li><a href="#">Voucher</a></li>
                        </ul>
                    </li>
                    <li><a>Editar</a>
                        <ul class="sub-menu">
                            <li><a href="#">Modalidade</a></li>
                            <li><a href="#">Fabricante</a></li>
                            <li><a href="#">Carro</a></li>
                            <li><a href="http:../view/listarfuncionarios.php">Funcionário</a></li>
                            <li><a href="#">Voucher</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a>Relatórios</a></li>
            <li align="right"><a href="http:../view/home.php">Home</a></li>
            <li><a href="../controller/controller_logout.php">Sair</a></li>
        </ul>
    </div>
</body>
</html>