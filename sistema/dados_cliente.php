<?php
    session_start();
    require_once 'testeLogin.php';
    require_once 'conexao.php';

    if ($_GET['origem'] == 1) {

        $nome_cliente = $_GET['nome_cliente'];
        $tipo_cliente = $_GET['tipo'];
        $id_veiculo = $_GET['id_veiculo'];
        $funcionario = $_GET['funcionario'];

        $_SESSION['dados'] = array($nome_cliente, $tipo_cliente, $id_veiculo, $funcionario);

        //futuramente adicionar uma verificação para que um cliente cadastrado não seja cadastrado de novo.
        //até lá vai ficar assim

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

        //cadastro dos dados do formulario pessoa fisica
        $sql2 = "INSERT INTO `tb_pessoa` (`cpf`, `cnh`, `tb_cliente_id_cliente`) VALUES ('$cpf', '$cnh', $id_cliente)";

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