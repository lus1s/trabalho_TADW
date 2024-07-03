<?php
    session_start();
    require_once 'conexao.php';

    if ($_GET['origem'] == 1) {

        $nome_cliente = $_GET['nome_cliente'];
        $tipo_cliente = $_GET['tipo'];

        $_SESSION['dados'] = array($nome_cliente, $tipo_cliente);

        if ($tipo == "cpf") {
            header('Location: pessoa_fisica.html');
            exit();
        } else {
            header('Location: pessoa_juridica.html');
            exit();
        }
    } elseif ($_GET['origem'] == 2) {

        $cpf_cliente = $_GET['cpf'];
        $cnh_cliente = $_GET['cnh'];
        $endereco_cliente = $_GET['endereco'];

        $_SESSION['dados'][] = $cpf_cliente;
        $_SESSION['dados'][] = $cnh_cliente;
        $_SESSION['dados'][] = $endereco_cliente;
        
        list($nome, $tipo, $CPF, $endereco) = $_SESSION['dados'];

        $sql = "INSERT INTO tb_cliente ('nome', ";

        // INSERT INTO `tb_pessoa` (`cpf`, `cnh`, `tb_cliente_id_cliente`)
// VALUES ('65421387945', '321546879564', '1');
    } elseif ($_GET['origem'] == 3) {

        $cnpj_cliente = $_GET['cpf'];
        $endereco_cliente = $_GET['endereco'];

        $_SESSION['dados'][] = $cpf;
        $_SESSION['dados'][] = $endereco;

        list($nome, $tipo, $CNPJ, $endereco) = $_SESSION['dados'];

        
    }
?>