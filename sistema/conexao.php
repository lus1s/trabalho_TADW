<?php

    /**
     * conexão com o banco
     * 
     * Essas variáveis guardam as informações de conexão com o banco de dados;
     *
     * 
     * @author Luis carlos <luiscarlosantoa1235@gmail.com>
     * 
     * @$servidor / db                colocou endereço do servidor do banco de dados  "db";
     * @$usuario /                    root  nome de usuário para acessar o banco  "root";
     * @senha / 123                   senha para autenticação  "123";
     * @$banco / bd_veiculosFaria     nome do banco de dados que será acessado "bd_veiculosFaria";
     *  
     *
     **/

    $servidor = "db";       
    $usuario = "root";
    $senha = "123";
    $banco = "bd_veiculosFaria";

    //*  Essa linha cria uma conexão com o banco de dados usando as informações fornecida,
     //* caso der certo $conexao vai conter o link de conexão para mexer com o banco. Caso contrário, indicará erro de conexão.*// 
    $conexao = mysqli_connect($servidor , $usuario , $senha , $banco); 
?>