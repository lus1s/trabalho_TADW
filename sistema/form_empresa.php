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

$id_cliente = $_GET['id_cliente'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<nav class="navbar">
        <div class="container" id="navbar">
            <a href="home.php" id="logo">Veículos FARIA</a>
            <form class="d-flex" role="search">
                <input class="form-control me-1" type="search" placeholder="Pesquisar" aria-label="search" style="width: 300px;">
                <button class="btn btn-outline-dark" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </button>
            </form>

            <button class="btn btn-danger" type="submit"><a href="limpar_sessions.php?origem=1" id="sair">Sair</a></button>
        </div>
    </nav>
    <a href="home.php">home</a>
    <form action="cadastroCliente.php">

        <!-- Hidden == escondido. Serve para marcar a origem da página-->
        <input type="hidden" name="origem" value="5">
        <input type="hidden" name="id_cliente" value=' . $id_cliente .'>
        <input type="hidden" name="nome_cliente" value=' . $nome .'>
        <input type="hidden" name="tipo" value="e">

        cnpj: <br>
        <input type="text" name="cnpj" id=""><br><br>
        funcionário responsável: <br>
        <input type="text" name="func_resp" id=""> <br><br>
        endereco: <br>
        <input type="text" name="endereco" id=""> <br><br>

        <input type="submit" value="Realizar pedido">
    </form>
    <script>
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
                            required: true,
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
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>

</html>