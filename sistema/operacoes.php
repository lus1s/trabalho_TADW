<?php

    function idAluguelPorTbVeiculoAluguel($conexao, $id_veiculo){
        $sql = "SELECT tb_aluguel_id_aluguel FROM tb_veiculo_aluguel WHERE tb_veiculo_id_veiculo = ? AND km_final= 0";

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

    function idAluguelPorTbCliente($conexao, $id_cliente){

        $sql = "SELECT id_aluguel FROM tb_aluguel WHERE tb_cliente_id_cliente = ?";

        $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id_cliente);
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

    function inserePessoa($conexao, $cpf, $cnh, $id_cliente){
        $sql = "INSERT INTO `tb_pessoa` (`cpf`, `cnh`, `tb_cliente_id_cliente`) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param($stmt, "ssi", $cpf, $cnh, $id_cliente);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    function insereEmpresa($conexao, $cnpj_cliente, $responsavel, $id_cliente){

        $sql2 = "INSERT INTO `tb_empresa` (`cnpj`, `func_responsavel`, `tb_cliente_id_cliente`) VALUES (?, ?, ?)";

        $stmt2 = mysqli_prepare($conexao, $sql2);

        mysqli_stmt_bind_param($stmt2, "ssi", $cnpj_cliente, $responsavel, $id_cliente);

        mysqli_stmt_execute($stmt2);

        mysqli_stmt_close($stmt2);
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

    function dadosVeiculoPorIdVeiculo($conexao, $id_veiculo){
        
        $sql = "SELECT nome_veiculo, marca_veiculo, km_rodados FROM tb_veiculo WHERE id_veiculo = ?";

        $stmt = mysqli_prepare($conexao, $sql);
          
        mysqli_stmt_bind_param($stmt, "i", $id_veiculo);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_bind_result($stmt, $nome, $marca, $km_rodados);
        
        mysqli_stmt_store_result($stmt);
        
        $dados_veiculos = [];
        if (mysqli_stmt_num_rows($stmt) > 0) {
            while (mysqli_stmt_fetch($stmt)) {
                $dados_veiculos[] = [$nome, $marca, $km_rodados];
            }
        }
        
        mysqli_stmt_close($stmt);

        return $dados_veiculos;
    }

    function devolucaoIndividual ($conexao, $valor, $pagamento, $id_aluguel, $id_funcionario){

        $sql_devolucao = "INSERT INTO `tb_devolucao` (`valor_cobrado`, `forma_pagamento`, `tb_aluguel_id_aluguel`, `tb_funcionario_id_funcionario`) 
        VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conexao, $sql_devolucao);

        mysqli_stmt_bind_param($stmt, "diii", $valor, $pagamento, $id_aluguel, $id_funcionario);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        
    }

    function metodoPagamento($metPagamneto){
       
        if ($metPagamneto == 1) {$metPagamneto = "cartão";}
        elseif ($metPagamneto == 2) {$metPagamneto = "pix";}
        elseif ($metPagamneto == 3) {$metPagamneto = "dinheiro";}

        return $metPagamneto;
    }

    function dadosClientePessoa($conexao, $id_cliente){
        $sql = "SELECT cpf, cnh FROM tb_pessoa WHERE tb_cliente_id_cliente = ?";

        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id_cliente);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $cpf, $cnh);
        mysqli_stmt_store_result($stmt);

        $dados_cliente = [];

        if (mysqli_stmt_num_rows($stmt) > 0) {

            mysqli_stmt_fetch($stmt);

            $dados_cliente[] = [$cpf, $cnh];
        }

        mysqli_stmt_close($stmt);

        return $dados_cliente;
    }

    function dadosClienteEmpresa($conexao, $id_cliente){
        $sql = "SELECT cnpj, func_responsavel FROM tb_empresa WHERE tb_cliente_id_cliente = ?";

        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id_cliente);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $cnpj, $resposavel);
        mysqli_stmt_store_result($stmt);

        $dados_cliente = [];

        if (mysqli_stmt_num_rows($stmt) > 0) {

            mysqli_stmt_fetch($stmt);

            $dados_cliente[] = [$cnpj, $resposavel];
        }

        mysqli_stmt_close($stmt);

        return $dados_cliente;
    }

    function dataAluguel($conexao, $id_cliente){
        $sql = "SELECT data_aluguel FROM tb_aluguel WHERE id_aluguel = ?";
        
        $stmt = mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_bind_param($stmt, "i", $id_cliente);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_bind_result($stmt, $data_aluguel);
        
        mysqli_stmt_store_result($stmt);
        
        $lista = [];
        if (mysqli_stmt_num_rows($stmt) > 0) {
            while (mysqli_stmt_fetch($stmt)) {
                $lista[] = [$data_aluguel];
            }
        }
        mysqli_stmt_close($stmt);
        
        return $data_aluguel;
    }

    function estadoVeiculo($conexao, $id){
        $sql = "UPDATE `tb_veiculo` SET `estado_veiculo` = '1' WHERE `id_veiculo` = ? ";

        $stmt = mysqli_prepare($conexao, $sql);
    
        mysqli_stmt_bind_param($stmt, "i", $id);
    
        mysqli_stmt_execute($stmt);
            
        mysqli_stmt_close($stmt);
    }

    function kmFinal($conexao, $id, $km_final){

        $sql = "UPDATE tb_veiculo_aluguel SET km_final = ? WHERE tb_veiculo_id_veiculo = ? ";

        $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param($stmt, "ii", $km_final, $id);
    
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    function updateKmInicial ($conexao, $id, $km){

        $sql = "UPDATE `tb_veiculo` SET `km_rodados` = ? WHERE `id_veiculo` = ? ";

        $stmt = mysqli_prepare($conexao, $sql);
    
        mysqli_stmt_bind_param($stmt, "si", $km, $id);
    
        mysqli_stmt_execute($stmt);
            
        mysqli_stmt_close($stmt);
    }

    function limparSessionDevolucao (){
        if (isset($_SESSION['carrinho_devolucao'])) {
           
            unset($_SESSION['nome_veiculo_devolucao']);
            unset($_SESSION['carrinho_devolucao']);
            
            $_SESSION['carrinho_devolucao']['veiculos_devolucao'] = array();
            $_SESSION['carrinho_devolucao']['nome_devolucao']= array();
            $_SESSION['nome_veiculo_devolucao'] = array();
        }
    }
?>