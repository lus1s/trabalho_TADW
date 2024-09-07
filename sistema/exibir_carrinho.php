<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
 
  
    <title>Document</title>
</head>
<body>
    <form action="">
        <div class="position-relative">
    <?php
        if (empty($_SESSION['nome_veiculo'])) {
            echo "selecione alguns veiculos";
        }else {
            $nome_veiculo = $_SESSION['nome_veiculo'];

            foreach ($nome_veiculo as $id => $nome) {
                echo"
                    <div class='card' style='width: 18rem;'>
                        <img src='...' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nome</h5>
                            <a href='limpar_sessions.php?id=$id&origem=3' class='btn btn-primary'>remover</a>
                        </div>
                    </div> <br>";

                }
                echo "<a href='limpar_sessions.php?origem=2'>esvaziar carrinho</a>";

                echo '<button> <a href="clientes.php?origem=2">Continuar Aluguel</a></button>';
        }
        
        
    ?>
    
    
</div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>