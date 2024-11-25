<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    //Inicia um loop que percorre os dados armazenados em $_SESSION['dados_funcionario'], onde cada item é armazenado na variável $dados.
    foreach($_SESSION['dados_funcionario'] as $dados){

        //Atribui o primeiro valor de $dados (presumivelmente o nome do funcionário) à variável $nomeFuncionario.
        $nomeFuncionario = $dados[0];

        //Atribui o segundo valor de $dados (presumivelmente o ID do funcionário) à variável $id_funcionario.
        $id_funcionario = $dados[1];
        
        //Atribui o terceiro valor de $dados (presumivelmente o CPF do funcionário) à variável $cpf.
        $cpf = $dados[2];
    }
    //Cria a consulta SQL para selecionar a senha do funcionário com base no id_funcionario.
    $sql = "SELECT senha_funcionario FROM tb_funcionario WHERE id_funcionario = ?";

    //Prepara a consulta SQL para execução, utilizando a conexão $conexao.
    $stmt = mysqli_prepare($conexao, $sql);

    //Associa o valor de $id_funcionario ao parâmetro ? da consulta SQL, especificando que o tipo de dado é um inteiro ("i").
    mysqli_stmt_bind_param($stmt, "i", $id_funcionario);

    //Executa a consulta preparada.
    mysqli_stmt_execute($stmt);

    //Associa o resultado da consulta à variável $pass (onde será armazenada a senha do funcionário).
    mysqli_stmt_bind_result($stmt, $pass);

    //Armazena os resultados da consulta para uso posterior.
    mysqli_stmt_store_result($stmt);

    //Verifica se a consulta retornou algum resultado (se o número de linhas é maior que 0).
    if (mysqli_stmt_num_rows($stmt) > 0) {

        //Inicia um loop para buscar os dados da consulta e armazená-los em $pass.
        while (mysqli_stmt_fetch($stmt)) {
            $busca_pass = $pass; //Atribui o valor de $pass (a senha) à variável $busca_pass.
        }
    }

    if ($_GET["origem"]==1) {}      //Verifica se o parâmetro origem na URL é igual a 1. Se for, nada acontece.
    elseif ($_GET["origem"]==2) {   //Se origem for igual a 2, executa o bloco de código dentro do elseif.
        $senha = $_GET["senha"];    //Recupera o valor de senha da URL e armazena na variável $senha.

        alterarSenha($conexao, $senha, $id_funcionario); //Chama a função alterarSenha para atualizar a senha do funcionário no banco de dados.

        header('Location: funcionario.php?origem=1');  //Redireciona para funcionario.php com origem=1 na URL.
        exit(); //Interrompe a execução do script após o redirecionamento.
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
            <a href="funcionario.php?origem=1" id="funcionario">
                Funcionário: <u><?php echo $nomeFuncionario; ?></u>
            </a>

            <button class="btn btn-danger" type="submit"><a href="limpar_sessions.php?origem=1" id="sair">Sair</a></button>
        </div>
    </nav>

    <div class="dados-funcionario">
       <div class="card-dados-func">
            <div class="card-body">
                <h5 class="card-title">DADOS PESSOAIS DO FUNCIONÁRIO</h5>
                <p class="card-text">Nome do Funcionário</p>
                <p class="card-text"><?php echo"$nomeFuncionario"; ?></p>
                <p class="card-text">CPF do Funcionário</p>
                <p class="card-text"><?php echo"$cpf"; ?></p>
            </div>
        </div> 
    </div>
    <div class="alt-senha-func">
        <div class="card-alt-senha-func">
            <div class="card-body">
                <h5 class="card-title">ALTERAR A SENHA DO FUNCIONÁRIO</h5>
                <p class="card-text">Senha Atual</p>
                <p class="card-text"> <input type="text" disabled value="<?php echo $busca_pass; ?>" id=""></p>
                <form action="funcionario.php">
                    <p class="card-text">Nova Senha</p>
                    <p class="card-text"><input type="text" name="senha"></p>
                    <input type="hidden" name="origem" value="2">
                    <input type="submit" value="Alterar">
                </form>
            </div>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Novo Funcionário</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="formulario_funci.html" class="btn">Cadastrar Funcionário</a>
      </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>