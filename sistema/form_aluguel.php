<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
        
        $id_veiculo = $_GET['id_veiculo']; //Recupera o valor da variável id_veiculo passado na URL (via método GET) e o armazena na variável $id_veiculo.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar novo aluguel</title>
</head>
<body>
    <a href="home.php">home</a>
    <form action="dados_cliente.php">

        <!-- Hidden == escondido. Serve para marcar a origem da página-->
        <input type="hidden" name="origem" value="1"> <!--Cria um campo oculto com o nome origem e valor 1.-->
        <input type="hidden" name="idVeiculo" value="<?php echo $id_veiculo; ?>"><!-- Cria um campo oculto com o nome idVeiculo e valor dinâmico de $id_veiculo.-->

        Nome do cliente: <br><!-- Cria um campo oculto com o nome idVeiculo e valor dinâmico de $id_veiculo.-->

        <input type="text" name="nome_cliente" id=""><br><br> <!--Cria um campo de texto para o nome do cliente.-->
        <input type="radio" name="tipo" value="p">CPF<!--Cria um botão de opção para CPF com valor p.-->
        <input type="radio" name="tipo" value="e">CNPJ <br><br><!--Cria um botão de opção para CNPJ com valor e, seguido de duas quebras de linha.-->



        <input type="submit" value="&#10145;&#65039;">
    </form>    
</body>
</html>