<?php
session_start();
require_once 'conexao.php';

if ($_GET['origem'] == 1) {

    $nome_cliente = $_GET['nome_cliente'];
    $tipo_cliente = $_GET['tipo'];

    $_SESSION['dados'] = array($nome_cliente, $tipo_cliente);


    // Direciona p/ o proximo formulário a ser preenchido

    if ($tipo_cliente == "p") {
        header('Location: pessoa_fisica.html');
        exit();
    } else {
        header('Location: pessoa_juridica.html');
        exit();
    }
} elseif ($_GET['origem'] == 2) {

    $cpf = $_GET['cpf'];
    $cnh = $_GET['cnh'];
    $endereco = $_GET['endereco'];

    list($nome, $tipo) = $_SESSION['dados'];

    $sql = "INSERT INTO `tb_cliente` (`nome_cliente`, `tipo_cliente`) VALUES ('$nome', '$tipo')";

    mysqli_query($conexao, $sql);

    $sql_busca = "SELECT id_cliente FROM tb_cliente";

    $resultado = mysqli_query($conexao, $sql_busca);

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = (mysqli_fetch_array($resultado))) {
            $id_cliente = $linha['id_cliente'];
        }
    }

    $sql2 = "INSERT INTO `tb_pessoa` (`cpf`, `cnh`, `tb_cliente_id_cliente`) VALUES ('$cpf', '$cnh', $id_cliente)";

    mysqli_query($conexao, $sql2);

    $sql3 = "INSERT INTO `tb_enderecos` (`endereco`, `tb_cliente_id_cliente`) VALUES
('$endereco', '$id_cliente')";


    if (isset($_SESSION['dados'])) {
        unset($_SESSION['dados']);
    }

    if (mysqli_query($conexao, $sql3)) {
        header('Location: index.html');
        exit();
    } else {
        header('Location: form_aluguel');
        exit();
    }



} elseif ($_GET['origem'] == 3) {

    $cnpj_cliente = $_GET['cpf'];
    $endereco_cliente = $_GET['endereco'];

    $_SESSION['dados'][] = $cpf;
    $_SESSION['dados'][] = $endereco;

    list($nome, $tipo, $CNPJ, $endereco) = $_SESSION['dados'];
}
