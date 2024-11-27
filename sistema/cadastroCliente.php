<?php

/**
 * Cadastro de cliente
 * 
 * Esta página processa os dados e envia para o banco
 * 
 * @author Julian Victor <julianvictorlopesoliveira@gmail.com>
 * 
 * @requires conexao.php
 * @requires testeLogin.php
 * @requires operacoes.php
 */

require_once 'conexao.php';
require_once 'testeLogin.php';
require_once 'operacoes.php';

/**
 * @var int       $origem         1 = traz o formuário responsável pela definição do tipo de cliente
 * @var int       $origem         2 = destinado a identificação do cliente em pessoa física ou pessoa jurídica
 * @var int       $origem         3 = traz os formuários específicos referentes aos tipos de cliente
 * @var int       $origem         4 = destinado ao cadastro dos dados do cliente como pessoa física
 * @var int       $origem         5 = destinado ao cadastro dos dados do cliente nos diferentes casos  
 */

/**
 * IF - verificação
 * 
 * Verifica se está vindo do formulário 2 e envia para a origem
 * @var int       $origem         2 = destinado a identificação do cliente em pessoa física ou pessoa jurídica              
 * @var string    $nome           contém o nome do cliente que vem do formulário
 * @var int       $tipo           simboliza se o cliente é pessoa física (CPF) ou pessoa jurídica (CNPJ)           
 * @var mysqli    $conexao        conecta com o banco
 * @var mysqli    $id_cliente     insere o cliente verificado
 * 
 */

if ($_GET['origem'] == 2) {
        
    $nome = $_GET['nome'];
    $tipo = $_GET['tipo'];

    header("Location: cad_cliente.php?origem=3&tipo=$tipo&nome=$nome");
    exit();
}

/**
 * ELSEIF - verificação
 * 
 * Verifica se está vindo do formulário 4 e envia para a origem              
 * @var int       $cpf            recebe o cpf do cliente 
 * @var int       $cnh            recebe a cnh do cliente  
 * @var string    $endereco       recebe o endereço do cliente 
 * @var int       $tipo_cliente   expecifica o cliente em pessoa física    
 * @var mysqli    $conexao        conecta com o banco
 * @var mysqli    $id_cliente     insere o cliente verificado
 */

elseif ($_GET['origem'] == 4){
    $nome = $_GET['nome_cliente'];
    $cpf = $_GET['cpf'];
    $cnh = $_GET['cnh'];
    $endereco = $_GET['endereco'];
    $tipo_cliente = $_GET['tipo'];


    $id_cliente = insereClienteVerificaID($conexao, $nome, $tipo_cliente);

    /** 
     * a função a seguir tem o propósito de inserir o cliente no banco
     */

    inserePessoa($conexao, $cpf, $cnh, $id_cliente);

    /** 
     * a função a seguir tem o propósito de inserir os endereços no banco
     */

    insereEnderecos($conexao,$endereco, $id_cliente);

    header('Location: clientes.php?origem=2');
    exit();

}

/**
 * ELSEIF - verificação
 * 
 * Verifica se está vindo do formulário 5 e envia para a origem            
 * @var int       $cnpj_cliente   identifica o cliente em pessoa jurídica 
 * @var string    $responsavel    recebe o funcionário responsável pela empresa que recebe o empréstimo
 * @var string    $endereco       recebe o endereço do cliente/empresa     
 * @var mysqli    $conexao        conecta com o banco
 * @var mysqli    $id_cliente     insere o cliente verificado
 */

elseif ($_GET['origem'] == 5){
    $nome = $_GET['nome_cliente'];
    $cnpj_cliente = $_GET['cnpj'];
    $responsavel = $_GET['func_resp'];
    $endereco = $_GET['endereco'];

    $id_cliente = insereClienteVerificaID($conexao, $nome, $tipo);

    /** 
     * a função a seguir tem o propósito de inserir a empresa/pessoa jurídica no banco
     */

    insereEmpresa($conexao, $cnpj_cliente, $responsavel, $id_cliente);
    
    /** 
     * a função a seguir tem o propósito de inserir os endereços da empresa/pessoa jurídica no banco
     */

    insereEnderecos($conexao,$endereco, $id_cliente);

    header('Location: clientes.php?origem=2');
    exit();
}
?>