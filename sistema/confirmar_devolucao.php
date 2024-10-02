<?php
   require_once 'testeLogin.php';
   require_once 'operacoes.php';
   require_once 'conexao.php';

   $data_devolucao = $_GET['dt_devolucao'];
   $funcDevolucao = $_GET['funcdevolucao'];

   $nome_cliente = $_GET['nome'];
   $idCliente = $_GET['id_cliente'];

   if(!empty(dadosClientePessoa($conexao, $idCliente))){$dadosCliente = dadosClientePessoa($conexao, $idCliente);}
   else{$dadosCliente = dadosClienteEmpresa($conexao, $idCliente);}

   $metPagamento = $_GET['met_pagamento'];
   $tipoPagamento = metodoPagamento($metPagamento);

   $kmDevolucao = $_GET['km_devolucao'];

   $_SESSION['kmdevolucao'] = $kmDevolucao;

   $valorTotal = $_GET['valor'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar dados para devolução</title>
</head>
<body>
    <form action="devolver_varios.php">
        <table border="1">
            <tr>
                <td colspan="6">RECIBO DE DEVOLUÇÃO</td>
            </tr>
            <tr>
            <td colspan="2">Nome: <?php echo $nome_cliente; ?></td>
            
            <td>CPF/CNPJ:</td>
            <?php
                 foreach ($dadosCliente as $dados) {
                    echo "<td>" . $dados[0] . " </td>";
                   
                    $cnh = $dados[1];
                }
            ?>
           
            <td>CNH/Funcionario responsável:</td>
            <td><?php echo $cnh; ?></td>
            </tr>
            <tr>
                <td colspan="6">VEICULOS ALUGADOS</td>
            </tr>
            <tr>
                <td colspan="3">Veiculo(s):</td>
                <td colspan="3">Km Rodados durante o aluguel:</td>
            </tr>
                <?php

                    $veiculos_devolucao = $_SESSION['carrinho_devolucao']['nome_devolucao'];

                    $veiculoKm = array_combine($kmDevolucao, $veiculos_devolucao);

                    $kmVeiculo = [];
                    foreach ($veiculoKm as $km => $veiculo) {
                        echo "<tr>";
                        echo"<td colspan='3'>$veiculo</td>";
                        echo"<td colspan='3'>" . $km . "</td>";
                        echo "</tr>";

                        $kmVeiculo[] = []; 
                    } 
                   
                ?>
            <tr>
                <td colspan="4">Func. realizou a devolução:  <?php echo $funcDevolucao; ?></td>
                <td>Data da devolução:</td>
                <td><?php echo $data_devolucao; ?></td>
            </tr>
            <tr>
                <td colspan="4">Valor total:R$ <?php echo $valorTotal; ?> </td>
               
                <td colspan="2">Met. pagamento: <?php echo $tipoPagamento; ?></td>
            </tr>
        </table>
        <br>
        <input type="hidden" name="idCliente" value="<?php echo $idCliente; ?>">
        <input type="hidden" name="valorDevolucao" value="<?php echo $valorTotal; ?>">
        <input type="hidden" name="tipoPgamento" value="<?php echo $metPagamento; ?>">

        <input type="submit" value="Confirmar">
    </form>
</body>
</html>