<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    if ($_GET['origem'] == 1) {

        $nome_cliente = $_GET['nome_cliente'];
        $tipo_cliente = $_GET['tipo'];
        $id_veiculo = $_GET['idVeiculo'];
        $funcionario = $_SESSION['idFuncionario'];

        $_SESSION['dados'] = array($nome_cliente, $tipo_cliente, $id_veiculo, $funcionario);

        //futuramente adicionar uma verificação para que um cliente cadastrado não seja cadastrado de novo.
        //até lá vai ficar assim
        // Fazer com função

        // Direciona p/ o proximo formulário a ser preenchido
        if ($tipo_cliente == "p") {
            header('Location: pessoa_fisica.html');
            exit();
        } else {
            header('Location: pessoa_juridica.html');
            exit();
        }

        //Formulario pessoa física
    } elseif ($_GET['origem'] == 2) {

        $cpf = $_GET['cpf'];
        $cnh = $_GET['cnh'];
        $endereco = $_GET['endereco'];
        $data = date('Y-m-d');


        //separa os dados do array em variaveis
        list($nome, $tipo, $veiculo, $funcionario) = $_SESSION['dados'];


        //cadastra os dados que foram separados no banco
        // $sql = "INSERT INTO `tb_cliente` (`nome_cliente`, `tipo_cliente`) VALUES (?, ?)";

        // $stmt = mysqli_prepare($conexao, $sql);

        // mysqli_stmt_bind_param($stmt, "ss", $nome, $tipo);

        // mysqli_stmt_execute($stmt);

        // mysqli_stmt_close($stmt);


        // //busca para pegar o último id cadstrado
        // $sql_busca = "SELECT id_cliente FROM tb_cliente";

        // $stmt_resultado = mysqli_prepare($conexao, $sql_busca);

        // mysqli_stmt_execute($stmt_resultado);

        // mysqli_stmt_bind_result($stmt_resultado, $id_cliente);

        // mysqli_stmt_store_result($stmt_resultado);

        //   if (mysqli_stmt_fetch($stmt_resultado)) {
        //       $id_cliente = $id_cliente;
        //   }
        // mysqli_stmt_close($stmt_resultado);


        //faz tudo que os dois trechos anteriores fazem.(os que estão comentados)
        $id_cliente = insereClienteVerificaID($conexao, $nome, $tipo);


        //cadastro dos dados do formulario pessoa fisica
        $sql2 = "INSERT INTO `tb_pessoa` (`cpf`, `cnh`, `tb_cliente_id_cliente`) VALUES (?, ?, ?)";
        
        $stmt2 = mysqli_prepare($conexao, $sql2);

        mysqli_stmt_bind_param($stmt2, "ssi", $cpf, $cnh, $id_cliente);

        mysqli_stmt_execute($stmt2);

        mysqli_stmt_close($stmt2);


        //cadastro na tabela de endereços
        $sql3 = "INSERT INTO `tb_enderecos` (`endereco`, `tb_cliente_id_cliente`) VALUES (?, ?)";

        $stmt3 = mysqli_prepare($conexao, $sql3);

        mysqli_stmt_bind_param($stmt3, "si", $endereco, $id_cliente);

        mysqli_stmt_execute($stmt3);

        mysqli_stmt_close($stmt3);
        

        //cadastro de aluguel
        // $sql4 = "INSERT INTO `tb_aluguel` (`data_aluguel`, `tb_funcionario_id_funcionario`, `tb_cliente_id_cliente`) 
        //     VALUES (?, ?, ?)";

        //     $stmt4 = mysqli_prepare($conexao, $sql4);

        //     mysqli_stmt_bind_param($stmt4, "sii", $data, $funcionario, $id_cliente);

        //     mysqli_stmt_execute($stmt4);

        //     mysqli_stmt_close($stmt4);


        //busca no cadastro aluguel
        $id_aluguel = insereAluguelVerificaID($conexao, $data, $funcionario, $id_cliente);

        //cadastro na veiculo_aluguel

        $sql_final = "INSERT INTO `tb_veiculo_aluguel` (`tb_veiculo_id_veiculo`, `tb_aluguel_id_aluguel`) 
                       VALUES (?, ?)";

        $stmt_final = mysqli_prepare($conexao, $sql_final);

        mysqli_stmt_bind_param($stmt_final, "ss", $veiculo, $id_aluguel);

        mysqli_stmt_execute($stmt_final);

        mysqli_stmt_close($stmt_final);
        
        //Update no estado do carro
        $update = "UPDATE `tb_veiculo` SET `estado_veiculo` = 'a' WHERE `id_veiculo` = ? ";
        
        $stmtUpdate = mysqli_prepare($conexao, $update);
        
        mysqli_stmt_bind_param($stmtUpdate, "i", $veiculo);
        
        if (mysqli_stmt_execute($stmtUpdate)) {

            mysqli_stmt_close($stmtUpdate);
            
            
            //Desfaz o array no session
            if (isset($_SESSION['dados'])){unset($_SESSION['dados']);}
            
            //redireciona p/ prox. página
            header('Location: exibir_veiculos.php');
            exit();
        } else {
            header('Location: form_aluguel');
            exit();
        }

        //Formulário de empresa
    } elseif ($_GET['origem'] == 3) {

        $cnpj_cliente = $_GET['cnpj'];
        $responsavel = $_GET['func_resp'];
        $endereco = $_GET['endereco'];


        list($nome, $tipo) = $_SESSION['dados'];

        $sql = "INSERT INTO `tb_cliente` (`nome_cliente`, `tipo_cliente`) VALUES ('$nome', '$tipo')";

        mysqli_query($conexao, $sql);

        //busca para pegar o último id cadstrado
        $sql_busca = "SELECT id_cliente FROM tb_cliente";

        $resultado = mysqli_query($conexao, $sql_busca);

        if (mysqli_num_rows($resultado) > 0) {
            while ($linha = (mysqli_fetch_array($resultado))) {
                $id_cliente = $linha['id_cliente'];
            }
        }
    }

    $sql2 = "INSERT INTO `tb_empresa` (`nome_empresa`, `cnpj`, `func_responsavel`, `tb_cliente_id_cliente`) VALUES
                ('$nome', '$cnpj_cliente', '$responsavel', '$id_cliente')";

    mysqli_query($conexao, $sql2);

    //cadastro na tabela de endereços
    $sql3 = "INSERT INTO `tb_enderecos` (`endereco`, `tb_cliente_id_cliente`) VALUES ('$endereco', '$id_cliente')";

    mysqli_query($conexao, $sql3);

            //busca do funcionario 
            $sql4 = "SELECT id_funcionario FROM tb_funcionario WHERE cpf_funcionario = '$funcionario'";
        
            $resultado_4 = mysqli_query($conexao, $sql4);
            
            if (mysqli_num_rows($resultado_4) > 0) {
                while ($linha = (mysqli_fetch_array($resultado_4))) {
                    $id_funcionario = $linha['id_funcionario'];
                }
            }
            
            //cadastro de aluguel
            $sql5 = "INSERT INTO `tb_aluguel` (`data_aluguel`, `tb_funcionario_id_funcionario`, `tb_cliente_id_cliente`) 
                VALUES ('$data', '$id_funcionario', '$id_cliente')";
    
                mysqli_query($conexao, $sql5);
    
            //busca no cadastro aluguel
    
            $sql6 = "SELECT id_aluguel FROM tb_aluguel";
    
            $resultados6 = mysqli_query($conexao, $sql6);
    
            if (mysqli_fetch_array($resultados6)>0) {
                while ($linha6 = mysqli_fetch_array($resultados6)) {
                    $id_aluguel = $linha6['id_aluguel'];
                }
            }
    
            //cadastro na veiculo_aluguel
    
            $sql_final = "INSERT INTO `tb_veiculo_aluguel` (`tb_veiculo_id_veiculo`, `tb_aluguel_id_aluguel`) 
                VALUES ('$veiculo', '$id_aluguel')";


    //Desfaz o array no session
    if (isset($_SESSION['dados'])) {
        unset($_SESSION['dados']);
    }

    //executa o cadastro na tabela endereço e redireciona p/ prox. página
    if (mysqli_query($conexao, $sql_final)) {
        header('Location: index.html');
        exit();
    } else {
        header('Location: form_aluguel');
        exit();
    }
?>