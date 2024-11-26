<?php
/**
 * @author Maria <mariabeatriz678@icloud.com>
 * @author JUlian 
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> 
 * 
 */
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Dados: <?php echo"$nomeFuncionario"; ?></title> 
</head>
<body>
    <nav class="navbar">
        <div class="container" id="navbar">
          <a href="home.php" id="logo">Veículos FARIA</a>
          <form class="d-flex" role="search">
            <input class="form-control me-1" type="search" placeholder="Pesquisar" aria-label="search" style="width: 300px;">
            <button class="btn btn-outline-dark" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </button>
          </form>
          <button class="btn btn-danger" type="submit"><a href="limpar_sessions.php?origem=1" id="sair">Sair</a></button>
        </div>
    </nav>

    <div class="container-func">
        <h1>Dados do Funcionário</h1>
        <div class="form-group">
            <p>Nome do Funcionário:</p>
            <p class="card-text"><h3><?php echo"$nomeFuncionario"; ?></h3></p>
        </div>
        <div class="form-group">
            <p>CPF do Funcionário:</p>
            <p class="card-text"><h3><?php echo"$cpf"; ?></h3></p>
        </div>
        <hr>
        <p><h4>Novo Funcionário</h4></p>
        <p>Caso deseje cadastrar um novo funcionário basta clicar no botão abaixo!</p>
        <a href="formulario_funci.html" id="btn-novo-func" class="btn">Cadastrar Novo Funcionário</a>
        <hr>
        <h2>Alterar Senha</h2>
        <div class="card-body">
            Senha Atual
            <p class="card-text" id="input1"><input type="text" disabled value="<?php echo $busca_pass; ?>" id=""></p>
            <form action="funcionario.php">
                <br>
                Nova Senha
                <p class="card-text" id="input2"><input type="text" name="senha"></p>
                <input type="hidden" name="origem" value="2">
                <br>
                <input type="submit" value="Alterar" id="btn-novo-func"  class="btn">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>