<?php
    require_once 'testeLogin.php';
    require_once "conexao.php";

    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $password = $_GET['password'];

    $sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, senha_funcionario)
            VALUES (?, ?, ?)";


    $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param($stmt, "", $nome, $cpf, $password);

    mysqli_stmt_bind_execute($stmt);
    mysqli_stmt_close($stmt);
   
    header('Location: formulario_funci.html');
    

    
?>