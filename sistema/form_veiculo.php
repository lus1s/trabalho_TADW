<?php
    require_once 'testeLogin.php';
    require_once "conexao.php";
    require_once "operacoes.php";

    $tipoveiculo = $_GET['veiculo'];
    $marcaveiculo = $_GET['marcaveiculo'];
    $nomeveiculo = $_GET['nomeveiculo'];
    $anoveiculo = $_GET['anoveiculo'];
    $corveiculo = $_GET['corveiculo'];
    $placaveiculo = $_GET['placaveiculo'];
    $motor = $_GET['motor'];
    $kmrodado = $_GET['kmrodado'];
    $passageiro = $_GET['passageiro'];
    $portas = $_GET['portas'];
    $arcondicionado = $_GET['ar'];
    $portamala = $_GET['portamala'];
    $cambio = $_GET['cambio'];
    $tamanho = $_GET['tamanho'];
    $descricao = $_GET['descricao'];
    $disponibilidade = "d";
    


    $sql = "INSERT INTO tb_veiculo (nome_veiculo, ano_veiculo, marca_veiculo, tipo_veiculo, cor_veiculo, placa_veiculo, estado_veiculo, motor_veiculo, km_rodados, descricao_veiculo, qtd_portas, arcondicionado_veiculo, portamala_veiculo, tamanho_veiculo, cambio_veiculo, npassageiro_veiculo)
             VALUES ('?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?')";
    
    $stmt =  mysqli_prepare($conexao, $sql);

    $mysqli_stmt_bind_param($stmt,'is',$tipoveiculo,$marcaveiculo,$nomeveiculo,$anoveiculo,$corveiculo, $placaveiculo, $motor,);
    


    if (mysqli_query($conexao, $sql)) {
        header('Location: index.html');
        exit();
    }else {
        header('Location: form_veiculo.html');
        exit();
    }   
?>