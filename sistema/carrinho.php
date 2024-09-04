<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';

    $veiculo = $_GET['id_veiculo'];

    if (in_array($veiculo, $_SESSION['carrinho']['produto'])) {

        header('Location: exibir_veiculos.php?origem=1&warning=1');
        exit();
    }
    $_SESSION['carrinho']['veiculos'][] = $veiculo;

    header('Location: exibir_veiculos.php?origem=1');
    exit();
?>