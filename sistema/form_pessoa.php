<?php

/** 
 * Cadastro do cliente
 * 
 * Este arquivo contém todos os formularios relacionados ao cadastro do cliente
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> 
 * @author julian <email@email.com>
 * 
 * @requires /conexao.php
 * @requires /testeLogin.php
 * @requires /operacoes.php
 * 
 */

require_once 'conexao.php';
require_once 'testeLogin.php';
require_once 'operacoes.php';

$tipo = $_GET['tipo'];

$nome = $_GET['nome'];
?>
<!DOCTYPE html>
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
    <form action="cadastroCliente.php">

        <!-- Hidden == escondido. Serve para marcar a origem da página-->
        <input type="hidden" name="origem" value="4">
        <input type="hidden" name="tipo" value=' . $tipo .'>
        <input type="hidden" name="nome_cliente" value=' . $nome .'>
        <input type="hidden" name="tipo" value="p">

        Cpf: <br>
        <input type="text" name="cpf" id=""><br><br>
        Carteira de motorista: <br>
        <input type="text" name="cnh" id=""><br><br>
        Endereço: <br>
        <input type="text" name="endereco">

        <input type="submit" value="Realizar pedido">

    </form>
    <script>
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
                    carteira: {
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
    </script>
</body>

</html>