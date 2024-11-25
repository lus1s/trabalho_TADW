<?php
session_start();
if ($_GET['origem'] == 1) {

    if (isset($_SESSION['logado'])) {

        unset($_SESSION['logado']);
        
        unset($_SESSION['carrinho']);

        header('Location: index.html');
        exit();
    } else {
        header('Location: home.php');
        exit();
    
    }
}
elseif ($_GET['origem'] == 2) {

    if (isset($_SESSION['carrinho'])) {

        unset($_SESSION['nome_veiculo']);
        unset($_SESSION['carrinho']);
        
        $_SESSION['carrinho']['veiculos'] = array();
        $_SESSION['carrinho']['nome']= array();
        $_SESSION['nome_veiculo'] = array();

        header('Location: exibir_veiculos.php');
        exit();

    } else {

        header('Location: exibir_veiculos.php');
        exit();
    
    }
}
elseif ($_GET['origem'] == 3) {
    $id = $_GET['id'];
    
    unset($_SESSION['nome_veiculo'][$id]);

    header('Location: exibir_veiculos.php');
    exit();
}
?>