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

    $veiculo = $_GET['id_veiculo'];  //Pega o valor associado à chave id_veiculo na URL e armazena na variável $veiculo.
    $nome = $_GET['nome_veiculo'];   //Pega o valor associado à chave nome_veiculo na URL e coloca na variável $nome.
    $aluguel = $_GET['id_aluguel'];  //Obtém o valor da chave id_aluguel e salva na variável $aluguel.
    $id_cliente = $_GET['cliente'];  //Captura o valor da chave cliente e guarda na variável $id_cliente.
    $nome_cliente = $_GET['nome'];   //Pega o valor associado à chave nome na URL e armazena na variável $nome_cliente.

    $_SESSION['carrinho_devolucao']['nome_devolucao'][] = $nome; //Ele guarda o nome do veículo (armazenado na variável $nome) no carrinho de devolução. Isso é feito adicionando o nome em um array específico para nomes de veículos.   
    $_SESSION['carrinho_devolucao']['veiculo_devolucao'][] = $veiculo; //Aqui, ele armazena o ID do veículo (armazenado na variável $veiculo) em outro array, para que o sistema saiba qual veículo está sendo devolvido.

    //Ele guarda um conjunto completo de informações do veículo (ID, nome e aluguel) em um único item de um array, facilitando o acesso e a manipulação desses dados juntos.
    $_SESSION['carrinho_devolucao']['veiculos_devolucao'][] = [   
        "id_veiculo" => $veiculo,
        "nome" => $nome,
        "aluguel" => $aluguel
    ];
    //O usuário é redirecionado para dados_individuais.php, com os parâmetros id_cliente e nome_cliente na URL.
    if ($_GET["origem"] == 1) {
        header("Location: dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente");

        exit(); //O exit() garante que o código pare de ser executado após o redirecionamento.

    }elseif ($_GET["origem"] == 2) { //O usuário é redirecionado para dados_devolucao.php, com os parâmetros cliente, nome, e aluguel na URL.
        header("Location: dados_devolucao.php?cliente=$id_cliente&nome=$nome_cliente&aluguel=$aluguel");

        exit(); //Também é usado o exit() para parar a execução do script após o redirecionamento.
    }


?>