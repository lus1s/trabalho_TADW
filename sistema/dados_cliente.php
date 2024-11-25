<?php
/** @author Luís Carlos  <luiscarlosantoa1235@gmail.com>  */
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    if ($_GET['origem'] == 1) {

        $nome_cliente = $_GET['nome_cliente'];
        $tipo_cliente = $_GET['tipo'];
        $id_veiculo = $_GET['idVeiculo'];
        $funcionario = $_SESSION['idFuncionario'];

        $_SESSION['dados'] = array($nome_cliente, $tipo_cliente, $id_veiculo, $funcionario);

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

        //faz tudo que os dois trechos anteriores fazem.(os que estão comentados)
        $id_cliente = insereClienteVerificaID($conexao, $nome, $tipo);


        //cadastro dos dados do formulario pessoa fisica
        inserePessoa($conexao, $cpf, $cnh, $id_cliente);

        //cadastro na tabela de endereços
        insereEnderecos($conexao,$endereco, $id_cliente);

        //busca no cadastro aluguel
        $id_aluguel = insereAluguelVerificaID($conexao, $funcionario, $id_cliente);

        //busca na tb_veiculo, retornando  o km já rodado
        $km_inicial = KmAtual($conexao, $veiculo);
        
        $km_final = 0;
        //cadastro na veiculo_aluguel
        insereVeiculosAluguel($conexao, $veiculo, $id_aluguel, $km_inicial, $km_final);
        
        //Update no estado do carro
        $update = "UPDATE `tb_veiculo` SET `estado_veiculo` = '2' WHERE `id_veiculo` = ? ";
        
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
        $data = date('Y-m-d');


        list($nome, $tipo, $veiculo, $funcionario) = $_SESSION['dados'];
    
        //insere os dados na tabela cliente e retorna o id do cadastro;
        $id_cliente = insereClienteVerificaID($conexao, $nome, $tipo);

        //insere os dado na tabela empresa;
        insereEmpresa($conexao, $nome, $cnpj_cliente, $responsavel, $id_cliente); 

        //cadastro na tabela de endereços
        insereEnderecos($conexao,$endereco, $id_cliente);

       
        //cadastro na tabela aluguel, e retorno do id;
        $id_aluguel = insereAluguelVerificaID($conexao, $funcionario, $id_cliente);

          //busca na tb_veiculo, retornando  o km já rodado
        $km_inicial = KmAtual($conexao, $veiculo);
        
        $km_final = 0;
        //cadastro na veiculo_aluguel
        insereVeiculosAluguel($conexao, $veiculo, $id_aluguel, $km_inicial, $km_final);

         //Update no estado do carro
         $update = "UPDATE `tb_veiculo` SET `estado_veiculo` = '2' WHERE `id_veiculo` = ? ";
        
         $stmtUpdate = mysqli_prepare($conexao, $update);
         
         mysqli_stmt_bind_param($stmtUpdate, "i", $veiculo);
         
        if (mysqli_stmt_execute($stmtUpdate)) {

            mysqli_stmt_close($stmtUpdate);

            //Desfaz o array no session
            if (isset($_SESSION['dados'])) {
                unset($_SESSION['dados']);
                }

            header('Location: exibir_veiculos.php');
            exit();
        } else {
            header('Location: form_aluguel.php');
            exit();
        }

        //Cadastros de varios aluguéis, com clientes já cadastrados
    }elseif ($_GET['origem'] == 4) {

        $id_cliente = $_GET['id_cliente'];
        
        $funcionario = $_SESSION['idFuncionario'];

        $veiculos = $_SESSION['nome_veiculo'];

        $id_aluguel = insereAluguelVerificaID($conexao, $funcionario, $id_cliente);

        foreach ($veiculos as $id => $nome) {

            $km_inicial = KmAtual($conexao, $id);
        
            $km_final = 0;

            insereVeiculosAluguel($conexao, $id, $id_aluguel, $km_inicial, $km_final);
            
            $update = "UPDATE `tb_veiculo` SET `estado_veiculo` = '2' WHERE `id_veiculo` = ? ";
        
            $stmtUpdate = mysqli_prepare($conexao, $update);
         
            mysqli_stmt_bind_param($stmtUpdate, "i", $id);
            mysqli_stmt_execute($stmtUpdate);
            mysqli_stmt_close($stmtUpdate);
        }        
        
            header('Location: limpar_sessions.php?origem=2');
            exit();
        
    }
?>