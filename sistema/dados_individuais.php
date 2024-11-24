<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    //O código pega informações da URL (como o nome e o ID do cliente) e as armazena em variáveis para usá-las em outras partes do sistema.
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
    <a href="./busca_clientes.html">voltar</a> <br><br> <!-- Cria o link com o texto "voltar", e ao ser clicado, leva o usuário para o arquivo busca_clientes.html.-->
    <?php

        //A função busca o ID do aluguel do cliente e o armazena em um array.
        $id_aluguel[] = idAluguelPorTbCliente($conexao, $id_cliente);
        // A função busca todas as informações do cliente (como nome, CPF, etc.) e as armazena em uma variável.
        $dados_cliente = dadosCompletosCliente($conexao, $id_cliente);

        //Verifica se o array $dados_cliente não está vazio. Se estiver vazio, o código dentro do if não é executado.
        if (!empty($dados_cliente)) { 
           
           //Inicia um loop que percorre cada item dentro do array $dados_cliente. A cada iteração, o valor do item é atribuído à variável $cliente.
            foreach ($dados_cliente as $cliente) {

                //: Concatenando o texto "Nome: " com o valor de (nome do cliente).
                echo "Nome do usuario: " .  $cliente['cliente'] . "<br>";
                //Concatenando "CPF: " com o valor de (CPF do cliente).
                echo "CPF: " .  $cliente['cpf'] . " <br>";
                //Concatenando "CNH: " com o valor de (CNH do cliente).
                echo "CNH: " .  $cliente['cnh'] . " <br>";
                //Concatenando "Endereço: " com o valor de (endereço do cliente).
                echo "Endereco: " .  $cliente['endereco'] . " <br>";
                echo "<br><br>";
            }
        }else { //Marca o início do bloco else, que é executado caso a condição anterior (do if) seja falsa.
            $dados_cliente = dadosCompletosEmpresa($conexao, $id_cliente);

            foreach ($dados_cliente as $cliente) { //Inicia um loop que percorre cada item no array $dados_cliente. A cada iteração, o item atual (um cliente/empresa) é armazenado na variável $cliente.
                echo "Nome do usuario: " .  $cliente['cliente'] . "<br>"; //Exibe o nome do cliente (empresa) usando a chave 'cliente' do array $cliente, seguido de uma quebra de linha <br>.
                echo "CNPJ: " .  $cliente['cnpj'] . " <br>"; //Exibe o CNPJ da empresa, acessando o valor armazenado em $cliente['cnpj'], seguido de uma quebra de linha.
                echo "FUNCIONARIO RESPONSÁVEL: " .  $cliente['funcResponsavel'] . " <br>"; //Exibe o nome do funcionário responsável pela empresa, acessando o valor armazenado em $cliente, em seguido de uma quebra de linha.
                echo "Endereco: " .  $cliente['endereco'] . " <br>"; //Exibe o endereço da empresa, acessando o valor armazenado em $cliente['endereco'], seguido de uma quebra de linha.
                echo "<br><br>"; //Exibe duas quebras de linha adicionais para separar as informações de cada cliente/empresa.
            }
        }

        echo "<table border='1'>
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
            <tr>";

            $veiculos = dadosAluguelIdcliente($conexao, $id_cliente);

            if ($veiculos > 0) {
                foreach ($veiculos as $dados) {
                    $nome = $dados["nome"];
                    $id_veiculo = $dados["id"];
                    $id_aluguel = $dados["aluguel"];
                   echo "<td>" . $dados["nome"] ."</td>";
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
            }
            else {
                echo "Não há veiculos alugados";
            }
           
        // Exibiçao do carrinho
        echo '<form action="dados_devolucao.php">';
        echo '<div class="position-absolute top-0 end-0" id="frame">';
        if (empty($_SESSION['carrinho_devolucao']['veiculos_devolucao'])) {
            echo "selecione alguns veiculos";
        }else {    
           $nome_veiculo = removerRepetidosArray($_SESSION['carrinho_devolucao']['veiculos_devolucao']);
            foreach($nome_veiculo as $dados_veiculo) {

                $nome = $dados_veiculo["nome"];
                $id = $dados_veiculo["id_veiculo"];

                echo"
                    <div class='card' style='width: 18rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'> $nome </h5>
                        </div>
                    </div> <br>";

                    
                    echo '<input type="hidden" name="aluguel" value="' . $dados_veiculo["aluguel"] .'" >';
                }

                echo "<input type='hidden' name='nome' value='$nome_cliente' >";

                echo "<input type='hidden' name='cliente' value='$id_cliente'>";

                echo "<a href='limpar_sessions_devolucao.php?origem=1&cliente=$id_cliente&nome=$nome_cliente'>esvaziar carrinho</a> ";

                echo "<input type='submit' value='Seguir &#10145;&#65039;'>";
                echo '</div>';
        }
    ?>
    </form>

 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>