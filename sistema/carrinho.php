<?php
/**
 * Este arquivo coleta os dados do veículo e os organiza no carrinho.
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com>.
 * 
 * @requires /conexao.php.
 * @requires /testeLogin.php.
 * @requires /operacoes.php.
 * 
 */
    require_once 'conexao.php';// Conexão com o banco de dados.
    require_once 'testeLogin.php';// Verifica o login do usuário.
    require_once 'operacoes.php';// Funções auxiliares para as operações no sistema.

/**
 * @var int @$origem.
 * @var int @$veiculo.
 * @var string @$nome.
 */

    $origem = $_GET['origem']; // Define a origem da navegação.
    $veiculo = $_GET['id_veiculo']; // ID do veículo que está sendo adicionado ao carrinho.
    $nome = $_GET['nome_veiculo']; // Nome do veículo que está sendo adicionado ao carrinho.

    // Verifica se o veículo já está presente no carrinho de compras da sessão.
    if (in_array($veiculo, $_SESSION['carrinho']['veiculos'])) {

    // Se o veículo já estiver no carrinho, redireciona para a página de exibição de veículos com um aviso.
        header('Location: exibir_veiculos.php?origem=1&warning=1');
        exit();

    }
    else {

        // Caso o veículo não esteja no carrinho, adiciona o veículo e seu nome no carrinho da sessão.
        $_SESSION['carrinho']['veiculos'][] = $veiculo;
        $_SESSION['carrinho']['nome'][] = $nome;

        // Atualiza o array 'nome_veiculo' na sessão, associando cada ID de veículo ao seu nome correspondente.
        $_SESSION['nome_veiculo'] = array_combine($_SESSION['carrinho']['veiculos'], $_SESSION['carrinho']['nome']);
    }

        // Redireciona para a página apropriada com base na origem da navegação.
    if ($origem == 1) {

        // Se a origem for 1, redireciona para a página de exibição de veículos.
        header("Location: exibir_veiculos.php?origem=1");
        exit();
    }elseif ($origem == 2) {

        // Se a origem for 2, redireciona para a página de clientes.
        header("Location: clientes.php?origem=2");
        exit();
    }
?>