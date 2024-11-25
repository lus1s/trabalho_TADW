<?php
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
<a href="./busca_clientes.html">voltar</a>
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
                $alugueis = dadosAluguelNaoDevolvido($conexao);//Obtém os dados dos alugueis não devolvidos do banco de dados.

                foreach ($alugueis as $valor) { //Inicia um loop para percorrer cada aluguel na lista $alugueis.
                    $id = $valor["idCliente"]; //Atribui o idCliente do aluguel à variável $id.

                    $cliente = $valor["cliente"]; //Atribui o nome do cliente à variável $cliente.

                    echo "<tr>";
                    echo "<td>". $valor["cliente"] ."</td>";    //Exibe o nome do cliente em uma célula de tabela.
                    echo "<td>". $valor["funcionario"] ."</td>";//Exibe o nome do funcionário em uma célula de tabela.
                    echo "<td>". $valor["data"] ."</td>";       //Exibe a data do aluguel em uma célula de tabela.
                    //Exibe um botão com um link para a página de devolução, passando id_cliente e nome_cliente como parâmetros.
                    echo "<td><button><a href='./dados_individuais.php?id_cliente=$id&nome_cliente=$cliente'>Devolução</a></button></td>";
                    echo "</tr>";           
                }
            ?>
        
    </table>
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
            //Chama a função dadosDevoluçãoAluguel para obter informações sobre os alugueis devolvidos do banco de dados.
                $aluguel = dadosDevoluçãoAluguel($conexao);
                //Inicia um loop para percorrer cada registro de aluguel devolvido na variável $aluguel.

                foreach($aluguel as $dados){
                    //Inicia uma nova linha de tabela (<tr>).
                    echo "<tr>";
                    echo "<td>" . $dados["cliente"] . "</td>";      //Exibe o nome do cliente em uma célula da tabela.
                    echo "<td>" . $dados["funcionario"] . "</td>";  //Exibe o nome do funcionário em uma célula da tabela.
                    echo "<td>" . $dados["data"] . " </td>";        //Exibe a data do aluguel em uma célula da tabela.
                    echo "<td>" . $dados["dataDevolucao"] . "</td>";//Exibe a data da devolução do veículo em uma célula da tabela.
                    echo "<td>" . $dados["valor"] . "</td>";        //Exibe o valor do aluguel em uma célula da tabela.
                    echo "</tr >";
                }
            ?>
    </table>
</body>
</html>