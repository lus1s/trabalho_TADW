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

            // $veiculo = $_SESSION['carrinho_devolucao']['veiculos_devolucao'];
            // $kmRodado = $_SESSION['kmdevolucao'];
            // $veiculoKm = array_combine($veiculo, $kmRodado);


            // foreach ($veiculoKm as $id => $km) {

                
            // }

            $km = 0;

            $id = 1;

            $stmt = mysqli_prepare($conexao, $sql);
    
            mysqli_stmt_bind_param($stmt, "ii", $km, $id);
        
            mysqli_stmt_execute($stmt);
    
            mysqli_stmt_close($stmt);


            // print_r($id_aluguel);
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