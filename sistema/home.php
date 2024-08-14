<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';
    
   
    foreach($_SESSION['lista'] as $dados){

        $nomeFuncionario = $dados[0];
        $id_funcionario = $dados[1];
    }
    $_SESSION['idFuncionario'] = $id_funcionario;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <center>
        <h3>Bem vindo(a): <?php echo $nomeFuncionario; ?></h3> 
        <div style="background-color:rgb(119, 243, 243);">
            <a href="form_veiculo.html">Formulário de veículo</a> <br><br>
            <a href="formulario_funci.html">Formulário de funcionário</a> <br><br> 
            <a href="exibir_veiculos.php">veiculos</a> <br><br>
            <a href="logout.php">sair</a> <br>
        </div>
    </center>

    <pre>
        <!-- <?php
            // print_r($_SESSION['lista']);

        ?>
        <br> -->

    <!-- <form action="home.php" method="get">
        <input type="text" name="valor" id=""> 
        <input type="hidden" name="origem" value="1">

        <input type="submit" value="CAdastrar">
    </form> -->

    <?php
        
        // if ($_GET['origem'] == "1") {
        //     $valor = $_GET['valor'];
    
        //     $sql = "INSERT INTO tb_teste (valor_aleatorio) VALUES (?)";

        //     $stmt = mysqli_prepare($conexao, $sql);
            
        //     mysqli_stmt_bind_param($stmt, "s", $valor);
            
        //     mysqli_stmt_execute($stmt);
            
        //     mysqli_stmt_close($stmt);
            
        //     $id = mysqli_insert_id($conexao);

        //     echo "id = " . $id;

        // }

        // $nome = "teste";

        // $tipo = "p";

        // print_r(insereClienteVerificaID($conexao, $nome, $tipo));
        
    ?>
    </pre>
</body>
</html>