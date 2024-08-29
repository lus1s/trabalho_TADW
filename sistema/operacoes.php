<?php

    function idAluguelPorTbVeiculo($conexao, $id_veiculo){
        $sql = "SELECT tb_aluguel_id_aluguel FROM tb_veiculo_aluguel WHERE tb_veiculo_id_veiculo = ?";

        $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id_veiculo);

        mysqli_stmt_execute($stmt);
    
        mysqli_stmt_bind_result($stmt, $id);
    
        mysqli_stmt_store_result($stmt);
    
        $lista = [];
        if (mysqli_stmt_num_rows($stmt) > 0) {
            while (mysqli_stmt_fetch($stmt)) {
                $lista[] = [$id];
            }
        }
        mysqli_stmt_close($stmt);
    
        return $id;
    }

    function insereClienteVerificaID($conexao, $nome, $tipo){
        $sql = "INSERT INTO `tb_cliente` (`nome_cliente`, `tipo_cliente`) VALUES (?, ?)";

        $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param($stmt, "ss", $nome, $tipo);

        mysqli_stmt_execute($stmt);
        
        return $id_cliente = mysqli_stmt_insert_id($stmt);

        mysqli_stmt_close($stmt);

    }

    function insereAluguelVerificaID($conexao, $data, $funcionario, $id_cliente){

        $sql = "INSERT INTO `tb_aluguel` (`data_aluguel`, `tb_funcionario_id_funcionario`, `tb_cliente_id_cliente`) 
            VALUES (?, ?, ?)";

            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_bind_param($stmt, "sii", $data, $funcionario, $id_cliente);

            mysqli_stmt_execute($stmt);

            $id_cliente = mysqli_stmt_insert_id($stmt);

            mysqli_stmt_close($stmt);

            return $id_cliente;
    }
?>