<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>veiculos</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Nome do veiculo</td>
            <td>Marca</td>
            <td> Cor </td>
            <td>Estado</td>
            <td>Ações</td>
        </tr>
        <tr>
            <?php
                
                $sql = "SELECT id_veiculo, nome_veiculo, marca_veiculo, cor_veiculo, placa_veiculo, estado_veiculo FROM tb_veiculo";

                $stmt = mysqli_prepare($conexao, $sql);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_bind_result($stmt, $id_veiculo, $nome_veiculo, $marca, $cor, $placa, $estado);

                mysqli_stmt_store_result($stmt);

                $dados_veiculos = [];
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    while ($linha = mysqli_stmt_fetch($stmt)) {
                       
                        $dados_veiculos[] = [$id_veiculo, $nome_veiculo, $marca, $cor, $estado];

                        if ($estado == "1"){$estado_exibido = "Disponível"; $acao = "<button><a href='form_aluguel.php?id_veiculo=$id_veiculo'>Alugar</a></button> <button><a href='carrinho.php?id_veiculo=$id_veiculo'>selecionar</a></button>";} 
                        elseif ($estado == "2"){$estado_exibido = "Alugado"; $acao =  "<button><a href='devolucao.php?id_veiculo=$id_veiculo&nome_veiculo=$nome_veiculo'>Devolver</a></button>";}
                        elseif ($estado == "3") {
                            
                        }

                        echo "<td> $nome_veiculo  </td>";
                        echo "<td> $marca </td>";
                        echo "<td> $cor </td>";
                        echo "<td> $estado_exibido </td>";
                        echo "<td> $acao </td>";
                        echo "</tr>";
                    }
                }else {
                    echo "<td colspan='4'>não há veiculos cadastrados</td>
                        </tr>";
                }
                
            ?>
</body>
</html>