<?php
    function exibirTudo($conexao, $tabela){

        $sql = "SELECT * FROM $tabela";

        $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, );
    }

    function buscaCliente($conexao, $id_cliente){

        $sql = "SELECT * FROM tb_cliente WHERE id_cliente = $id_cliente";

        
    }
?>