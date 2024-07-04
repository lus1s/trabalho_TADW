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
            <td>Id_aluguel</td>
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
        
                                $sql_busca3 = "SELECT id_aluguel FROM tb_aluguel WHERE tb_cliente_id_cliente = '$id_cliente'";

                                $resultados_busca3 = mysqli_query($conexao, $sql_busca3);

                                if (mysqli_num_rows($resultados_busca3) > 0) {
                                    while ($linha3 = mysqli_fetch_array($resultados_busca3)) {
                                        echo "<td>" . $linha3['id_aluguel'] . "</td>";
                                        
                                        $coisa = $linha3['id_aluguel'];

                                        echo "<td> <button> <a href='devolucao.php?$coisa'>Devolver</a> </button> </td>";
                                        echo "<tr>";
                                        
                                    }
                                }
                            }
                        }
                    }
                }

            ?>
        </tr>
    </table>
</body>
</html>