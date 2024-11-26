<?php

/** 
 * Cadastro do cliente
 * 
 * Este arquivo contém todos os formularios relacionados ao cadastro do cliente
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> 
 * @author Maria <mariabeatriz678@icloud.com>
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
    <a href="home.php">home</a>

    <form id="formulario_cliente" action="cadastroCliente.php">

        <!-- Hidden == escondido. Serve para marcar a origem da página-->
        <input type="hidden" name="origem" value="2">

        Nome do cliente: <br>
        <input type="text" name="nome" id="nome"><br><br>
        <input type="radio" name="tipo" value="p" id="tipo1"><label for="tipo1">CPF</label>
        <input type="radio" name="tipo" value="e" id="tipo2"><label for="tipo2">CNPJ</label> <br><br>

        <input type="submit" value="&#10145;&#65039;">
    </form>
    <script>
        $(document).ready(function() {
            $("#formulario_cliente").validate({
                rules: {
                    nome: {
                        required: true,
                        minlength: 2,
                        regex: /^[a-zA-ZáéíóúãõçÁÉÍÓÚÃÕÇ]+$/,
                    },
                    tipo: {
                        required: true,
                    },
                },
                messages: {
                    nome: {
                        required: "campo nome obrigatório.",
                        minlength: "O nome deve ter pelo menos 2 caracteres."
                    },
                    tipo: {
                        required: "Adicione um dos campus.",
                    },
                }
            });
        });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>


</html>