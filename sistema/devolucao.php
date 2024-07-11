<?php
    require_once 'conexao.php';

    $nome_veiculo = $_GET['nome_veiculo'];
    $id_aluguel = $_GET['id_aluguel'];

    $data = date('Y-m-d');
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

        <input type="hidden" name="origem" value="devolucao">
        <input type="hidden" name="nome_veiculo" value="<?php echo $nome_veiculo; ?>">
        <input type="hidden" name="id_aluguel" value="<?php echo $id_aluguel; ?>">

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