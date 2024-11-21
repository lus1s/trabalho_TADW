<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    foreach($_SESSION['dados_funcionario'] as $dados){
        $nomeFuncionario = $dados[0];
        $id_funcionario = $dados[1];
        $cpf = $dados[2];
    }

    $sql = "SELECT senha_funcionario FROM tb_funcionario WHERE id_funcionario = ?";

    $stmt = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($stmt, "i", $id_funcionario);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $pass);

    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        while (mysqli_stmt_fetch($stmt)) {
            $busca_pass = $pass;
        }
    }

    if ($_GET["origem"]==1) {} 
    elseif ($_GET["origem"]==2) {
        $senha = $_GET["senha"];

        alterarSenha($conexao, $senha, $id_funcionario);

        header('Location: funcionario.php?origem=1');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados: <?php echo"$nomeFuncionario"; ?></title>
    
</head>
<body>
    <a href="./home.php">Voltar</a> <br><br>
    Nome do Funcionário: <?php echo"$nomeFuncionario"; ?> <br>
    CPF: <?php echo"$cpf"; ?> <br><br>
    <hr>
    Alterar senha: <br><br>
    Senha Atual:
    <input type="text" disabled value="<?php echo $busca_pass; ?>" id=""> <br><br>
    <form action="funcionario.php">
        Nova Senha: <input type="text" name="senha">
        <input type="hidden" name="origem" value="2">

        <input type="submit" value="Alterar">
    </form>

</body>
</html>