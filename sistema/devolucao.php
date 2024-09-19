<?php
require_once 'conexao.php';
require_once 'operacoes.php';
require_once 'testeLogin.php';

$nome_veiculo = $_GET['nome_veiculo'];
$id_veiculo = $_GET['id_veiculo'];

$data = date('d/m/Y');

$id_aluguel = idAluguelPorTbVeiculoAluguel($conexao, $id_veiculo);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolução: <?php echo $nome_veiculo; ?></title>
</head>

<body>
    <form action="devolver.php">

        <input type="hidden" name="origem" value="1">
        <input type="hidden" name="nome_veiculo" value="<?php echo $nome_veiculo; ?>">
        <input type="hidden" name="id_aluguel" value="<?php echo $id_aluguel; ?>">
        <input type="hidden" name="id_veiculo" value="<?php echo $id_veiculo; ?>">

        Data da devolução:
        <input type="text" disabled name="data" value="<?php echo $data; ?>" id=""> <br><br>

        Kilometragem rodada durante o aluguel:
        <input type="text" name="km_rodados" id=""> <br><br>

        Metodo de pagamento:
        <input type="text" name="met_pagamento"> <br><br>

        Valor cobrado:
        <input type="text" name="valor" id="">

        <br><br>
        <input type="submit" value="Confirmar devolução">
    </form>
</body>

</html>