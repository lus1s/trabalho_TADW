<?php
    require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>veiculos disponiveis</title>
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
                $sql = "SELECT * FROM tb_veiculo";

                $resultados = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($resultados) > 0) {
                    while ($linha = mysqli_fetch_array($resultados)) {
                        
                        $id_veiculo = $linha['id_veiculo'];
                        $nome_veiculo = $linha['nome_veiculo'];
                        $marca = $linha['marca_veiculo'];
                        $cor = $linha['cor_veiculo'];
                        $estado = $linha['estado_veiculo'];

                        if ($estado == "d"){$estado_exibido = "Disponível"; $acao = "<button><a href='form_aluguel.php?id_veiculo=$id_veiculo'>Alugar</a></button>";} 
                        elseif ($estado == "a"){$estado_exibido = "Alugado"; $acao =  "<button><a href='devolucao_veiculo.php'>Devolver</a></button>";}

                        echo "<td> $nome_veiculo  </td>";
                        echo "<td> $marca </td>";
                        echo "<td> $cor </td>";
                        echo "<td> $estado_exibido </td>";
                        echo "<td> $acao </td>";
                        echo "</tr>";
                    }
                }
            ?>
    </table>
</body>
</html>