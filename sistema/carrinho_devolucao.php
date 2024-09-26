<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';

    $veiculo = $_GET['id_veiculo'];
    $nome = $_GET['nome_veiculo'];
    $id_cliente = $_GET['cliente'];
    $nome_cliente = $_GET['nome'];

    if (in_array($veiculo, $_SESSION['carrinho_devolucao']['veiculos_devolucao'])) {

        header("Location: dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente");
        exit();
    }else {
        $_SESSION['carrinho_devolucao']['veiculos_devolucao'][] = $veiculo;
        
        $_SESSION['carrinho_devolucao']['nome_devolucao'][] = $nome;

        $_SESSION['nome_veiculo_devolucao'] = array_combine($_SESSION['carrinho_devolucao']['veiculos_devolucao'], $_SESSION['carrinho_devolucao']['nome_devolucao']);
    }


    header("Location: dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente");
    exit();

?>