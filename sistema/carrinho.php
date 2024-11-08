<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';

    $origem = $_GET['origem'];
    $veiculo = $_GET['id_veiculo'];
    $nome = $_GET['nome_veiculo'];

    if (in_array($veiculo, $_SESSION['carrinho']['veiculos'])) {

        header('Location: exibir_veiculos.php?origem=1&warning=1');
        exit();
    }else {
        $_SESSION['carrinho']['veiculos'][] = $veiculo;
        
        $_SESSION['carrinho']['nome'][] = $nome;

        $_SESSION['nome_veiculo'] = array_combine($_SESSION['carrinho']['veiculos'], $_SESSION['carrinho']['nome']);
    }

    if ($origem == 1) {
        
        header("Location: exibir_veiculos.php?origem=1");
        exit();
    }elseif ($origem == 2) {

        header("Location: clientes.php?origem=2");
        exit();
    }
?>