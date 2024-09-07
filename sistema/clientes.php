<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    $origem = $_GET['origem'];
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
    <!-- <table>
        <tr>
            <td>id_cliente</td>
            <td>nome_cliente</td>
            <td>tipo_cliente</td>
        </tr>
-->
    
    <?php
        if ($origem == 1) {
            
             $nome = $_GET['cliente'];
    
             $sql = "SELECT nome_cliente FROM tb_cliente WHERE nome_cliente LIKE %?%";
    
             $stmt = mysqli_prepare($conexao, $sql);
             mysqli_stmt_bind_param($stmt, "s", $nome);
             mysqli_stmt_execute($stmt);
     
            
        }elseif ($origem == 2) {
            
            $dados_cliente = [];

            echo"<tr>
                    <td>nome cliente</td>
                    <td>tipo cliente</td>
                    <td>ação</td>
                </tr>";
            
            $sql = "SELECT id_cliente, nome_cliente, tipo_cliente FROM tb_cliente";
   
            $stmt = mysqli_prepare($conexao, $sql);
    
            mysqli_stmt_execute($stmt);    
            mysqli_stmt_bind_result($stmt, $id_cliente, $nome_cliente, $tipo_cliente);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0){
                while (mysqli_stmt_fetch($stmt)) {
                    $dados_cliente[] = [$id_cliente, $nome_cliente, $tipo_cliente];
                    
                    if ($tipo_cliente == "p"){$cliente = "pessoa fisica";}
                    else {$cliente ="empresa";}
                    if (empty($_SESSION['nome_veiculo'])) {$acao = "<button><a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente'>exibir</a></button>";}

                    else {$acao = "<button><a href='dados_cliente.php?origem=4&id_cliente=$id_cliente'>selecionar</a></button>";}

                    echo "<td> $nome_cliente </td>";
                    echo "<td> $cliente </td>";
                    echo "<td> $acao </td>";

                    echo "</tr>";

                }

                echo "<button><a href='form_aluguel.php'>cadastrar novo cliente</a></button>";
            }
        }elseif ($origem == 3) {
               
               echo" <table border='1'>
                 <tr>
                    <td>id_cliente</td>
                    <td>nome_cliente</td>
                    <td>tipo_cliente</td>
                </tr>";

                $sql = "SELECT tb_cliente_id_cliente FROM tb_aluguel";
                
                $stmt = mysqli_prepare($conexao, $sql);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_bind_result($stmt, $id_cliente);

                mysqli_stmt_store_result($stmt);

                $listar = [];
                $listar2 = [];   
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    while (mysqli_stmt_fetch($stmt)) {
                            $listar[] = [$id_cliente];

                            $sql2 = "SELECT * FROM `tb_cliente` WHERE `id_cliente` = ?";

                            $stmt2 = mysqli_prepare($conexao, $sql2);

                            mysqli_stmt_bind_param($stmt2, "i", $id_cliente);

                            mysqli_stmt_execute($stmt2);

                            mysqli_stmt_bind_result($stmt2, $id_cliente, $nome_cliente, $tipo_cliente);

                            mysqli_stmt_store_result($stmt2);

                            if (mysqli_stmt_num_rows($stmt2) > 0){
                                while (mysqli_stmt_fetch($stmt2)) {
                                    $listar2[] = [$id_cliente, $nome_cliente, $tipo_cliente];
                                        
                                        echo "<td> $id_cliente  </td>";
                                        echo "<td> $nome_cliente </td>";
                                        echo "<td> $tipo_cliente </td>";
                                        echo "<td><button><a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente'>exibir</a></button></td>";
    
    
                                        echo "</tr>";
                                   
                                
                                   
                                }
                            } 
                        } 
                    }
                
        

            }else {
                echo "Realize sua busca";
            }

            ?>
            </table>  
</body>
</html>
