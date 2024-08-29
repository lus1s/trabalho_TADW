<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';
    

    if ($_GET['origem'] = "1") {
        
        $nome = $_GET['cliente'];

        $sql = "SELECT * FROM tb_cliente WHERE nome_cliente = %?%";

        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $nome);
        mysqli_stmt_execute($stmt);
        

    }elseif ($_GET['origem'] = "2") {
        
        

    }elseif ($_GET['origem'] = "3") {
        
        

    }else {
        echo "Realize sua busca";
    }
?>