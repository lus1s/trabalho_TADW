<?php
    require_once 'operacoes.php';
    require_once 'conexao.php';
    session_start();

    $cpf = $_POST['cpf'];        //Recebe o CPF do formulário.
    $password = $_POST['senha']; // Recebe a senha do formulário.

    //Define a consulta SQL para verificar o CPF e a senha.
    $sql = "SELECT * FROM tb_funcionario WHERE cpf_funcionario = ? AND senha_funcionario = ?";

    //Prepara a consulta SQL.
    $stmt = mysqli_prepare($conexao, $sql);
    
    //Associa os parâmetros CPF e senha à consulta.
    mysqli_stmt_bind_param($stmt, "ss", $cpf, $password);

    //Executa a consulta SQL.
    mysqli_stmt_execute($stmt);

    //Vincula as colunas retornadas às variáveis.
    mysqli_stmt_bind_result($stmt, $id_funcionario, $nome_funcionario, $cpf_func, $pass);

    // Armazena os resultados da consulta.
    mysqli_stmt_store_result($stmt);

    //Cria um array vazio para armazenar os dados do funcionário.
    $dados_funcionario = [];

    if (mysqli_stmt_num_rows($stmt) > 0) {  //Verifica se a consulta retornou algum resultado (ou seja, se o funcionário com o CPF e senha fornecidos foi encontrado).

       mysqli_stmt_fetch($stmt); //Recupera o próximo registro (se houver) da consulta executada e armazena os dados nas variáveis vinculadas.

       
        $dados_funcionario[] = [$nome_funcionario, $id_funcionario, $cpf_func, $pass]; //Armazena os dados do funcionário (nome, ID, CPF e senha) no array $dados_funcionario.
        $_SESSION['dados_funcionario'] = $dados_funcionario; //Salva os dados do funcionário na sessão, para que possam ser usados em outras páginas.

        mysqli_stmt_close($stmt);    //Fecha a declaração SQL para liberar recursos.

        $_SESSION['logado'] = true; //Define a variável de sessão logado como true, indicando que o usuário está autenticado.
        
        $_SESSION['carrinho']['veiculos'] = array(); //Inicializa o carrinho de veículos (vazia) na sessão.
        $_SESSION['carrinho']['nome']= array();      //Inicializa o array de nomes no carrinho.
        $_SESSION['nome_veiculo'] = array();         //Inicializa o array de nome de veículo.
        
        $_SESSION['carrinho_devolucao']['nome_devolucao']= array();      //Inicializa o carrinho de devolução (nome de devolução).
        $_SESSION['carrinho_devolucao']['veiculos_devolucao'] = array(); //Inicializa o carrinho de devolução (veículos).
        $_SESSION['carrinho_devolucao']['veiculo_devolucao'] =array();   //Inicializa o carrinho de devolução (veículos específicos).
        
        header('Location: home.php');
        exit();

    }else {

        header('Location: index.html');
        exit();

    }

?>