function colors() {
    let rgb1 = Math.floor(Math.random() * 256);
    let rgb2 = Math.floor(Math.random() * 256);
    let rgb3 = Math.floor(Math.random() * 256);

    document.getElementById('corpo').style = "background-color: rgb(" + rgb1 + ', ' + rgb2 + ', ' + rgb3 + ");"; 
    
    return false;
}
 
 // validação de funcionário 

    $(document).ready(function() {
        $("#formulario_funci").validate({
            rules: { 
                nome: {
                    required: true,
                    minlength: 2,
                },
                cpf: {
                    required: true,
                    minlength: 8,
                },
                senha: {
                    required: true,
                    minlength: 8,

                }
            },
            messages: {
                nome: {
                    required: "campo nome obrigatório.",
                    minlength: "O nome deve ter pelo menos 2 caracteres."
                },
                cpf: {
                    require: "Campo cpf obrigatório.",
                    minlength: "O usuário deve ter pelo menos 11 caracteres. "
                },
                senha: {
                    required: "Senha obrigatória.",
                    minlength: "A senha deve ter 8 caracteres."
                }
            }
        })
    }
    )
