<?php
session_start();                            //Inicia a sessão, permitindo acessar e modificar variáveis de sessão.
if ($_GET['origem'] == 1) {                 //Verifica se o parâmetro origem na URL é igual a 1. Se for, executa o bloco de código dentro do if.

    if (isset($_SESSION['logado'])) {       //Verifica se a variável de sessão logado está definida. Se estiver, executa o bloco de código dentro do if.
        unset($_SESSION['logado']);         //Remove a variável de sessão logado, desconectando o usuário.

        unset($_SESSION['carrinho']);       //Remove a variável de sessão carrinho, apagando os itens do carrinho de compras.

        header('Location: index.html');
        exit();
    } else {
        header('Location: home.php');
        exit();
    
    }
}
elseif ($_GET['origem'] == 2) {                         //Verifica se o parâmetro origem é igual a 2.

    if (isset($_SESSION['carrinho'])) {                 //Verifica se o carrinho existe na sessão.

        unset($_SESSION['nome_veiculo']);               // Remove o item nome_veiculo da sessão.
        unset($_SESSION['carrinho']);                   // Remove o carrinho de compras da sessão.
        
        $_SESSION['carrinho']['veiculos'] = array();    // Cria um array vazio para os veículos no carrinho.
        $_SESSION['carrinho']['nome']= array();         // Cria um array vazio para os nomes no carrinho.
        $_SESSION['nome_veiculo'] = array();            // Cria um array vazio para o nome do veículo.

        header('Location: exibir_veiculos.php');        // Redireciona o usuário para a página de exibição de veículos.
        exit();

    } else {

        header('Location: exibir_veiculos.php');         // Se o carrinho não existir, redireciona para a mesma página de exibição de veículos.
        exit();
    
    }
}
elseif ($_GET['origem'] == 3) {             // Verifica se origem é igual a 3.
    $id = $_GET['id'];                      //Recupera o id da URL.
    
    unset($_SESSION['nome_veiculo'][$id]);  // Remove o veículo específico do array nome_veiculo na sessão.

    header('Location: exibir_veiculos.php'); //Redireciona para a página exibir_veiculos.php.
    exit();
}
?>