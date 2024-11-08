<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>veiculos</title>
</head>
<body>
    <a href="home.php">home</a>
    <div class="position-relative">
        <table class="">
            <tr>
                <td>Nome do veiculo</td>
                <td>Marca</td>
                <td> Placa </td>
                <td>Estado</td>
                <td>Ações</td>
            </tr>
        <tr>
            <?php
                
                $sql = "SELECT id_veiculo, nome_veiculo, marca_veiculo, placa_veiculo, estado_veiculo FROM tb_veiculo";

                $stmt = mysqli_prepare($conexao, $sql);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_bind_result($stmt, $id_veiculo, $nome_veiculo, $marca, $placa, $estado);

                mysqli_stmt_store_result($stmt);

                $dados_veiculos = [];
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    while ($linha = mysqli_stmt_fetch($stmt)) {
                       
                        $dados_veiculos[] = [$id_veiculo, $nome_veiculo, $marca, $placa, $estado];

                        if ($estado == "1"){
                            $estado_exibido = "Disponível"; 
                            $acao = "<button id='botoes' class='btn btn-success'>
                                        <a id='links' href='carrinho.php?id_veiculo=$id_veiculo&nome_veiculo=$nome_veiculo&origem=2' style='color: white;'>Alugar</a>
                                    </button>
                                    <button class='btn btn-dark'>
                                        <a href='carrinho.php?id_veiculo=$id_veiculo&nome_veiculo=$nome_veiculo&origem=1' style='color: white'>selecionar
                                        </a>
                                    </button>"
                             ;} 

                        elseif ($estado == "2"){$estado_exibido = "Alugado"; $acao =  "<button class='btn btn-danger'><a href='devolucao.php?id_veiculo=$id_veiculo&nome_veiculo=$nome_veiculo' style='color: white;'>Devolver</a></button> <button class='btn btn-danger'><a href='devolucao.php?id_veiculo=$id_veiculo' style='color: white;'>inspecionar</a></button>";}

                        echo "<td scope='col'> $nome_veiculo </td>";
                        echo "<td scope='col'> $marca </td>";
                        echo "<td scope='col'> $placa </td>";
                        echo "<td scope='col'> $estado_exibido </td>";
                        echo "<td scope='col'> $acao </td>";
                        echo "</tr>";

                        
                    }

                    echo '<div class="position-absolute top-0 end-0" id="frame">';
                    if (empty($_SESSION['nome_veiculo'])) {
                        echo "selecione alguns veiculos";
                    }else {
                        $nome_veiculo = $_SESSION['nome_veiculo'];
            
                        foreach ($nome_veiculo as $id => $nome) {
                            echo"
                                <div class='card' style='width: 18rem;'>
                                    <img src='...' class='card-img-top' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$nome</h5>
                                        <a href='limpar_sessions.php?id=$id&origem=3' class='btn btn-primary'>remover</a>
                                    </div>
                                </div> <br>";
            
                            }
                            echo "<a href='limpar_sessions.php?origem=2'>esvaziar carrinho</a>";
            
                            echo '<button> <a href="clientes.php?origem=2">Continuar Aluguel</a></button>';
                            echo '</div>';
                    }
                    
                }else {
                    echo "<td colspan='5'>não há veiculos cadastrados</td>
                        </tr>";
                }
                    
                
                
            ?>
            </table>
            </div>
            
        <button disabled><a href="teste.php">teste</a></button>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>