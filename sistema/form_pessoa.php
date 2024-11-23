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
        <input type="hidden" name="nome_cliente" value="<?php echo $nome; ?>>
        <input type="hidden" name="tipo" value="p">

        Cpf: <br>
        <input type="text" name="cpf" id=""><br><br>
        Carteira de motorista: <br>
        <input type="text" name="cnh" id=""><br><br>
        Endereço: <br>
        <input type="text" name="endereco">

        <input type="submit" value="Realizar pedido">
    </form>
</body>

</html>