<?php

/** 
 * Cadastro do cliente
 * 
 * Este arquivo contém todos os formularios relacionados ao cadastro do cliente
 * @author Luís Carlos e Maria Beatriz<@email>
 * 
 * @requires /conexao.php
 * @requires /testeLogin.php
 * @requires /operacoes.php
 * 
 */
 

require_once 'conexao.php';
require_once 'testeLogin.php';
require_once 'operacoes.php';
?>
<!DOCTYPE html>
<html lang="en">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="home.php">home</a>

    <form id="formulario_cliente" action="cadastroCliente.php">

        <!-- Hidden == escondido. Serve para marcar a origem da página-->
        <input type="hidden" name="origem" value="2">

        Nome do cliente: <br>
        <input type="text" name="nome_cliente" id="nome"><br><br> <!--Aqui tem uma caixinha de texto onde o usuário pode digitar o nome dele.-->
        <input type="radio" name="tipo" value="p" id="tipo">CPF <!--Esse é um botão de seleção (radio button) que permite o usuário escolher "CPF".--> 
        <input type="radio" name="tipo" value="e" id="tipo">CNPJ <br><br> <!--É outro botão igual ao anterior, mas representa a opção "CNPJ". A diferença é o valor associado, que identifica essa escolha como "CNPJ".-->

        <input type="submit" value="&#10145;&#65039;">
    </form>
    <script>
        $(document).ready(function() {  //Esse comando garante que o script só será executado depois que toda a página HTML for carregada.
            $("#formulario_cliente").validate({ //Aqui está sendo configurada a validação para um formulário com o ID formulario_cliente.


                rules: { //Dentro de rules, são definidas as regras de validação para os campos do formulário.
                    name: { //Está especificando regras para um campo que tenha o atributo name="name" onde o cliente digita o nome.
                        required: true, //Diz que o preenchimento desse campo é obrigatório.
                        minlength: 2, //Define que o nome precisa ter pelo menos 2 caracteres.
                    },
                        
                },
                messages: {
                    name: {
                        required: "campo nome obrigatório.", // Mostra essa mensagem se o campo não for preenchido.
                        minlength: "O nome deve ter pelo menos 2 caracteres." // Exibe essa mensagem se o nome tiver menos de 2 caracteres.
                    },
                    tipo: {
                        required: "Adicione um dos campus.", //Mostra essa mensagem se o usuário não selecionar uma opção.
                        minlength: "clique em apenas um. " // A validação minlength no campo radio exige que uma opção seja escolhida, mas não é necessária porque os radio buttons já funcionam garantindo uma única seleção.
                    },
                    tipo: {
                        required: "Adicione um dos campus.", //Mostra essa mensagem se o usuário não selecionar uma opção.
                        minlength: "clique em apenas um."    //A validação minlength no campo radio exige que uma opção seja escolhida, mas não é necessária porque os radio buttons já funcionam garantindo uma única seleção.
                    
                    }
                }
            })
        })
    </script>
</body>

</html>