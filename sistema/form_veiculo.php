<?php
/**
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> 
 * @author aNA JULIA <email@email.com>
 * @author julian <email@email.com>
 * @author Maria <mariabeatriz678@icloud.com>
 */
    require_once 'testeLogin.php';
    require_once "conexao.php";
    require_once "operacoes.php";

    $nomeveiculo = $_GET['nomeveiculo']; #s
    $anoveiculo = $_GET['anoveiculo'];#s
    $marcaveiculo = $_GET['marcaveiculo'];#s
    $tipoveiculo = $_GET['veiculo'];#i
    $corveiculo = $_GET['corveiculo'];#s
    $placaveiculo = $_GET['placaveiculo'];#s
    $disponibilidade = 1;#i
    $motor = $_GET['motor'];#s
    $kmrodado = $_GET['kmrodado'];#s
    $descricao = $_GET['descricao'];#s
    $portas = $_GET['portas'];#i
    $arcondicionado = $_GET['ar'];#i
    $portamala = $_GET['portamala'];#i
    $tamanho = $_GET['tamanho'];#i
    $cambio = $_GET['cambio'];#i
    $passageiro = $_GET['passageiro'];#i
    


    $sql = "INSERT INTO tb_veiculo (nome_veiculo, ano_veiculo, marca_veiculo, tipo_veiculo, cor_veiculo, placa_veiculo, estado_veiculo, motor_veiculo, 
    km_rodados, descricao_veiculo, qtd_portas, arcondicionado_veiculo, portamala_veiculo, tamanho_veiculo, cambio_veiculo, npassageiro_veiculo)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    #       1  2  3  4  5  6  7  8  9  0  1  2  3  4  5  6
    $stmt =  mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt,"sssississssiiiii", $nomeveiculo, $anoveiculo,$marcaveiculo, $tipoveiculo, $corveiculo, $placaveiculo, $disponibilidade, $motor, $kmrodado, $descricao, $portas, $arcondicionado, $portamala,$tamanho, $cambio, $passageiro);

    if ( mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header('Location: exibir_veiculos.php');
        exit();
    
    };
?>