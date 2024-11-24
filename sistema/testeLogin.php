<?php
    session_start();  //Inicia a sessão no PHP, permitindo o acesso às variáveis de sessão.
    
    if (isset($_SESSION['logado']) == false) {  //Verifica se a variável de sessão logado não está definida (ou seja, se o usuário não está logado).
        header('Location: index.html');         //Se o usuário não estiver logado, redireciona o navegador para a página index.html.
        exit();     //Se o usuário não estiver logado, redireciona o navegador para a página index.html.
    }
?>