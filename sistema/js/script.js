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


