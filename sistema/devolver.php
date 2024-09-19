<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    $aluguel = $_GET['id_aluguel'];
    $km_rodado = $_GET['km_rodados'];
    $valor = $_GET['valor'];
    
    devolucaoIndividual($conexao, $valor, $pagamento, $aluguel);
    
    //alterção no estado do veículo
    $sql = "UPDATE `tb_veiculo` SET `estado_veiculo` = '1' WHERE `id_veiculo` = ? ";

    $stmt2 = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt2, "i", $id_veiculo);

    if(mysqli_stmt_execute($stmt2)){
        
        mysqli_stmt_close($stmt2);
        header('Location: exibir_veiculos.php');
        exit();

    }else{
        
        mysqli_stmt_close($stmt2);
        header('Location: exibir_veiculos.php');
        exit;
    }

?>