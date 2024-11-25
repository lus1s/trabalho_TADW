<?php
/**
 * @author MARIA beatris <email@email.com>
 * @author JUlian 
 * @author Luis <email@email.com>
 * 
 */
require_once 'testeLogin.php';
require_once "conexao.php";

$name = $_GET['name'];
$cpf = $_GET['cpf'];
$password = $_GET['password'];

$sql = "INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, senha_funcionario)
            VALUES (?, ?, ?)";


$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "sss", $name, $cpf, $password);




if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header('Location: home.php');
    exit();
} else {
    mysqli_stmt_close($stmt);

    header('Location: formulario_funci.html');
    exit();
}

?>