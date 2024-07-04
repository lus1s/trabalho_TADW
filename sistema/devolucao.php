<?php
    session_start();
    require_once 'conexao.php';

    $data_devolucao = $_GET['data_devolucao'];
    $km_rodados = $_GET['km_rodados'];
    $valor_cobrado = $_GET['valor_cobrado'];
    $cpf_cliente = $_GET['cpf_cliente'];

    $sql_busca1 = "SELECT id_aluguel FROM tb_aluguel";
    $sql_busca2 = "SELECT id_pessoa FROM tb_pessoa";
    
    $sql = "INSERT INTO `tb_devolucao` (`data_devolucao`, `km_rodados`, `valor_cobrado`, `tb_aluguel_id_aluguel`) VALUES ('$data_devolucao', '$km_rodados', '$valor_cobrado', '$sql_busca')";
    
    mysqli_query($conexao, $sql);

?>