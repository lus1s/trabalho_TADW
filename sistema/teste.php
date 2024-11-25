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
    <title>TESTES - FAVOR DESCONSIDERAR</title>
</head>
<body>
    <pre>
        <?php
            $array = dadosAluguelNaoDevolvido($conexao);    

            $hj = date('Y-m-d');

            foreach ($array as $value) {
                $data = separarDataHora($value["data"]);
                
               
                print_r($dif);
            }

//            $sql = "SELECT a.id_aluguel, c.nome_cliente, c.id_cliente
// FROM tb_aluguel AS a, tb_veiculo_aluguel AS va, tb_cliente as c
// WHERE c.id_cliente = a.tb_cliente_id_cliente
// AND a.id_aluguel = va.tb_aluguel_id_aluguel;

// SELECT c.id_cliente, c.nome_cliente, c.tipo_cliente
//         FROM tb_cliente AS c, tb_aluguel AS a, tb_veiculo_aluguel AS va
//         WHERE a.id_aluguel = va.tb_aluguel_id_aluguel
//         AND km_final = 0
//         AND c.id_cliente = a.tb_cliente_id_cliente";
            

    //         echo " <table border='1'>
    //         <tr>
            
    //            <td>#</td>
    //            <td>Nome Cliente</td>
    //            <td>Tipo Cliente</td>
    //        </tr>";
    //    $valor = 1;
    //    $sql = "SELECT tb_cliente_id_cliente FROM tb_aluguel";

    //    $stmt = mysqli_prepare($conexao, $sql);

    //    mysqli_stmt_execute($stmt);

    //    mysqli_stmt_bind_result($stmt, $id_cliente);

    //    mysqli_stmt_store_result($stmt);

    //    $listar = [];
    //    if (mysqli_stmt_num_rows($stmt) > 0) {
    //        while (mysqli_stmt_fetch($stmt)) {
    //            $listar[] = [$id_cliente];

    //         }
    //     }
    //     foreach ($listar as $id) {
            
    //         $cliente = dadosCliente($conexao, $id);
    //     }
    //     print_r($cliente);
    //    $dados_unicos = array_unique($cliente, SORT_REGULAR);

    //     foreach ($cliente as $dados) {
    //         $tipo_cliente = $dados["tipo"];
    //         $nome_cliente = $dados["nome"];
    //         $id_cliente = $dados["id"];
    //         if ($tipo_cliente == "p") { $cliente = "pessoa fisica";}
    //         else {$cliente = "empresa";}

    //         echo "<td>" . $valor . "</td>";
    //         echo "<td>" . $dados["nome"] ."</td>";
    //         echo "<td> $cliente </td>";
    //         echo "<td><button><a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente'>exibir</a></button></td>";
    //         echo "</tr>";

    //         $valor++;
    //     }



    //          $sql = "SELECT c.id_cliente, c.nome_cliente, c.tipo_cliente
    //          FROM tb_cliente AS c, tb_aluguel AS a, tb_veiculo_aluguel AS va
    //          WHERE a.id_aluguel = va.tb_aluguel_id_aluguel
    //          AND km_final = 0
    //          AND c.id_cliente = a.tb_cliente_id_cliente";

    //           $stmt = mysqli_prepare($conexao, $sql);
             
    //           mysqli_stmt_execute($stmt);
     
    //           mysqli_stmt_bind_result($stmt, $id, $nomeCliente, $endereco);
     
    //           mysqli_stmt_store_result($stmt);
     
    //           $cliente = [];
    //           if (mysqli_stmt_num_rows($stmt) > 0) {
    //               while (mysqli_stmt_fetch($stmt)) {
    //                   $cliente[] = [
    //                       "id" => $id,
    //                       "cliente" => $nomeCliente,
    //                       "tipo" => $endereco
    //                      ];
    //                  }
    //              }
    //           mysqli_stmt_close($stmt);

    //          $unico = array_unique($cliente, SORT_REGULAR);

    //           print_r($unico);
    //           echo "<br>array do banco<br>";
    //          print_r($cliente)
        ?>
    </pre>
    
    <button><a href="./limpar_sessions_devolucao.php?origem=1">limpar array</a></button>
    
    <?php
        if (empty($_SESSION['nome_veiculo'])) {
            echo"ñ possui coisas";
        }
        else {
            
            echo "possui";
        }
    ?>
</body>
</html>