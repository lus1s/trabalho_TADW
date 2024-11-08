<?php

/**
 * Cadastro de cliente
 * 
 * Esta página processa os dados e envia para o banco
 * 
 * @author Luís Carlos <email@email.com>
 * 
 * @requires testeLogin.php
 * @requires operacoes.php
 * @requires conexao.php
 */

    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    $origem = $_GET['origem'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="./busca_clientes.html">voltar</a>
    <table border="1">
        <?php
            if ($origem == 1) {
                $nome = $_GET['cliente'];

                $sql = "SELECT nome_cliente FROM tb_cliente WHERE nome_cliente LIKE %?%";

                $stmt = mysqli_prepare($conexao, $sql);

                mysqli_stmt_bind_param($stmt, "s", $nome);
                mysqli_stmt_execute($stmt);
            } 

            elseif ($origem == 2) {
                $valor = 1;
                $dados_cliente = [];

                echo "<tr>
                        <td>#</td>
                        <td>Nome Cliente</td>
                        <td>Tipo Cliente</td>
                        <td>Ação</td>
                     </tr>";

                $sql = "SELECT id_cliente, nome_cliente, tipo_cliente FROM tb_cliente";

                $stmt = mysqli_prepare($conexao, $sql);

                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id_cliente, $nome_cliente, $tipo_cliente);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    while (mysqli_stmt_fetch($stmt)) {
                        $dados_cliente[] = [$id_cliente, $nome_cliente, $tipo_cliente];

                        if ($tipo_cliente == "p") {
                            $cliente = "pessoa fisica";
                        }
                        else {
                            $cliente = "empresa";
                        }
                        if (empty($_SESSION['nome_veiculo'])) {
                            $acao = "<button><a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente'>exibir</a></button>";
                        }
                        else {
                            $acao = "<button><a href='dados_cliente.php?origem=4&id_cliente=$id_cliente'>selecionar</a></button>";
                        }

                        echo "<td> $valor </td>";
                        echo "<td> $nome_cliente </td>";
                        echo "<td> $cliente </td>";
                        echo "<td> $acao </td>";
                        echo "</tr>";
                        $valor++;
                    }

                    echo "<button><a href='cad_cliente.php?origem=1'>cadastrar novo cliente</a></button>";
                }
            }
            
            elseif ($origem == 3) {

                echo " <table border='1'>
                        <tr>
                            <td>#</td>
                            <td>Nome Cliente</td>
                            <td>Tipo Cliente</td>
                        </tr>";

                $valor = 1;
                
                $cliente = clientesCadastradasSemAluguel($conexao);

                $unico = array_unique($cliente, SORT_REGULAR);

                foreach ($unico as $dados) {
                    $tipo_cliente = $dados["tipo"];
                    $nome_cliente = $dados["cliente"];
                    $id_cliente = $dados["id"];

                    if ($tipo_cliente == "p"){ $cliente = "pessoa fisica";}
                    else {$cliente = "empresa";}

                    echo "<td>" . $valor . "</td>";
                    echo "<td>" . $dados["cliente"] ."</td>";
                    echo "<td> $cliente </td>";
                    echo "<td><button><a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente'>exibir</a></button></td>";
                    echo "</tr>";
                    $valor++;
                }
            } 

            else {
                echo "Realize sua busca";
            }

        ?>
    </table>
</body>

</html>