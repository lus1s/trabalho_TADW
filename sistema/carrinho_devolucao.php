<?php
    /**
     * carrinho devolucão 
     * 
     * adciona os itens alugados e devolver os itens alugados
     * 
     * @author Luis carlos <email@email.com>
     * 
     * @require_once /conexao.php
     * @require_once /testelogin.php
     * @require_ONCE /operacoes
     * 
     *  
     */

    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    /**
     * @var int             $veiculo                id do veiculo
     * @var string          $nome                   nome do veiculo
     * @var string          $aluguel                id do aluguel veiculo
     * @var int             $id_cliente             id cliente e o id que vai está alugando veiculo
     * @var string          $nome_cliente           nome do cliente que vai alugar o veiculo
     */
    $veiculo = $_GET['id_veiculo'];
    $nome = $_GET['nome_veiculo'];
    $aluguel = $_GET['id_aluguel'];
    $id_cliente = $_GET['cliente'];
    $nome_cliente = $_GET['nome'];

/**
 * @var string  $_SESSION['carrinho_devolucao']['nome_devolucao'][]     é um session onde dentro dele tem dois array relcionados ao carrinho de devolução
 * @var string  $_SESSION['carrinho_devolucao']['veiculo_devolucao'][]  é um session onde dentro dele tem dois array relacionados ao carrinho de devolução 
 *$_SESSION['carrinho_devolucao']['nome_devolucao'][] = $nome;         é uma session onde dentro dele tem dois array onde adiciona o um valor nome na sessão atual
 *  $_SESSION['carrinho_devolucao']['veiculo_devolucao'][] = $veiculo;   é um session onde dentro dele tem dois array onde adiciona  o valor de `$veiculo` ao final da lista de veículos na sessão atual.
 *
 *   $_SESSION['carrinho_devolucao']['veiculos_devolucao'][] = [     é um session onde dentro dele tem dois array relcionados ao carrinho 
 *        "id_veiculo" => $veiculo,                                   Essa linha coloca um "pacote" com o ID do veículo
 *        "nome" => $nome,                                            nome e valor do aluguel na lista de devoluções da sessão
 *        "aluguel" => $aluguel                                       basicamente juntando essas informações pra cada veículo devolvido
 *    ];
**/
    header("Location: dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente");
    exit();

?>