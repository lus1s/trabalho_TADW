<?php
    require_once 'operacoes.php';
    require_once 'conexao.php';
    session_start();

    $cpf = $_POST['cpf'];
    $password = $_POST['senha'];

    $sql = "SELECT nome_funcionario, id_funcionario FROM tb_funcionario WHERE cpf_funcionario = ? AND senha_funcionario = ?";

    $stmt = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($stmt, "ss", $cpf, $password);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $nome_funcionario, $id_funcionario);

    mysqli_stmt_store_result($stmt);

    $dados_funcionario = [];

    if (mysqli_stmt_num_rows($stmt) > 0) {

       mysqli_stmt_fetch($stmt);
       
        $dados_funcionario[] = [$nome_funcionario, $id_funcionario];
        $_SESSION['dados_funcionario'] = $dados_funcionario;

        mysqli_stmt_close($stmt);

        $_SESSION['logado'] = true;
        
        $_SESSION['carrinho']['veiculos'] = array();
        $_SESSION['carrinho']['nome']= array();
        $_SESSION['nome_veiculo'] = array();
        
        $_SESSION['carrinho_devolucao']['veiculos_devolucao'] = array();
        $_SESSION['carrinho_devolucao']['nome_devolucao']= array();
        $_SESSION['nome_veiculo_devolucao'] = array();
        
        header('Location: home.php');
        exit();

    }else {

        header('Location: index.html');
        exit();

    }

?>