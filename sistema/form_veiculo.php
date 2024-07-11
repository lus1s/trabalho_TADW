<?php
require_once "conexao.php";

$tipoveiculo = $_POST['veiculo'];
$marcaveiculo = $_POST['marcaveiculo'];
$nomeveiculo = $_POST['nomeveiculo'];
$anoveiculo = $_POST['anoveiculo'];
$corveiculo = $_POST['corveiculo'];
$placaveiculo = $_POST['placaveiculo'];
$disponibilidade = $_POST['disponibilidade'];
$motor = $_POST['motor'];
$kmrodado = $_POST['kmrodado'];
$passageiro = $_POST['passageiro'];
$portas = $_POST['portas'];
$arcondicionado = $_POST['arcondicionado'];
$portamala = $_POST['portamala'];
$cambio = $_POST[''];
$tamanho = $_POST['tamanho'];
$descricao = $_POST['descricao'];



$sql = "INSERT INTO tb_veiculo(nome_veiculo, ano_veiculo, marca_veiculo, tipo_veiculo, cor_veiculo, placa_veiculo, estado_veiculo, motor_veiculo, km_rodados, descricao_veiculo, qtd_portas, acordicionado_veiculo, portamala_veiculo, tamanho_veiculo, cambio_veiculo, npassageiro_veiculo)
                           VALUES ('$nomeveiculo', '$anoveiculo', '$marcaveiculo', '$tipoveiculo', '$corveiculo', '$placaveiculo', '$disponibilidade', '$motor', '$kmrodado', '$descricao', '$portas', '$arcondicionado', '$portamala', '$tamanho', '$cambio', '$passageiro')";
?>