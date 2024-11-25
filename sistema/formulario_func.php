<?php
require_once 'testeLogin.php';
require_once "conexao.php";

$name = $_GET['name'];         //Recupera o valor da variável name passada na URL e o armazena na variável $name.
$cpf = $_GET['cpf'];           //Recupera o valor da variável cpf passada na URL e o armazena na variável $cpf.
$password = $_GET['password']; //Recupera o valor da variável password passada na URL e o armazena na variável $password.

//Cria uma consulta SQL para inserir dados na tabela tb_funcionario com placeholders para nome_funcionario, cpf_funcionario, e senha_funcionario.
$sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, senha_funcionario)
            VALUES (?, ?, ?)";

//Prepara a consulta SQL para execução no banco de dados.
$stmt = mysqli_prepare($conexao, $sql);

//Associa os valores de $name, $cpf e $password aos parâmetros ? na consulta preparada, especificando que são do tipo string ("sss").
mysqli_stmt_bind_param($stmt, "sss", $name, $cpf, $password);




if (mysqli_stmt_execute($stmt)) { //Executa a consulta SQL preparada. Se for bem-sucedida, entra no bloco if.
    mysqli_stmt_close($stmt);     //Fecha a declaração SQL preparada ($stmt), liberando os recursos.
    header('Location: home.php'); //Redireciona o usuário para a página home.php.
    exit(); //Interrompe a execução do script após o redirecionamento.

} else { //Caso a execução da consulta falhe, entra no bloco else.

    mysqli_stmt_close($stmt); //Fecha novamente a declaração SQL preparada.

    header('Location: formulario_funci.html'); //Redireciona o usuário de volta para o formulário formulario_funci.html.
    exit(); //Interrompe a execução do script após o redirecionamento.
}

?>