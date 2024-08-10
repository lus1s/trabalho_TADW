<?php
require_once 'conexao.php';
require_once 'operacoes.php';
require_once 'testeLogin.php';

$nome_veiculo = $_GET['nome_veiculo'];
$id_veiculo = $_GET['id_veiculo'];
$id_aluguel = idAluguelPorTbVeiculo($conexao, $id_veiculo);

$data = date('Y-m-d');

if (isset($_GET['origem'])) {

    $aluguel = $_GET['id_aluguel'];
    $km_rodado = $_GET['km_rodados'];
    $valor = $_GET['valor'];
    $id_veiculo = $_GET['id_veiculo'];

    $sql_devolucao = "INSERT INTO `tb_devolucao` (`data_devolucao`, `km_rodados`, `valor_cobrado`, `tb_aluguel_id_aluguel`) 
        VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql_devolucao);

    mysqli_stmt_bind_param($stmt, "sidi", $data, $km_rodado, $valor, $id_aluguel);


    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    //alterção no estado do veículo
    $sql = "UPDATE `tb_veiculo` SET `estado_veiculo` = 'd' WHERE `id_veiculo` = ? ";

    $stmt2 = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt2, "i", $id_veiculo);

    if(mysqli_stmt_execute($stmt2)){
        
        mysqli_stmt_close($stmt2);
        header('Location: devolucao_veiculo.php');
        exit();

    }else{
        
        mysqli_stmt_close($stmt2);
        header('Location: devolucao.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolução: <?php echo $nome_veiculo; ?></title>
</head>

<body>
    <form action="devolucao.php">

        <input type="hidden" name="origem" value="1">
        <input type="hidden" name="nome_veiculo" value="<?php echo $nome_veiculo; ?>">
        <input type="hidden" name="id_aluguel" value="<?php echo $id_aluguel; ?>">
        <input type="hidden" name="id_veiculo" value="<?php echo $id_veiculo; ?>">

        Data da devolução:
        <input type="text" disabled name="data" value="<?php echo $data; ?>" id=""> <br><br>

        Kilometragem rodada durante o aluguel:
        <input type="text" name="km_rodados" id=""> <br><br>

        Valor cobrado:
        <input type="text" name="valor" id="">

        <br><br>
        <input type="submit" value="Confirmar devolução">
    </form>
</body>

</html>