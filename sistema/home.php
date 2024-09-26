<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';
    
   
    foreach($_SESSION['dados_funcionario'] as $dados){

        $nomeFuncionario = $dados[0];
        $id_funcionario = $dados[1];
    }
    $_SESSION['idFuncionario'] = $id_funcionario;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <center>
        <h3>Bem vinda(o): <?php echo $nomeFuncionario; ?></h3> 
        <div style="background-color:rgb(119, 243, 243);">
            <a href="form_veiculo.html">Formulário de veículo</a> <br><br>
            <a href="cad_cliente.php?origem=1">Cadastrar cliente</a> <br><br>
            <a href="formulario_funci.html">Formulário de funcionário</a> <br><br> 
            <a href="exibir_veiculos.php">veiculos</a> <br><br>
            <a href="busca_clientes.html">Exibir clientes / Histórico de alugueis</a> <br><br>
            <a href="teste.php">Testes</a> <br><br>
            <a href="limpar_sessions.php?origem=1">sair</a> <br>
        </div>
    </center>
</body>
</html>