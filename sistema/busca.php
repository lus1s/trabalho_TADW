<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

    $busca = $_GET['busca'];

    $cliente = buscaCliente($conexao, $busca);
    $veiculo = buscaVeiculo($conexao, $busca);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Resultados pra: <?php echo $busca; ?></title>
</head>

<body>
    Veiculos correspondentes:
    <?php
        if (empty($veiculo)) { //Verifica se a variável de sessão $_SESSION['veiculo'] está vazia.
            echo "Não há veiculos correspondente"; //Exibe a mensagem "selecione alguns veículos" caso a variável de sessão esteja vazia.
        }else {
            foreach ($veiculo as $dados) { //Percorre o array $veiculo, atribuindo a chave a $id e o valor a $nome.
                $id = $dados['id'];
                $estado = $dados['estado'];
                $nome_veiculo = $dados['nome'];

                if ($estado == "1") { //Verifica se o estado do veículo é "1", o que indica que ele está disponível.
                    $estado_exibido = "Disponível"; //Define a variável $estado_exibido com o valor "Disponível" para exibir o status do veículo.
                    $acao = "<button id='botoes' class='btn btn-success'>
                                    <a id='links' href='carrinho.php?id_veiculo=$id&nome_veiculo=$nome_veiculo&origem=2' style='color: white;'>Alugar</a>
                            </button>";
                } elseif ($estado == "2") { //Verifica se o estado do veículo é "2", indicando que ele está alugado.
                    $estado_exibido = "Alugado"; //Define a variável $estado_exibido com o valor "Alugado" para indicar o status do veículo. 
                    $acao =  "<button class='btn btn-danger' disabled> Alugado </button>"; //Define $acao como um botão vermelho desabilitado com o texto "Alugado".
                }
                echo "
                    <div class='card' style='width: 18rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $dados['nome'] . "</h5>
                            $acao
                            </div>
                    </div> <br>";
                }
            echo '</div>';
        }
    ?>
    <div class="position-absolute top-0 end-0" id="frame">
        Clientes correspondentes

        <?php
            foreach ($cliente as $valores) {
                
                $idCliente = $valores['id'];
                $nomeCliente = $valores['nome'];

                echo "
                  <div class='card' style='width: 18rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $nomeCliente . "</h5>
                                <a href='dados_individuais.php?id_cliente=$idCliente&nome_cliente=$nomeCliente' class='btn btn-primary'>verificar</a> 
                            </div>
                    </div> <br>
                ";
            }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>