<?php
require_once 'conexao.php';
require_once 'testeLogin.php';
require_once 'operacoes.php';
?>
<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <script src="./js/script.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        
<?php

if ($_GET['origem'] == 1) {

    echo '
        <body>
            <form action="cadastroCliente.php" onsubmit="return validacaoCliente()">
                
                <!-- Hidden == escondido. Serve para marcar a origem da página-->
                <input type="hidden" name="origem" value="2">
                
                Nome do cliente: <br>
                <input type="text" name="nome_cliente" id="nome"><br><br>
                <input type="radio" name="tipo" value="p" id="cpf">CPF 
                <input type="radio" name="tipo" value="e" id="cnpj">CNPJ  <br><br>

                <input type="submit" value="&#10145;&#65039;">
            </form>
        </body>
        </html>
    ';
}

elseif ($_GET['origem'] == 3) {
    if ($_GET['tipo'] == "p") {

        $tipo = $_GET['tipo'];
        $id_cliente = $_GET['id_cliente'];
        echo '
            <body>
                <form action="cadastroCliente.php">

                    <!-- Hidden == escondido. Serve para marcar a origem da página-->
                    <input type="hidden" name="origem" value="4">
                    <input type="hidden" name="id_cliente" value=' . $id_cliente .'>
                    <input type="hidden" name="tipo" value=' . $tipo .'>
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
        ';

    } elseif ($_GET['tipo'] == "e") {
        $id_cliente = $_GET['id_cliente'];
        echo '
            <body>
                <form action="cadastroCliente.php">

                    <!-- Hidden == escondido. Serve para marcar a origem da página-->
                    <input type="hidden" name="origem" value="5">
                    <input type="hidden" name="id_cliente" value=' . $id_cliente .'>
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
        ';
    }
}

?>
