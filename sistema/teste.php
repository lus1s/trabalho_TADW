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
            print_r($_SESSION['nome_veiculo']);
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