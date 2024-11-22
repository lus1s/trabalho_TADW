function colors() {
    let rgb1 = Math.floor(Math.random() * 256);
    let rgb2 = Math.floor(Math.random() * 256);
    let rgb3 = Math.floor(Math.random() * 256);

    document.getElementById('corpo').style = "background-color: rgb(" + rgb1 + ', ' + rgb2 + ', ' + rgb3 + ");"; 
    
    return false;
}

$(document).ready(function() {
    $("#cadastroCliente").validate({
        rules: {
            cnpj: {
                required: true,
                minlength: 5,
                regex: /^[0-9-]+$/,
            },
            funcionario: {
                required: true,
                minlength: 5,
                regex: /^[a-zA-ZáéíóúãõçÁÉÍÓÚÃÕÇ]+$/,
            },
            endereco: {
                required:true,
                minlength: 5,
            
            },
        },
    messages: {
    cnpj: {
        required: "campo cnpj obrigatório.",
        minlength: "O cnpj deve conter pelo menos 5 caracteres."
    },
    funcionario: {
        required: "campo funcionario obrigatório.",
        minlength: "O funcionario deve conter pelo menos 5 caracteres."
    },
    endereco: {
        required: "campo endereço obrigatório.",
        minlength: "O endereço deve conter pelo menos 5 caracteres." 
    },
}
}),
$.validator.addMethod("regex", function(value, element, regexp) {
return this.optional(element) || regexp.test(value);
}, "Por favor, insira um valor válido.");
//$.validator.addMethod("regex", ...): Cria uma nova regra de validação chamada regex, que pode ser usada em campos do formulário.
//value: O valor do campo.
//element: O próprio campo de entrada.
//regexp: A expressão regular a ser usada para validar o valor.
//this.optional(element): Retorna true se o campo for opcional (ou seja, vazio e não obrigatório), permitindo que o campo seja considerado válido se não for preenchido.
//regexp.test(value): Verifica se o valor do campo corresponde à expressão regular fornecida.
//Este código cria uma validação personalizada no jQuery, onde você pode aplicar uma expressão regular em um campo e validar seu conteúdo.
// Se a expressão regular não corresponder, o formulário exibirá uma mensagem de erro personalizada
})
$(document).ready(function() {
    $("#cadastroCliente").validate({
        rules: {
    cpf: {
        required: true,
        minlength: 8,
        regex: /^[0-9-]+$/,
    },
    Carteira: {
        required: true,
        minlength: 8,
        regex: /^[a-zA-ZáéíóúãõçÁÉÍÓÚÃÕÇ]+$/,
    },
    endereco: {
        required: true,
        minlength: 8,

    }
},
messages: {
    cpf: {
        required: "campo cnpj obrigatório.",
        minlength: "O cnpj deve conter pelo menos 5 caracteres."
},
    carteira : {
        required: "campo cnpj obrigatório.",
        minlength: "O cnpj deve conter pelo menos 5 caracteres."
},
    endereco: {
        required: "campo cnpj obrigatório.",
        minlength: "O cnpj deve conter pelo menos 5 caracteres."
}
}
})
})