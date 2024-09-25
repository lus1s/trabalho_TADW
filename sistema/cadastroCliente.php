<?php
require_once 'conexao.php';
require_once 'testeLogin.php';
require_once 'operacoes.php';

if ($_GET['origem'] == 2) {
        
    $nome = $_GET['nome_cliente'];
    $tipo = $_GET['tipo'];

    $id_cliente = insereClienteVerificaID($conexao, $nome, $tipo);

    header("Location: cad_cliente.php?origem=3&id_cliente=$id_cliente&tipo=$tipo");
    exit();
}
elseif ($_GET['origem'] == 4){

    $cpf = $_GET['cpf'];
    $cnh = $_GET['cnh'];
    $endereco = $_GET['endereco'];
    $tipo_cliente = $_GET['tipo'];
    $id_cliente = $_GET['id_cliente'];

    inserePessoa($conexao, $cpf, $cnh, $id_cliente);

    insereEnderecos($conexao,$endereco, $id_cliente);

    header('Location: clientes.php?origem=2');
    exit();

}
elseif ($_GET['origem'] == 5){
    $cnpj_cliente = $_GET['cnpj'];
    $responsavel = $_GET['func_resp'];
    $endereco = $_GET['endereco'];
    $id_cliente = $_GET['id_cliente'];

    insereEmpresa($conexao, $cnpj_cliente, $responsavel, $id_cliente);
    
    insereEnderecos($conexao,$endereco, $id_cliente);

    header('Location: clientes.php?origem=2');
    exit();
}
?>