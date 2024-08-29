<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
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
    
    <?php

        if ($_GET['origem'] = "1") {
                
                $nome = $_GET['cliente'];

                $sql = "SELECT * FROM tb_cliente WHERE nome_cliente = %?%";

                $stmt = mysqli_prepare($conexao, $sql);
                mysqli_stmt_bind_param($stmt, "s", $nome);
                mysqli_stmt_execute($stmt);
                

            }elseif ($_GET['origem'] = "2") {
                
                

             }elseif ($_GET['origem'] = "3") {

                $sql = "SELECT tb_cliente_id_cliente FROM tb_aluguel";

                $stmt = mysqli_prepare($conexão, $sql);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_bind_result($stmt, $tb_cliente_id_cliente);

                mysqli_stmt_bind_result($stmt);

                $listar = [];
                    if (mysqli_stmt_num_rows($stmt) > 0) {
                        while (mysqli_stmt_fetch($stmt)) {
                            $lista[] = [$tb_cliente_idcliente];
                        }
                    }
                
        

            }else {
                echo "Realize sua busca";
            }
    ?>
</body>
</html>
