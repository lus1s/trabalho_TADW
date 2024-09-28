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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <title>Dados: <?php echo $nome_cliente; ?></title>
</head>
<body>
    
   
        
    <?php

        $dados_cliente = dadosCompletosCliente($conexao, $id_cliente);
        
        if (!empty($dados_cliente)) {
            
            foreach ($dados_cliente as $cliente) {
                echo "Nome do usuario: " .  $cliente['cliente'] . "<br>";
                echo "CPF: " .  $cliente['cpf'] . " <br>";
                echo "CNH: " .  $cliente['cnh'] . " <br>";
                echo "Endereco: " .  $cliente['endereco'] . " <br>";
                echo "<br><br>";
            }
        }else {
            $dados_cliente = dadosCompletosEmpresa($conexao, $id_cliente);

            foreach ($dados_cliente as $cliente) {
                echo "Nome do usuario: " .  $cliente['cliente'] . "<br>";
                echo "CNPJ: " .  $cliente['cnpj'] . " <br>";
                echo "FUNCIONARIO RESPONSÁVEL: " .  $cliente['funcResponsavel'] . " <br>";
                echo "Endereco: " .  $cliente['endereco'] . " <br>";
                echo "<br><br>";
            }
        }

                
    

        echo "  <table border='1'>
        <tr>";


        $id_aluguel = idAluguelPorTbCliente($conexao, $id_cliente);

        $sql = "SELECT tb_veiculo_id_veiculo FROM tb_veiculo_aluguel WHERE tb_aluguel_id_aluguel = ? AND km_final = 0";

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
                   echo "<td><button><a href='devolucao.php?nome_veiculo=$nome&id_veiculo=$id_veiculo'> Devolução </a></button> <button class='btn btn-dark'><a href='carrinho_devolucao.php?id_veiculo=$id_veiculo&nome_veiculo=$nome&cliente=$id_cliente&nome=$nome_cliente' style='color: white;'>selecionar</a></button></td>";
                   
                   echo "</tr>";
                }
            }
        }   

        echo '<div class="position-absolute top-0 end-0" id="frame">';
        if (empty($_SESSION['nome_veiculo_devolucao'])) {
            echo "selecione alguns veiculos";
        }else {
            $nome_veiculo = $_SESSION['nome_veiculo_devolucao'];

            foreach ($nome_veiculo as $id => $nome) {
                echo"
                    <div class='card' style='width: 18rem;'>
                        <img src='...' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nome</h5>
                            <a href='limpar_sessions_devolucao.php?id=$id&origem=2&cliente=$id_cliente&nome=$nome_cliente' class='btn btn-primary'>remover</a>
                        </div>
                    </div> <br>";

                }
                echo "<a href='limpar_sessions_devolucao.php?origem=1&cliente=$id_cliente&nome=$nome_cliente'>esvaziar carrinho</a>";

                echo "<button> <a href='dados_devolucao.php?nome=$nome_cliente&cliente=$id_cliente&aluguel=$id_aluguel'>Continuar devolução</a></button>";
                echo '</div>';
        }
    ?>
</table>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>