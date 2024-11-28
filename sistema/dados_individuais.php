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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Dados: <?php echo $nome_cliente; ?></title>
</head>

<body>
<nav class="navbar">
        <div class="container" id="navbar">
          <a href="home.php" id="logo">Veículos FARIA</a>
          <form class="d-flex" role="search">
            <input class="form-control me-1" type="search" placeholder="Pesquisar" aria-label="search" style="width: 300px;">
            <button class="btn btn-outline-dark" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </button>
          </form>
          <button class="btn btn-danger" type="submit"><a href="limpar_sessions.php?origem=1" id="sair">Sair</a></button>
        </div>
    </nav>


    <div class="container-func">
        <?php

        $id_aluguel[] = idAluguelPorTbCliente($conexao, $id_cliente);

        $dados_cliente = dadosCompletosCliente($conexao, $id_cliente);

        if (!empty($dados_cliente)) {
            echo "<h3>Dados do cliente - pessoa física</h3>";
            echo "<hr>";
            foreach ($dados_cliente as $cliente) {
                echo "Nome do usuario: " .  $cliente['cliente'] . "<br>";
                echo "CPF: " .  $cliente['cpf'] . " <br>";
                echo "CNH: " .  $cliente['cnh'] . " <br>";
                echo "Endereco: " .  $cliente['endereco'] . " <br>";
                echo "<br><br>";
            }
        } else {
            $dados_cliente = dadosCompletosEmpresa($conexao, $id_cliente);
            echo "<h3>Dados do cliente - pessoa jurídica</h3>";
            echo "<hr>";
            foreach ($dados_cliente as $cliente) {
                echo "Nome do usuario: " .  $cliente['cliente'] . "<br>";
                echo "CNPJ: " .  $cliente['cnpj'] . " <br>";
                echo "FUNCIONARIO RESPONSÁVEL: " .  $cliente['funcResponsavel'] . " <br>";
                echo "Endereco: " .  $cliente['endereco'] . " <br>";
                echo "<br><br>";
            }
        }
        ?>
    </div>
    
    <div class="container-func">
<table id=tabela>
        <tr>
            <td colspan='4'>
                    <h3>Veículos para Devolução</h3>
            </td>
        </tr>
        <tr>
            <td colspan='8'><hr></td>
        </tr>
        <tr>
            <td><h5>Veículo</h5></td>
            <td><h5>Data</h5></td>
            <td><h5>Ação</h5></td>
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
                                <a href='carrinho_devolucao.php?id_veiculo=$id_veiculo&nome_veiculo=$nome&cliente=$id_cliente&nome=$nome_cliente&id_aluguel=$id_aluguel&origem=2' class='btn btn-danger'> Devolução </a>

                                <a href='carrinho_devolucao.php?id_veiculo=$id_veiculo&nome_veiculo=$nome&cliente=$id_cliente&nome=$nome_cliente&id_aluguel=$id_aluguel&origem=1' style='color: white;' class='btn btn-success'>selecionar</a>
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
                echo "";
            } else {
                $nome_veiculo = removerRepetidosArray($_SESSION['carrinho_devolucao']['veiculos_devolucao']);
                foreach ($nome_veiculo as $dados_veiculo) {

                    $nome = $dados_veiculo["nome"];
                    $id = $dados_veiculo["id_veiculo"];

                    echo "
                        <div class='card'>
                            <div class='card2'>
                                <div class='card-veiculo-devolver'>
                                    <div class='card-body'>
                                        <h5 class='card-title'> $nome </h5>
                                    </div>
                                </div>
                            </div>  
                        </div>";

                    echo '<input type="hidden" name="aluguel" value="' . $dados_veiculo["aluguel"] . '" >';
                }

                echo "<input type='hidden' name='nome' value='$nome_cliente' >";

                echo "<input type='hidden' name='cliente' value='$id_cliente'>";

                echo "<input type='submit' value='Próximo'>";

                echo "<center><a href='limpar_sessions_devolucao.php?origem=1&cliente=$id_cliente&nome=$nome_cliente'>Limpar carrinho</a></center>";
                echo '</div>';
            }
                                
            ?>
            </form>
            </div> 
        </table>
    </div>
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>