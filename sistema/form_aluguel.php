<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
        
        $id_veiculo = $_GET['id_veiculo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar novo aluguel</title>
</head>
<body>
    <form action="dados_cliente.php">

        <!-- Hidden == escondido. Serve para marcar a origem da página-->
        <input type="hidden" name="origem" value="1">
        <input type="hidden" name="idVeiculo" value="<?php echo $id_veiculo; ?>">

        Nome do cliente: <br>
        <input type="text" name="nome_cliente" id=""><br><br>
        <input type="radio" name="tipo" value="p">CPF
        <input type="radio" name="tipo" value="e">CNPJ <br><br>



        <input type="submit" value="&#10145;&#65039;">
    </form>    
</body>
</html>