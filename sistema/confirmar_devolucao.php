<?php
/**
 * Este arquivo confirma a devolução.
 * 
 * @author Luís Carlos <@email>
 * @author Maria <mariabeatriz678@icloud.com>
 * 
 * @requires /testeLogin.php.
 * @requires /operacoes.php.
 * @requires /conexao.php.
 */
   require_once 'testeLogin.php';// Conexão com o banco de dados.
   require_once 'operacoes.php';// Verifica o login do usuário.
   require_once 'conexao.php';// Conexão com o banco de dados.
   /**
    * @var string $data_devolucao.
    * @var string $funcDevolucao.
    * @var string $nome_cliente.
    * @var int $idCliente.
    */

   $data_devolucao = $_GET['dt_devolucao'];//Data em que o veículo foi devolvido.
   $funcDevolucao = $_GET['funcdevolucao'];//Nome ou identificação do funcionário responsável pela devolução.
   $nome_cliente = $_GET['nome'];//Nome do cliente que está realizando a devolução.
   $idCliente = $_GET['id_cliente'];//Identificador único do cliente no sistema.

   if(!empty(dadosClientePessoa($conexao, $idCliente))){$dadosCliente = dadosClientePessoa($conexao, $idCliente);}
   else{$dadosCliente = dadosClienteEmpresa($conexao, $idCliente);}//Verifica se o cliente é pessoa fisica ou juridica.
   //Se o cliente for uma pessoa física, os dados são obtidos com a função dadosClientePessoa().
   //Se não for uma pessoa física, assume-se que é uma empresa, e os dados são obtidos com dadosClienteEmpresa().

   /**
    * @var string $metPagamento. 
    * @var string $tipoPagamento.
    * @var int $kmDevolucao.  
    * @var float $valotTotal.
    */

   $metPagamento = $_GET['met_pagamento'];//Identificador do método de pagamento (como "dinheiro", "cartão", etc.).
   
   $tipoPagamento = metodoPagamento($metPagamento);//A função metodoPagamento() recebe um identificador (metPagamento)
   //e retorna o nome ou descrição do método de pagamento (ex: "Cartão de Crédito", "Dinheiro", etc.).

   $kmDevolucao = $_GET['km_devolucao'];//Quilometragem do veículo no momento da devolução.

   $_SESSION['kmdevolucao'] = $kmDevolucao;// A quilometragem da devolução ($kmDevolucao) é armazenada navariável de sessão 
   //$_SESSION['kmdevolucao']. Isso permite que esses dados sejam acessados em outras páginas durante a mesma sessão de usuário, sem a necessidade de passá-los pela URL.
   $valorTotal = $_GET['total'];//Valor total da devolução.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar dados para devolução</title>
</head>
<body>

    <!-- Formulário que envia dados para a página 'devolver_varios.php' -->
    <form action="devolver_varios.php">
         <!-- Tabela para organizar e exibir os dados do recibo -->
        <table border="1">
            <!-- Linha com o título do recibo -->
            <tr>
                <td colspan="6">RECIBO DE DEVOLUÇÃO</td>
            </tr>
            <tr>
            <!-- Exibe o nome do cliente (variável PHP) -->
            <td colspan="2">Nome: <?php echo $nome_cliente; ?></td>
            
            <td>CPF/CNPJ:</td>
            <?php
            //  para percorrer os dados do cliente (exemplo: CPF ou CNPJ)
                 foreach ($dadosCliente as $dados) {
                    echo "<td>" . $dados[0] . " </td>";
            
                    $cnh = $dados[1];
                }
            ?>
               
            <!--Exibir o cnh de funcionario-->
            <td>CNH/Funcionario responsável:</td>
            <td><?php echo $cnh; ?></td>
            </tr>
            <!--Exibe um título para a seção onde serão listados os veículos devolvidos.-->
            <tr>
                <td colspan="6">VEICULOS ALUGADOS</td>
            </tr>
            <!--Exibe as colunas "Veículo(s)" e "Km Rodados durante o aluguel"
             para que os dados dos veículos devolvidos e suas respectivas quilometragens sejam exibidos corretamente.-->
            <tr>
                <td colspan="3">Veiculo(s):</td>
                <td colspan="3">Km Rodados durante o aluguel:</td>
            </tr>

                <?php
                /** 
                 * O script primeiro recupera a lista de veículos devolvidos a partir da variável de sessão $_SESSION['carrinho_devolucao'].
                 * Utiliza a função removerRepetidosArray() para remover veículos duplicados da lista de devolução.
                 * Em seguida, combina os dados de quilometragem e veículos em um array associativo usando array_combine().
                 * A estrutura de repetição foreach percorre o array associativo e exibe cada veículo e sua quilometragem correspondente na tabela.
                 */

                    $veiculos_devolucao = $_SESSION['carrinho_devolucao']['nome_devolucao'];

                    $veiculosss = removerRepetidosArray($veiculos_devolucao);

                    $veiculoKm = array_combine($kmDevolucao, $veiculosss);

                    $kmVeiculo = [];
                      /**Exibe as informações dos veículos devolvidos*/
                    foreach ($veiculoKm as $km => $veiculo) {
                        echo "<tr>";
                        echo"<td colspan='3'>$veiculo</td>";
                        echo"<td colspan='3'>" . $km . "</td>";
                        echo "</tr>";
                    } 
                   
                ?>
            <tr>
                <!-- Exibe o nome do funcionário responsável pela devolução (armazenado em $funcDevolucao)
                 e a data da devolução (armazenada em $data_devolucao).-->
                <td colspan="4">Func. realizou a devolução:  <?php echo $funcDevolucao; ?></td>
                <td>Data da devolução:</td>
                <td><?php echo $data_devolucao; ?></td>
            </tr>
            <!-- Exibe o valor total da devolução (armazenado em $valorTotal) e o método de pagamento
             utilizado (armazenado em $tipoPagamento).-->
            <tr>
                <td colspan="4">Valor total:R$ <?php echo $valorTotal; ?> </td>
               
                <td colspan="2">Met. pagamento: <?php echo $tipoPagamento; ?></td>
            </tr>
        </table>
        <br>
        <!-- HIDDEN oculta os valores que vão ser enviados para a poroxima pagina-->
        <input type="hidden" name="idCliente" value="<?php echo $idCliente; ?>">
        <input type="hidden" name="valorDevolucao" value="<?php echo $valorTotal; ?>">
        <input type="hidden" name="tipoPgamento" value="<?php echo $metPagamento; ?>">
        <!-- input para submetar o formulario -->
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>