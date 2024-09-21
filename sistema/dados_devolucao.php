<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    $nome_cliente = $_GET['nome'];
    $id_cliente = $_GET['cliente'];
    $id_aluguel = $_GET['aluguel'];
    $dados_veiculos = $_SESSION['nome_veiculo_devolucao'];

    $date = date('d-m-Y');
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
    <form action="">
        Data das Devoluções:
        <input type="text" disabled value="<?php echo $date; ?>">  
        Funcionario responsável pela devolução: 
        <input type="text" disabled value="<?php echo $nomeFuncionario; ?>">
        <br><br>
        <hr>


        <?php
            

            foreach ($dados_veiculos as $id_veiculo => $nome) {

                $veiculos = dadosVeiculoPorIdVeiculo($conexao, $id_veiculo);

                foreach ($veiculos as $dados) {
                   $nome_veiculo = $dados[0];
                   $marca_veiculo = $dados[1];
                   $km_incial = $dados[2];
                   
                   echo "Veículo: " . $nome_veiculo . "<br>";

                   echo "Marca: " . $marca_veiculo . "<br>";

                   echo "Km ao alugar: <input type='text' name='km_inicial' disabled value=" . $km_incial . "km <br>";
                   echo "Km ao devolver: <input type='text' name='km_devolucao'> ";
                   echo "Km ao rodados: <input type='text' disabled name='km_final'>";
                   echo "";
                   echo "<hr>";                   
                }
            }

        ?>
        <button onclick="return kmfinal()">Calcular</button> <br><br>
        Metodo de pagamento:
        <select name="met_pagamento" id="">
            <option value=""></option>
            <option value="1">Cartão</option>
            <option value="2">Pix</option>
            <option value="3">Dinheiro</option>
            
        </select> <br><br>

        Valor cobrado:
        <input type="text" disabled name="valor" id="">

        <br><br>
        <input type="submit" value="Confirmar devolução">
    </form>

    
</body>
</html>