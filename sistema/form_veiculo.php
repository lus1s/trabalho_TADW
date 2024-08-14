<?php
    require_once 'testeLogin.php';
    require_once "conexao.php";
    require_once "operacoes.php";

    $nomeveiculo = $_GET['nomeveiculo'];
    $anoveiculo = $_GET['anoveiculo'];
    $marcaveiculo = $_GET['marcaveiculo'];
    $tipoveiculo = $_GET['veiculo'];
    $corveiculo = $_GET['corveiculo'];
    $placaveiculo = $_GET['placaveiculo'];
    $disponibilidade = $_GET['disponibilidade'];
    $motor = $_GET['motor'];
    $kmrodado = $_GET['kmrodado'];
    $descricao = $_GET['descricao'];
    $portas = $_GET['portas'];
    $arcondicionado = $_GET['ar'];
    $portamala = $_GET['portamala'];
    $tamanho = $_GET['tamanho'];
    $cambio = $_GET['cambio'];
    $passageiro = $_GET['passageiro'];
    


    $sql = "INSERT INTO tb_veiculo (nome_veiculo, ano_veiculo, marca_veiculo, tipo_veiculo, cor_veiculo, placa_veiculo, estado_veiculo, motor_veiculo, 
    km_rodados, descricao_veiculo, qtd_portas, arcondicionado_veiculo, portamala_veiculo, tamanho_veiculo, cambio_veiculo, npassageiro_veiculo,)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt =  mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt,"ssississssiiiiii",$nomeveiculo,$anoveiculo,$marcaveiculo, $tipoveiculo ,$corveiculo, $placaveiculo, $disponibilidade, $motor, $kmrodado, $descricao ,$portas, $arcondicionado,$portamala,$tamanho,$cambio, $passageiro);
    

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    
?>