<?php

/**
 * exibir veiculos
 * 
 * exibi os veiculos em uma tabela
 * 
 * @author Luis carlos <luiscarlosantoa1235@gmail.com>
 * 
 * @require_once /conexao.php
 * @require_once /testelogin.php
 * @require_ONCE /operacoes
 * 
 *  
 */
require_once 'conexao.php';
require_once 'testeLogin.php';
require_once 'operacoes.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>veiculos</title>
</head>

<body>
    <a href="home.php">home</a>
    <div class="position-relative">
        <table class="" style='color: white'>
            <tr>
                <td>Nome do veiculo</td>
                <td>Marca</td>
                <td>Placa</td>
                <td>Estado</td>
                <td>Ações</td>
            </tr>
            <tr>
                <?php
                //Define uma consulta SQL para buscar dados dos veículos (ID, nome, marca, placa e estado) na tabela tb_veiculo.
                $sql = "SELECT id_veiculo, nome_veiculo, marca_veiculo, placa_veiculo, estado_veiculo FROM tb_veiculo";

                //Prepara a consulta SQL para execução segura, vinculada à conexão $conexao.
                $stmt = mysqli_prepare($conexao, $sql);

                //Executa a consulta SQL preparada.
                mysqli_stmt_execute($stmt);

                //Associa os resultados da consulta SQL às variáveis $id_veiculo, $nome_veiculo, $marca, $placa e $estado.
                mysqli_stmt_bind_result($stmt, $id_veiculo, $nome_veiculo, $marca, $placa, $estado);

                //Armazena os resultados da consulta para que possam ser acessados posteriormente.
                mysqli_stmt_store_result($stmt);

                //Inicializa um array vazio chamado $dados_veiculos, que será usado para armazenar os dados dos veículos anteriormente.
                $dados_veiculos = [];
                if (mysqli_stmt_num_rows($stmt) > 0) { //Verifica se a consulta retornou alguma linha (se o número de resultados é maior que zero).
                    while ($linha = mysqli_stmt_fetch($stmt)) { //Percorre cada linha dos resultados da consulta. A função mysqli_stmt_fetch carrega os valores das colunas nas variáveis associadas previamente.

                        //Adiciona os valores das variáveis ($id_veiculo, $nome_veiculo, $marca, $placa, $estado) como um array a $dados_veiculos, formando uma lista de veículos.
                        $dados_veiculos[] = [$id_veiculo, $nome_veiculo, $marca, $placa, $estado];

                        if ($estado == "1") { //Verifica se o estado do veículo é "1", o que indica que ele está disponível.
                            $estado_exibido = "Disponível"; //Define a variável $estado_exibido com o valor "Disponível" para exibir o status do veículo.
                            $acao = "<button id='botoes' class='btn btn-success'>
                                            <a id='links' href='carrinho.php?id_veiculo=$id_veiculo&nome_veiculo=$nome_veiculo&origem=2' style='color: white;'>Alugar</a>
                                    </button>
                                    <button class='btn btn-dark'>
                                        <a href='carrinho.php?id_veiculo=$id_veiculo&nome_veiculo=$nome_veiculo&origem=1' style='color: white'>selecionar
                                        </a>
                                    </button>";
                        } elseif ($estado == "2") { //Verifica se o estado do veículo é "2", indicando que ele está alugado.
                            $estado_exibido = "Alugado"; //Define a variável $estado_exibido com o valor "Alugado" para indicar o status do veículo. 
                            $acao =  "<button class='btn btn-danger' disabled> Alugado </button>"; //Define $acao como um botão vermelho desabilitado com o texto "Alugado".
                        }
                        //Exibe o nome do veículo em uma tabela.
                        echo "<td scope='col'> $nome_veiculo </td>";
                        echo "<td scope='col'> $marca </td>";
                        echo "<td scope='col'> $placa </td>";
                        echo "<td scope='col'> $estado_exibido </td>";
                        echo "<td scope='col'> $acao </td>";
                        echo "</tr>";
                    }

                    //Exibição do carrinho
                    echo '<div class="position-absolute top-0 end-0" id="frame">';
                    if (empty($_SESSION['nome_veiculo'])) { //Verifica se a variável de sessão $_SESSION['nome_veiculo'] está vazia.
                        echo "selecione alguns veiculos"; //Exibe a mensagem "selecione alguns veículos" caso a variável de sessão esteja vazia.
                    } else {
                        $nome_veiculo = $_SESSION['nome_veiculo']; //Atribui o conteúdo de $_SESSION['nome_veiculo'] à variável local $nome_veiculo.

                        foreach ($nome_veiculo as $id => $nome) { //Percorre o array $nome_veiculo, atribuindo a chave a $id e o valor a $nome.
                            echo "
                                <div class='card' style='width: 18rem;'>
                                    <img src='...' class='card-img-top' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$nome</h5>
                                        <a href='limpar_sessions.php?id=$id&origem=3' class='btn btn-primary'>remover</a> 
                                    </div>
                                </div> <br>";
                        }
                        echo "<a href='limpar_sessions.php?origem=2'>esvaziar carrinho</a>";

                        echo '<button> <a href="clientes.php?origem=2">Continuar Aluguel</a></button>';
                        echo '</div>';
                    }
                } else {
                    echo "<td colspan='5'>não há veiculos cadastrados</td>
                        </tr>";
                }
                ?>
        </table>
    </div>

    <button><a href="">imprimir relatorio</a></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>