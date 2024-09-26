<?php
session_start();

    if ($_GET['origem'] == 1) {

        $cliente = $_GET['cliente'];
        $nome_cliente = $_GET['nome'];
        
        if (isset($_SESSION['carrinho_devolucao'])) {
           
            unset($_SESSION['nome_veiculo_devolucao']);
            unset($_SESSION['carrinho_devolucao']);
            
            $_SESSION['carrinho_devolucao']['veiculos_devolucao'] = array();
            $_SESSION['carrinho_devolucao']['nome_devolucao']= array();
            $_SESSION['nome_veiculo_devolucao'] = array();

            header("Location: dados_individuais.php?id_cliente=$cliente&nome_cliente=$nome_cliente");
            exit();

        } else {

            header("Location: dados_individuais.php?id_cliente=$cliente&nome_cliente=$nome_cliente");
            exit();
        }
    }
    elseif ($_GET['origem'] == 2) {

        $cliente = $_GET['cliente'];
        $nome_cliente = $_GET['nome'];

        $id = $_GET['id'];
    
        unset($_SESSION['nome_veiculo_devolucao'][$id]);

        header("Location: dados_individuais.php?id_cliente=$cliente&nome_cliente=$nome_cliente");
        exit();
    }
?>