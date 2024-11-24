<?php
//Inicia a sessão, permitindo acessar ou armazenar dados na variável $_SESSION.
session_start();

    //Verifica se o parâmetro origem na URL é igual a 1. Se for, executa o bloco de código dentro do if.
    if ($_GET['origem'] == 1) {

        //Recupera o valor de cliente da URL e armazena na variável $cliente.
        $cliente = $_GET['cliente'];
        //Recupera o valor de nome da URL e armazena na variável $nome_cliente.
        $nome_cliente = $_GET['nome'];
        
        //Verifica se a sessão carrinho_devolucao existe.
        if (isset($_SESSION['carrinho_devolucao'])) {

           //Remove o valor nome_devolucao da sessão.
            unset($_SESSION['carrinho_devolucao']['nome_devolucao']);
            
            // Remove a sessão inteira carrinho_devolucao.
            unset($_SESSION['carrinho_devolucao']);

            //Cria um array vazio para veiculos_devolucao na sessão.
            $_SESSION['carrinho_devolucao']['veiculos_devolucao'] = array();

            //Cria um array vazio para veiculo_devolucao na sessão.
            $_SESSION['carrinho_devolucao']['veiculo_devolucao'] = array();

            //Redireciona para dados_individuais.php com os parâmetros do cliente
            header("Location: dados_individuais.php?id_cliente=$cliente&nome_cliente=$nome_cliente");
            exit();

        } else {

            //Redireciona o usuário para a página dados_individuais.php, passando os parâmetros id_cliente e nome_cliente na URL.
            header("Location: dados_individuais.php?id_cliente=$cliente&nome_cliente=$nome_cliente");
            exit();
        }
    }
    //Verifica se o parâmetro origem na URL é igual a 2. Se for, executa o bloco de código dentro do elseif.
    elseif ($_GET['origem'] == 2) {

        //Recupera o valor de cliente da URL e armazena na variável $cliente.
        $cliente = $_GET['cliente'];

        //Recupera o valor de nome da URL e armazena na variável $nome_cliente.
        $nome_cliente = $_GET['nome'];

        //Recupera o valor de id da URL e armazena na variável $id.
        $id = $_GET['id'];
    
        //Remove o veículo da sessão veiculos_devolucao com o índice especificado por $id.
        unset($_SESSION['veiculos_devolucao'][$id]);

        //Redireciona novamente para a página dados_individuais.php com os parâmetros do cliente.
        header("Location: dados_individuais.php?id_cliente=$cliente&nome_cliente=$nome_cliente");
        exit();
    }
?>