<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clientes</title>
</head>
<body>
    <form action="clientes.php">

        <input type="hidden" name="origem" value="1">
        <input type="text" name="clinte" placeholder="Busque cliente já cadastrado..."><input type="submit" value="&#128270;">
        

        <button><a href="./clientes.php?origem=2">Exibir clientes cadastrados</a></button>
        
        <button><a href="./clientes.php?origem=3">Exibir clientes com veiculos alugados</a></button>

    </form>
</body>
</html>