<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';

    $idVeiculo = $_GET['idVeiculo'];

    $id_aluguel = idAluguelPorTbVeiculoAluguel($conexao, $idVeiculo);

   

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
            <td>Aluguel Pendente</td>
        </tr>
        <tr>

            <?php

            ?>
        
    </table>
    <br><br>
    <table border="1">
        <tr>
            <td colspan="5">Alugueis já realizados</td>
        </tr>
        <tr>
            <td>Data locação</td>
            <td>Data devolução</td>
            <td>Valor cobrado</td>
            <td>funcionario </td>
            <td>cliente</td>
        </tr>
        
            <?php
                $aluguel = dadosDevoluçãoAluguel($conexao);

                foreach($aluguel as $dados){
                    echo "<tr>";
                    echo "<td>" . $dados["data"] . " </td>";
                    echo "<td>" . $dados["dataDevolucao"] . "</td>";
                    echo "<td>" . $dados["valor"] . "</td>";
                    echo "<td>" . $dados["funcionario"] . "</td>";
                    echo "<td>" . $dados["cliente"] . "</td>";
                    echo "</tr >";
                }
            ?>
    </table>
</body>
</html>