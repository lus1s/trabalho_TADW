<?php
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <td>CPF</td>
            <td>Nome</td>
            <td>data aluguel</td>
            <td>Veiculo alugado</td>
            <td>Ação</td>
        </tr>
        <tr>

            <?php

            $sql_busca1 = "SELECT * FROM tb_pessoa";

            $resultados_busca1 = mysqli_query($conexao, $sql_busca1);

            if (mysqli_num_rows($resultados_busca1) > 0) {
                while ($linha = mysqli_fetch_array($resultados_busca1)) {
                    echo "<td>" . $linha['cpf'] . "</td>";
                    $id_cliente = $linha['tb_cliente_id_cliente'];

                    $sql_busca2 = "SELECT * FROM tb_cliente WHERE id_cliente = '$id_cliente'";

                    $resultados_busca2 = mysqli_query($conexao, $sql_busca2);


                    if (mysqli_num_rows($resultados_busca2) > 0) {
                        while ($linha2 = mysqli_fetch_array($resultados_busca2)) {
                            echo "<td>" . $linha2['nome_cliente'] . "</td>";

                            $sql_busca3 = "SELECT * FROM tb_aluguel WHERE tb_cliente_id_cliente = '$id_cliente'";

                            $resultados_busca3 = mysqli_query($conexao, $sql_busca3);

                            if (mysqli_num_rows($resultados_busca3) > 0) {
                                while ($linha3 = mysqli_fetch_array($resultados_busca3)) {

                                    $coisa = $linha3['id_aluguel'];

                                    echo "<td>" . $linha3['data_aluguel'] . "</td>";

                                    $sql_veiculo = "SELECT tb_veiculo_id_veiculo FROM tb_veiculo_aluguel Where tb_aluguel_id_aluguel = '$coisa'";

                                    $resultados_veiculos = mysqli_query($conexao, $sql_veiculo);

                                    if (mysqli_num_rows($resultados_veiculos) > 0) {
                                        while ($linha_veiculo = (mysqli_fetch_array($resultados_veiculos))) {
                                            $id_veiculo = $linha_veiculo['tb_veiculo_id_veiculo'];

                                            $sql = "SELECT nome_veiculo FROM tb_veiculo WHERE id_veiculo = '$id_veiculo'";

                                            $resultados_veiculos2 = mysqli_query($conexao, $sql);

                                            if (mysqli_num_rows($resultados_veiculos2) > 0) {
                                                while ($linha_veiculo2 = (mysqli_fetch_array($resultados_veiculos2))) {
                                                    
                                                    $nome_veiculo = $linha_veiculo2['nome_veiculo'];
                                                    echo "<td>" . $nome_veiculo . "</td>";

                                                    echo "<td> <button> <a href='devolucao.php?id_aluguel=$coisa&nome_veiculo=$nome_veiculo'>Devolver</a> </button> </td>";
                                                    echo "<tr>";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                echo "Não há veiculo em aluguel";
            }

            ?>
    </table>
    <br>
    <table border="1">
        <tr>
            <td>CNPJ</td>
            <td>Nome</td>
            <td>Data do aluguel</td>
            <td>Veiculo alugado</td>
            <td>Ação</td>
        </tr>
        <tr>
            <?php
            $sql_buscacnpj = "SELECT * FROM tb_empresa";

            $resultados_cnpj = (mysqli_query($conexao, $sql_buscacnpj));

            if (mysqli_num_rows($resultados_cnpj) > 0) {
                while ($linha_cnpj = mysqli_fetch_array($resultados_cnpj)) {
                    echo "<td>" . $linha_cnpj['cnpj'] . "</td>";
                    $id_clienteCNPJ = $linha_cnpj['tb_cliente_id_cliente'];

                    $sql_buscaNome = "SELECT * FROM tb_cliente WHERE id_cliente = '$id_clienteCNPJ'";

                    $resultados_buscaNome = mysqli_query($conexao, $sql_buscaNome);

                    if (mysqli_num_rows($resultados_buscaNome) > 0) {
                        while ($linhaNome = mysqli_fetch_array($resultados_buscaNome)) {
                            echo "<td>" . $linhaNome['nome_cliente'] . "</td>";

                            $sql_buscaAluguel = "SELECT * FROM tb_aluguel WHERE tb_cliente_id_cliente = '$id_clienteCNPJ'";

                            $resultados_buscaAluguel = mysqli_query($conexao, $sql_buscaAluguel);

                            if (mysqli_num_rows($resultados_buscaAluguel) > 0) {
                                while ($linha_aluguel = (mysqli_fetch_array($resultados_buscaAluguel))) {
                                    $id_aluguel = $linha_aluguel['id_aluguel'];

                                    echo "<td>" . $linha_aluguel['data_aluguel'] . "</td>";

                                    $sql_veiculo = "SELECT tb_veiculo_id_veiculo FROM tb_veiculo_aluguel Where tb_aluguel_id_aluguel = '$id_aluguel'";

                                    $resultados_veiculos = mysqli_query($conexao, $sql_veiculo);

                                    if (mysqli_num_rows($resultados_veiculos) > 0) {
                                        while ($linha_veiculo = (mysqli_fetch_array($resultados_veiculos))) {
                                            $id_veiculo = $linha_veiculo['tb_veiculo_id_veiculo'];

                                            $sql = "SELECT nome_veiculo FROM tb_veiculo WHERE id_veiculo = '$id_veiculo'";

                                            $resultados_veiculos2 = mysqli_query($conexao, $sql);

                                            if (mysqli_num_rows($resultados_veiculos2) > 0) {
                                                while ($linha_veiculo2 = (mysqli_fetch_array($resultados_veiculos2))) {
                                                    $nome_veiculo2 = $linha_veiculo2['nome_veiculo'];

                                                    echo "<td>" . $nome_veiculo2 . "</td>";

                                                    echo "<td> <button> <a href='devolucao.php?id_aluguel=$id_aluguel&nome_veiculo=$nome_veiculo2'>Devolver</a> </button> </td>";
                                                    echo "<tr>";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                echo "Não há veiculo em aluguel";
            }

            ?>
    </table>
</body>

</html>