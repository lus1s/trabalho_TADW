<?php
/** 
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> 
 * @author Maria <mariabeatriz678@icloud.com>
 */
require_once 'testeLogin.php';
require_once 'operacoes.php';
require_once 'conexao.php';

$nome_cliente = $_GET['nome_cliente'];

$id_cliente = $_GET['id_cliente'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dados: <?php echo $nome_cliente; ?></title>
</head>

<body>
    <a href="./home.php">voltar</a> <br><br>
    <?php

    $id_aluguel[] = idAluguelPorTbCliente($conexao, $id_cliente);

    $dados_cliente = dadosCompletosCliente($conexao, $id_cliente);

    if (!empty($dados_cliente)) {

        foreach ($dados_cliente as $cliente) {
            echo "Nome do usuario: " .  $cliente['cliente'] . "<br>";
            echo "CPF: " .  $cliente['cpf'] . " <br>";
            echo "CNH: " .  $cliente['cnh'] . " <br>";
            echo "Endereco: " .  $cliente['endereco'] . " <br>";
            echo "<br><br>";
        }
    } else {
        $dados_cliente = dadosCompletosEmpresa($conexao, $id_cliente);

        foreach ($dados_cliente as $cliente) {
            echo "Nome do usuario: " .  $cliente['cliente'] . "<br>";
            echo "CNPJ: " .  $cliente['cnpj'] . " <br>";
            echo "FUNCIONARIO RESPONSÁVEL: " .  $cliente['funcResponsavel'] . " <br>";
            echo "Endereco: " .  $cliente['endereco'] . " <br>";
            echo "<br><br>";
        }
    }
    ?>

    <table border='1'>
        <tr>
            <td colspan='4'>
                <center>
                    Veiculos p/ devolução
                </center>
            </td>
        </tr>
        <tr>
            <td>Veiculo</td>
            <td>Data</td>
            <td>Ação</td>
        </tr>
        <tr>
            
            <?php

            $veiculos = dadosAluguelIdcliente($conexao, $id_cliente);

            if ($veiculos > 0) {
                foreach ($veiculos as $dados) {
                    $nome = $dados["nome"];
                    $id_veiculo = $dados["id"];
                    $id_aluguel = $dados["aluguel"];
                    echo "<td>" . $dados["nome"] . "</td>";
                    echo "<td>" . $dados["data"] . "</td>";
                    echo "<td>
                            <button>
                                <a href='carrinho_devolucao.php?id_veiculo=$id_veiculo&nome_veiculo=$nome&cliente=$id_cliente&nome=$nome_cliente&id_aluguel=$id_aluguel&origem=2'> Devolução </a>
                            </button> 
                            <button class='btn btn-dark'>
                                <a href='carrinho_devolucao.php?id_veiculo=$id_veiculo&nome_veiculo=$nome&cliente=$id_cliente&nome=$nome_cliente&id_aluguel=$id_aluguel&origem=1' style='color: white;'>selecionar</a>
                            </button>
                        </td>";

                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Não há veiculos alugados";
            }

            // Exibiçao do carrinho
            echo '<form action="dados_devolucao.php">';
            echo '<div class="position-absolute top-0 end-0" id="frame">';
            if (empty($_SESSION['carrinho_devolucao']['veiculos_devolucao'])) {
                echo "selecione alguns veiculos";
            } else {
                $nome_veiculo = removerRepetidosArray($_SESSION['carrinho_devolucao']['veiculos_devolucao']);
                foreach ($nome_veiculo as $dados_veiculo) {

                    $nome = $dados_veiculo["nome"];
                    $id = $dados_veiculo["id_veiculo"];

                    echo "
                    <div class='card' style='width: 18rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'> $nome </h5>
                        </div>
                    </div> <br>";


                    echo '<input type="hidden" name="aluguel" value="' . $dados_veiculo["aluguel"] . '" >';
                }

                echo "<input type='hidden' name='nome' value='$nome_cliente' >";

                echo "<input type='hidden' name='cliente' value='$id_cliente'>";

                echo "<a href='limpar_sessions_devolucao.php?origem=1&cliente=$id_cliente&nome=$nome_cliente'>esvaziar carrinho</a> ";

                echo "<input type='submit' value='Seguir &#10145;&#65039;'>";
                echo '</div>';
            }
            ?>
            </form>
        </div> <br><br>
            <button><a href="">Imprimir historio</a></button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>