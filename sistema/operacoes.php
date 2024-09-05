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

    function insereAluguelVerificaID($conexao, $funcionario, $id_cliente){

        $sql = "INSERT INTO `tb_aluguel` (`tb_funcionario_id_funcionario`, `tb_cliente_id_cliente`) VALUES (?, ?)";

            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_bind_param($stmt, "ii", $funcionario, $id_cliente);

            mysqli_stmt_execute($stmt);

            $id_cliente = mysqli_stmt_insert_id($stmt);

            mysqli_stmt_close($stmt);

            return $id_cliente;
    }
    
   function insereEnderecos($conexao, $endereco, $id_cliente){
        $sql3 = "INSERT INTO `tb_enderecos` (`endereco`, `tb_cliente_id_cliente`) VALUES (?, ?)";

        $stmt3 = mysqli_prepare($conexao, $sql3);

        mysqli_stmt_bind_param($stmt3, "si", $endereco, $id_cliente);

        mysqli_stmt_execute($stmt3);

        mysqli_stmt_close($stmt3);
    }

    function KmAtual($conexao, $id_veiculo){
        $sql = "SELECT km_rodados FROM tb_veiculo WHERE id_veiculo = ?";
        
        $stmt = mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_bind_param($stmt, "i", $id_veiculo);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_bind_result($stmt, $km_rodados);
        
        mysqli_stmt_store_result($stmt);
        
        $lista = [];
        if (mysqli_stmt_num_rows($stmt) > 0) {
            while (mysqli_stmt_fetch($stmt)) {
                $lista[] = [$km_rodados];
            }
        }
        mysqli_stmt_close($stmt);
        
        return $km_rodados;
    }

    function insereVeiculosAluguel($conexao, $veiculo, $id_aluguel, $km_inicial, $km_final){
        $sql_final = "INSERT INTO `tb_veiculo_aluguel` (tb_veiculo_id_veiculo, tb_aluguel_id_aluguel, km_incial, km_final) VALUES (?, ?, ?, ?)";

        $stmt_final = mysqli_prepare($conexao, $sql_final);

        mysqli_stmt_bind_param($stmt_final, "iiss", $veiculo, $id_aluguel, $km_inicial, $km_final);

        mysqli_stmt_execute($stmt_final);

        mysqli_stmt_close($stmt_final);
    }
    ?>