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
            $algueis = alugueisRealizados($conexao);

            print_r($algueis);
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