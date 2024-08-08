<?php
    require_once 'testeLogin.php';
    $nomeFuncionario = $_SESSION['nomeFuncionario'];
    $cpf = $_SESSION['cpf_funcionario'];
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
            <a href="devolucao_veiculo.php">Formulário de devolução</a> <br><br>  
            <a href="exibir_veiculos.php">veiculos</a> <br><br>
            <a href="logout.php">sair</a>
        </div>
    </center>

    <pre>
        <?php
            print_r($_SESSION['lista']);

        ?>
        <br>
        nome: <?php echo$nomeFuncionario; ?>
        <br>cpf: <?php echo $cpf ; ?>

    </pre>
</body>
</html>