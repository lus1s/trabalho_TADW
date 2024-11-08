<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    $nome_cliente = $_GET['nome'];
    $id_cliente = $_GET['cliente'];
    $id_aluguel[] = $_GET['aluguel'];
    $dados_veiculos =  removerRepetidosArray($_SESSION['carrinho_devolucao']['veiculos_devolucao']);

    $date = date('d/m/Y');
    foreach($_SESSION['dados_funcionario'] as $dados){

        $nomeFuncionario = $dados[0];
        $id_funcionario = $dados[1];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/script.js"></script>
    <title>Veiculos de <?php echo $nome_cliente; ?></title>
</head>
<body>
    <?php echo "<a href='dados_individuais.php?nome_cliente=$nome_cliente&id_cliente=$id_cliente'>home</a>"; ?> <br><br>
    <form action="confirmar_devolucao.php">
        Data das Devoluções:
        <input type="text" disabled value="<?php echo $date; ?>">  

        <!-- o hidden vai p/ o php, ou outro não -->
        <input type="hidden" name="dt_devolucao" value="<?php echo $date; ?>">

        Funcionario responsável pela devolução: 
        <input type="text" name="funcdevolucao" disabled value="<?php echo $nomeFuncionario; ?>">

        <input type="hidden" name="funcdevolucao" value="<?php echo $nomeFuncionario; ?>">


        <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
        <input type="hidden" name="nome" value="<?php echo $nome_cliente; ?>">

        <br><br>
        <hr><hr>

        <?php
            
            foreach ($dados_veiculos as $dados) {

                $id_veiculo = $dados["id_veiculo"];

                $veiculos = dadosVeiculoPorIdVeiculo($conexao, $id_veiculo);

                foreach ($veiculos as $dados) {
                   $nome_veiculo = $dados[0];
                   $marca_veiculo = $dados[1];
                   $km_incial = $dados[2];
                   
                   echo "Veículo: " . $nome_veiculo . "<br>";

                   echo "Marca: " . $marca_veiculo . "<br>";

                   echo "Km ao alugar: <input type='text' name='km_inicial' disabled value=" . $km_incial . "km> ";
                   echo 'Km ao devolver: <td><input type="text" name="km_devolucao[' . $id_veiculo . ']"></td>';
                   echo "<hr>";                   
                }
            }

        ?>
        Metodo de pagamento:
        <select name="met_pagamento" id="">
            <option value=""></option>
            <option value="1">Cartão</option>
            <option value="2">Pix</option>
            <option value="3">Dinheiro</option>
            
        </select> <br><br>

        Valor cobrado:
        <input type="text" name="valor" id="">

        <br><br>
        <input type="submit" value="Confirmar devolução">
    </form>

    
</body>
</html>