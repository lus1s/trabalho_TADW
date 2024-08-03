<?php
    require_once 'testeLogin.php';
    require_once "conexao.php";

    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $password = $_GET['password'];

    $sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, senha_funcionario)
            VALUES ('$nome', '$cpf', '$password')";


if (mysqli_query($conexao, $sql)) {
    header('Location: index.html');
    exit();
} else {
    header('Location: formulario_funci.html');
    exit();
}

    
?>