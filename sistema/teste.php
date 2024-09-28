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
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
            $sql = "SELECT c.id_cliente, c.nome_cliente, c.tipo_cliente
            FROM tb_cliente AS c, tb_aluguel AS a, tb_veiculo_aluguel AS va
            WHERE a.id_aluguel = va.tb_aluguel_id_aluguel
            AND km_final = 0
            AND c.id_cliente = a.tb_cliente_id_cliente";
             $stmt = mysqli_prepare($conexao, $sql);
             
             mysqli_stmt_execute($stmt);
     
             mysqli_stmt_bind_result($stmt, $id, $nomeCliente, $endereco);
     
             mysqli_stmt_store_result($stmt);
     
             $cliente = [];
             if (mysqli_stmt_num_rows($stmt) > 0) {
                 while (mysqli_stmt_fetch($stmt)) {
                     $cliente[] = [
                         "id" => $id,
                         "cliente" => $nomeCliente,
                         "tipo" => $endereco
                     ];
                 }
             }
             mysqli_stmt_close($stmt);
            

             foreach ($cliente as $dados){
            
                if (in_array)) {
                    
                }
                print_r($dados["id"]);
            }
        ?>
    </pre>
    
    
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