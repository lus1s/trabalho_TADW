<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';

    // if ($_GET['origem'] == 1) {

    //     $nome = $_GET['nome_cliente'];
    //     $tipo = $_GET['tipo'];

    //     $id_cliente = insereClienteVerificaID($conexao, $nome, $tipo);

    //     header("Location: cad_cliente.php?id_cliente=$id_cliente&tipo=$tipo&return=true");
    //     exit();
    // }
    // if (isset($_GET['return'])) {
    //     if ($_GET['tipo']== "p") {
    //        echo'
    //             <!DOCTYPE html>
    //             <html lang="en">

    //             <head>
    //                 <meta charset="UTF-8">
    //                 <script src="./js/script.js"></script>
    //                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    //                 <title>Document</title>
    //             </head>

    //             <body>
    //                 <form action="cad_cliente.php">

    //                     <!-- Hidden == escondido. Serve para marcar a origem da página-->
    //                     <input type="hidden" name="origem" value="2">

    //                     Cpf: <br>
    //                     <input type="text" name="cpf" id=""><br><br>
    //                     Carteira de motorista: <br>
    //                     <input type="text" name="cnh" id=""><br><br>
    //                     Endereço: <br>
    //                     <input type="text" name="endereco">

    //                     <input type="submit" value="Realizar pedido">
    //                 </form>
    //             </body>

    //             </html>';
    //     }
    //     elseif ($_GET['tipo']== "e") {
    //         echo '
    //             <!DOCTYPE html>
    //             <html lang="en">

    //             <head>
    //                 <meta charset="UTF-8">
    //                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    //                 <script src="./js/script.js"></script>
    //                 <title>Document</title>
    //             </head>

    //             <body>
    //                 <form action="dados_cliente.php">

    //                     <!-- Hidden == escondido. Serve para marcar a origem da página-->
    //                     <input type="hidden" name="origem" value="3">

    //                     cnpj: <br>
    //                     <input type="text" name="cnpj" id=""><br><br>
    //                     funcionário responsável: <br>
    //                     <input type="text" name="func_resp" id=""> <br><br>
    //                     endereco: <br>
    //                     <input type="text" name="endereco" id=""> <br><br>

    //                     <input type="submit" value="Realizar pedido">
    //                 </form>
    //             </body>

    //             </html>';
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/script.js"></script>
    <title>Cadastro de cliente</title>
</head>
<body>
    <form onsubmit="return validacaoCliente()">
        
        <!-- Hidden == escondido. Serve para marcar a origem da página-->
        <input type="hidden" name="origem" value="1">

        Nome do cliente: <br>
        <input type="text" name="nome_cliente" id="nome"><br><br>
        <input type="radio" name="tipo" value="p" id="cpf">CPF 
        <input type="radio" name="tipo" value="e" id="cnpj">CNPJ  <br><br>

        <input type="submit" value="&#10145;&#65039;">
    </form>
</body>
</html>

<?php
 
?>