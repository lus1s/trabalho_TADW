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

    <div class="container">
        <div class="container-func">
        <h2>Dados do Cliente</h2>
            <form id="formulario_cliente" action="cadastroCliente.php">
                <!-- Hidden == escondido. Serve para marcar a origem da página-->
                <input type="hidden" name="origem" value="2">
                
                <p>Nome do cliente:</p>
                <p><input type="text" name="nome" id="nome" placeholder="Rosana Medeiro Buarque..."></p>
                <hr>

                <h3>Dados do tipo do Cliente</h3>
                <hr>
                <h6>Selecione abaixo o tipo do cliente que será cadastrado.</h6>
                <div class="tipo-cliente">
                    <div class="veiculo" id="radio1">
                        <input type="radio" name="tipo" value="p" id="tipo1" class="tipo">CPF
                    </div>
                    <div class="veiculo" id="radio1">
                        <input type="radio" name="tipo" value="e" id="tipo2" class="tipo">CNPJ
                    </div>                    
                </div>

                <input type="submit" value="Próximo">
            </form>
        </div>
    </div>

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
                        required: "O campo nome é obrigatório.",
                        minlength: "O nome deve ter pelo menos 2 caracteres."
                    },
                    tipo: {
                        required: "Selecione um dos campos.",
                    },
                }
            });
        });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
</html>