<?php
    /**
     * carrinho devolucão 
     * 
     * ela adciona os itens alugados e devolver os itens alugados
     * 
     * @author Luis carlos <email@email.com>
     * 
     * @require_once /conexao.php
     * @require_once /testelogin.php
     * @require_ONCE /operacoes
     * 
     *  
     */
    /**
     * 
     */
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    /**
     * @var string $veiculo 
     * 
     */
    $veiculo = $_GET['id_veiculo'];
    $nome = $_GET['nome_veiculo'];
    $aluguel = $_GET['id_aluguel'];
    $id_cliente = $_GET['cliente'];
    $nome_cliente = $_GET['nome'];

    $_SESSION['carrinho_devolucao']['nome_devolucao'][] = $nome;
    $_SESSION['carrinho_devolucao']['veiculo_devolucao'][] = $veiculo;

    $_SESSION['carrinho_devolucao']['veiculos_devolucao'][] = [
        "id_veiculo" => $veiculo,
        "nome" => $nome,
        "aluguel" => $aluguel
    ];

    header("Location: dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente");
    exit();

?>