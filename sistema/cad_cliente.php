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
        <input type="text" name="nome_cliente" id="nome"><br><br>
        <input type="radio" name="tipo" value="p" id="tipo">CPF
        <input type="radio" name="tipo" value="e" id="tipo">CNPJ <br><br>

        <input type="submit" value="&#10145;&#65039;">
    </form>
    <script>
        $(document).ready(function() {
            $("#formulario_cliente").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                    },
                        
                },
                messages: {
                    name: {
                        required: "campo nome obrigatório.",
                        minlength: "O nome deve ter pelo menos 2 caracteres."
                    },
                    tipo: {
                        required: "Adicione um dos campus.",
                        minlength: "clique em apenas um. "
                    },
                    tipo: {
                        required: "Adicione um dos campus.",
                        minlength: "clique em apenas um."
                    }
                }
            })
        })
    </script>
</body>

</html>