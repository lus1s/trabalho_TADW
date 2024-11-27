<?php
/**
 * @author Maria <mariabeatriz678@icloud.com>
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> 
 * 
 */
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico de Alugueis</title>
</head>
<body>
<a href="./home.php">voltar</a> <br><br>
<table border="1">
        <tr>
            <td colspan="4">Aluguel Pendente</td>
        </tr>
        <tr>
            <td>Cliente</td>
            <td>Funcionario</td>
            <td>Data</td>
            <td>Devolução</td>
        </tr>
        
            <?php
                $alugueis = dadosAluguelNaoDevolvido($conexao);

                foreach ($alugueis as $valor) {
                    $id = $valor["idCliente"];
                    $cliente = $valor["cliente"];
                    echo "<tr>";
                    echo "<td>". $valor["cliente"] ."</td>";
                    echo "<td>". $valor["funcionario"] ."</td>";
                    echo "<td>". $valor["data"] ."</td>";
                    echo "<td><button><a href='./dados_individuais.php?id_cliente=$id&nome_cliente=$cliente'>Devolução</a></button></td>";
                    echo "</tr>";           
                }
            ?>
        
    </table>

    <button><a href="relatorios.php?origem=1">Solicitar relatorio</a></button>

    <br><br>
    <table border="1">
        <tr>
            <td colspan="5">Alugueis já realizados</td>
        </tr>
        <tr>
            <td>cliente</td>
            <td>funcionario </td>
            <td>Data locação</td>
            <td>Data devolução</td>
            <td>Valor cobrado</td>
        </tr>
        
            <?php
                $aluguel = dadosDevoluçãoAluguel($conexao);

                foreach($aluguel as $dados){
                    echo "<tr>";
                    echo "<td>" . $dados["cliente"] . "</td>";
                    echo "<td>" . $dados["funcionario"] . "</td>";
                    echo "<td>" . $dados["data"] . " </td>";
                    echo "<td>" . $dados["dataDevolucao"] . "</td>";
                    echo "<td>" . $dados["valor"] . "</td>";
                    echo "</tr >";
                }
            ?>
    </table>
    <button><a href="relatorios.php?origem=2">Solicitar relatorio</a></button>

</body>
</html>