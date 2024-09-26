<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    $aluguel = $_GET['id_aluguel'];
    $km_rodado = $_GET['km_rodados'];
    $valor = $_GET['valor'];
    $pagamento = $_GET['met_pagamento'];
    $id_veiculo = $_GET['id_veiculo'];
    
    foreach($_SESSION['dados_funcionario'] as $dados){$id_funcionario = $dados[1];}

    devolucaoIndividual($conexao, $valor, $pagamento, $aluguel, $id_funcionario);
    
    kmFinal($conexao, $id_veiculo, $km_rodado);

    updateKmInicial($conexao, $id_veiculo, $km_rodado);

    //alterção no estado do veículo
    updateEstadoVeiculo($conexao, $id_veiculo);
    
    header('Location: exibir_veiculos.php');
    exit;


?>