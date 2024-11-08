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

 /**
  * Cabeçalho html
  */
<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <script src="./js/script.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        
<?php

 /** 
 * Este trecho verifica o valor de 'origem' enviado via URL (parâmetro GET).
 * Se a origem for igual a 1, a página exibirá um formulário para que o usuário escolha o tipo de cliente (físico ou jurídico).
 * 
 * - Se 'origem' for 1, exibe um formulário onde o usuário escolhe entre CPF (cliente físico) ou CNPJ (cliente jurídico).
 * - Após a escolha, o formulário será enviado com 'origem' alterado para 2, indicando a próxima etapa do cadastro.
 */

if ($_GET['origem'] == 1) {

    echo '
        <body>
        <a href="home.php">home</a>
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
/**
 * Após o usuário selecionar o tipo de cliente (físico ou jurídico), 
 * a origem 3 determina qual formulário será exibido para o cadastro adicional de informações.
 * 
 * - Se 'origem' for igual a 3, o formulário será ajustado conforme o tipo de cliente selecionado (físico ou jurídico).
 * - Para clientes físicos ('tipo' = 'p'), serão solicitadas informações como CPF, CNH e endereço.
 * - Para clientes jurídicos ('tipo' = 'e'), serão solicitadas informações como CNPJ, responsável e endereço.
 */
elseif ($_GET['origem'] == 3) {
    if ($_GET['tipo'] == "p") {
/** Para clientes físicos: exibe formulário para CPF, CNH e endereço */
        $tipo = $_GET['tipo'];
        $id_cliente = $_GET['id_cliente'];
        echo '
            <body>
            <a href="home.php">home</a>
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
/** Para clientes jurídicos: exibe formulário para CNPJ, nome responsável e endereço */
        $id_cliente = $_GET['id_cliente'];
        echo '
            <body>
            <a href="home.php">home</a>
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
