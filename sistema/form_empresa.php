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
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
</body>

</html>