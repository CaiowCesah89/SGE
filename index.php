<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut ico" href="../imagens/favicon.ico">
    <link type="text/css" rel="stylesheet" href="css/css_pg_login.css">
    <title>Parking</title>
</head>
<body>
    <form method="post" name="formlogin" action='controller/controller_login.php'>
        <fieldset>
            <legend>Faça seu login</legend>
            <table>
                <tr>
                    <td>LOGIN:</td>
                    <td><input class="input" autocomplete="off" type="text" name="login" id="login" required autofocus></td>
                </tr>
                <tr>
                    <td>SENHA:</td>
                    <td><input class="input" type="password" name="senha" id="senha" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="submit" type="submit" name="Logar" value="LOGAR">
                        <input class="submit" type="reset" name="Reset" value="LIMPAR">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <script language="javascript" src="js/script_projdesenweb.js"></script>
</body>
</html>
