<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    $nome_cliente = $_GET['nome_cliente'];

    $id_cliente = $_GET['id_cliente'];
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <title>Dados: <?php echo $nome_cliente; ?></title>
</head>
<body>
    
   
        
    <?php

        $sql = "SELECT cpf, cnh FROM tb_pessoa WHERE tb_cliente_id_cliente = ?";

        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id_cliente);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $cpf, $cnh);
        mysqli_stmt_store_result($stmt);

        $dados_cliente = [];

        if (mysqli_stmt_num_rows($stmt) > 0) {

            mysqli_stmt_fetch($stmt);

            $dados_cliente[] = [$cpf, $cnh];

            echo "Nome do usuario: $nome_cliente <br>";
            echo "CPF: $cpf <br>";
            echo "CNH: $cnh <br><br>";    
        }     

        echo "  <table border='1'>
        <tr>
           
        
    ";


        $id_aluguel = idAluguelPorTbCliente($conexao, $id_cliente);

        $sql = "SELECT tb_veiculo_id_veiculo FROM tb_veiculo_aluguel WHERE tb_aluguel_id_aluguel = ?";

        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_aluguel);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_veiculo);
        mysqli_stmt_store_result($stmt);

        $dados_veiculos = [];

        if (mysqli_stmt_num_rows($stmt) > 0) {
            while (mysqli_stmt_fetch($stmt)) {
                $dados_veiculos[] = [$id_veiculo];

                $veiculos = dadosVeiculoPorIdVeiculo($conexao, $id_veiculo,);

                foreach ($veiculos as $dados) {
                    $nome = $dados[0];
                   echo "<td>" . $dados[0] ."</td>";
                   echo "<td>" . $dados[1] . "</td>";
                   echo "<td>" . $dados[2] . "</td>";
                   echo "<td><button><a href='devolucao.php?nome_veiculo=$nome&id_veiculo=$id_veiculo'> Devolução </a></button></td>";
                   echo "</tr>";
                }
            }
        }   
    ?>
</table>
<!-- 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>