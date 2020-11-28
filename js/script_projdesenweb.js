// Tratamento para o form do Login
function realizarlogin() {
    var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;

    alert("Login: "+login);
    alert("Senha: "+senha);

    if (document.formlogin.login.value == "") {
        alert("O campo LOGIN não pode ficar em branco.\nPreencha-o corretamente!");
        document.formlogin.login.focus();
        return false;
    }
    if (document.formlogin.senha.value == "") {
        alert("O campo SENHA não pode ficar em branco.\nPreencha-o corretamente!");
        document.formlogin.senha.focus();
        return false;
    }
    console.log(login);
    console.log(senha);
    window.open('controller/controller_login.php');
    return true;
}

function FormataCpf(campo, teclapres){
        var tecla = teclapres.keyCode;
        var vr = new String(campo.value);
        vr = vr.replace(".", "");
        vr = vr.replace("/", "");
        vr = vr.replace("-", "");
        tam = vr.length + 1;
        if (tecla != 14){
            if (tam == 4)
                campo.value = vr.substr(0, 3) + '.';
            if (tam == 7)
                campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 6) + '.';
            if (tam == 11)
                campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 3) + '.' + vr.substr(7, 3) + '-' + vr.substr(11, 2);
        }
    }

    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }