function colors() {
    let rgb1 = Math.floor(Math.random() * 256);
    let rgb2 = Math.floor(Math.random() * 256);
    let rgb3 = Math.floor(Math.random() * 256);

    document.getElementById('corpo').style = "background-color: rgb(" + rgb1 + ', ' + rgb2 + ', ' + rgb3 + ");"; 
    
    return false;
}
    //validacão do funcionario 
function validacao() {
    let name = document.getElementById("name");
    let cpf = document.getElementById("cpf");
    let password = document.getElementById("password");

    if (name.value == "") {
        alert("Preencha o campo nome!!");
        name.focus(); 
        return false;
    }
    if (cpf.value == "") {
        alert("Preencha o campo CPF!!");
        cpf.focus(); 
        return false;
    }
    if (password.value == "") {
        alert("Preencha o campo senha!!");
        password.focus(); 
        return false;
    }

    return true;
}


//validacão do cliente 
function validacaoCliente() {
let nome = document.getElementById("nome");
let cpf = document.getElementById("cpf");
let cnpj = document.getElementById("cnpj");

if (nome.value == "") {
    alert("Preencha o campo nome!!");
    nome.focus(); 
    return false;
}
if (cpf.checked == "" && cnpj.checked == false) {
    alert("Preencha o campo tipo!!");
    console.log("oi");
    tipo.focus(); 
    return false;
}



return true;
}

function KmFinal() {
    let kmInicial = document.getElementsByName("km_inicial");
    let kmRodados = document.getElementsByName("km_devolucao");

    let KmFinal = kmInicial - kmRodados;

    document.getElementsByName("km_final").value = KmFinal ;

    return false;
}