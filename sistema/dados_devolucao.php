<?php

/**
 * Este arquivo confirma a devolução.
 * 
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com>.
 * @author Julian Victor ,
 * @author Maria <mariabeatriz678@icloud.com>
 * @author Ana Julia <email@email.com>  .*/

session_start();
// require_once 'testeLogin.php'; 
require_once 'operacoes.php';
require_once 'conexao.php';
/**
 * 
 * @var string          $nome_cliente                  nome do cliente
 * @var int             $id_cliente                    id do cliente que vai devolver o veiculo 
 * @var int             $id_aluguel                    id do aluguel para saber quem é que está alugando
 * @var string          $dados_veiculos                dados dos veiculos e que dsq  remove os repetidos 
 */


$nome_cliente = $_GET['nome']; //Captura o valor do parâmetro nome enviado via URL e o armazena na variável $nome_cliente.  
$id_cliente = $_GET['cliente']; //Captura o valor do parâmetro cliente enviado via URL e o armazena na variável $id_cliente.
$id_aluguel[] = $_GET['aluguel']; //Adiciona o valor do parâmetro aluguel enviado via URL como um novo elemento no array $id_aluguel.
$dados_veiculos =  removerRepetidosArray($_SESSION['carrinho_devolucao']['veiculos_devolucao']); // Obtém o array veiculos_devolucao da sessão, remove duplicados usando a função removerRepetidosArray, e armazena o resultado na variável $dados_veiculos.

$date = date('d/m/Y'); //Obtém a data atual no formato e armazena na variável date.
foreach ($_SESSION['dados_funcionario'] as $dados) { //Passa por cada item da lista `dados_funcionario` que está guardada na sessão, jogando o conteúdo de cada item na variável `$dados` enquanto roda o loop.

    $nomeFuncionario = $dados[0]; //Pega o primeiro valor do array "dados" (índice 0) e guarda na variável "nomeFuncionario".
    $id_funcionario = $dados[1];  //Pega o segundo valor do array "dados" (índice 1) e guarda na variável "id_funcionario".
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/script.js"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <title>Veiculos de <?php echo $nome_cliente; ?></title>
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


    <!--Cria um link HTML <a>, onde a URL aponta para dados_individuais.php com os parâmetros nome_cliente e id_cliente passados dinamicamente via PHP.-->
    <?php echo "<a href='dados_individuais.php?nome_cliente=$nome_cliente&id_cliente=$id_cliente' class='btn btn-danger' >Voltar</a>"; ?> <br><br>

    <div class="container-func">
        <!--Inicia um formulário que, ao ser submetido, enviará os dados para o arquivo confirmar_devolucao.php usando o método padrão GET.-->
        <form action="confirmar_devolucao.php" id="formDevolucao">

            <h3>Formulário de devolução de veículo</h3>
            <p>Data das Devoluções:</p>
            <input type="text" disabled value="<?php echo $date; ?>">
            <!--Coloca uma caixinha de texto desativada, só para exibir a data atual que está guardada na variável "$date", no formato "dia/mês/ano". Como está desativada, não dá pra editar, é só pra mostrar mesmo.-->

            <!-- o hidden vai p/ o php, ou outro não -->
            <input type="hidden" name="dt_devolucao" value="<?php echo $date; ?>">

            <p>Funcionário responsável pela devolução:</p>
            <input type="text" name="funcdevolucao" readonly value="<?php echo $nomeFuncionario; ?>">
            <!--Cria um campo de texto desativado, com o nome "funcdevolucao", que exibe o valor da variável PHP $nomeFuncionario sem permitir edição.-->

            <input type="hidden" name="funcdevolucao" value="<?php echo $nomeFuncionario; ?>">
            <!--Cria um campo oculto com o nome "funcdevolucao" e o valor do nome do funcionário, que é enviado no formulário sem ser visível para o usuário.-->

            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
            <!--Cria um campo invisível que guarda o ID do cliente e envia essa informação no formulário, mas o usuário não vê.-->

            <input type="hidden" name="nome" value="<?php echo $nome_cliente; ?>">
            <!--Cria outro campo invisível que guarda o nome do cliente e também envia essa informação no formulário sem mostrar pro usuário.-->
            <br><br>
            <hr>

            <?php

            foreach ($dados_veiculos as $dados) { //O "foreach ($dados_veiculos as $dados)" vai passar por cada item da lista "$dados_veiculos" e colocar um de cada vez na variável "$dados" pra usar dentro do loop.

                $id_veiculo = $dados["id_veiculo"]; //pega o valor do campo "id_veiculo" do item atual (que está na variável "$dados") e armazena na variável "$id_veiculo".

                $veiculos = dadosVeiculoPorIdVeiculo($conexao, $id_veiculo); //A linha chama uma função pra buscar os dados do veículo usando o ID e a conexão, e armazena os resultados na variável "$veiculos".

                foreach ($veiculos as $dados) {
                    $nome_veiculo = $dados[0];
                    $marca_veiculo = $dados[1];
                    $km_incial = $dados[2];

                    echo "Veículo: " . '<b>' . $nome_veiculo . '</b>' . "<br>";

                    echo "Marca: " . '<b>' . $marca_veiculo . '</b>' . "<br>";

                    echo "<hr>";

                    echo "Km ao alugar: <input type='text' class='calculo' id='kmInicial' readonly name='km_inicial'  value=" . $km_incial . "> ";

                    echo 'Km ao devolver: <input type="text" class="calculo" id="km_devolucao" name="km_devolucao[' . $id_veiculo . ']">';
                }
            }

            ?>
            <label id="aviso"></label>
            <hr>
            <p>Método de pagamento:</p>
            <select name="met_pagamento" id="">
                <option value="">Selecionar</option>
                <option value="1">Cartão</option>
                <option value="2">Pix</option>
                <option value="3">Dinheiro</option>

            </select> <br><br>

            <p>valor por km (R$):</p> <input type="text" class="calculo" name="custo" id="custo"> <br> <br>

            <p>Valor cobrado (R$):</p>
            <input type="text" name="total" readonly id="total">

            <br><br>
            <input type="submit" value="Confirmar devolução">
        </form>
    </div>


    <script>
        $(document).ready(function() {

            $(".calculo").keyup(function() {
                let somakmInicial = 0;
                $("input#kmInicial").each(function() {
                    var kmInicio = $(this).val();
                    if (kmInicio) {
                        somakmInicial += parseFloat(kmInicio);
                    }
                })
                let somakmFinal = 0;
                $("input#km_devolucao").each(function() {
                    var kmFim = $(this).val();
                    if (kmFim) {
                        somakmFinal += parseFloat(kmFim);
                    }
                })
                $(".calculo").keyup("input", function() {
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    this.value = this.value.replace(/(\..*)\./g, '$1');
                });
                if (somakmFinal >= somakmInicial) {
                    let valor = $("#custo").val();
                    let distancia = somakmFinal - somakmInicial;
                    let total = distancia * valor;
                    $("#total").val(total.toFixed(2));
                    $("#aviso").hide();

                } else {
                    let msg = "verifique os km inseridos";
                    $("#aviso").html(" Verifique os Km inseridos, pois não podem ser menor que o inicial");

                }
            })

            $("#formDevolucao").validate({
                rules: {
                    km_devolucao: {
                        required: true,
                        number: true,
                    },
                    custo: {
                        required: true,
                        number: true,
                        min: 1,
                    },
                    met_pagamento: {
                        required: true,
                    },
                },
                messages: {
                    kmFinal: {
                        required: "Por favor, insira o km verificado.",
                        number: "Por favor, insira apenas números.",
                    },
                    custo: {
                        required: "Por favor, insira o custo por km.",
                        number: "Por favor, insira apenas números.",
                        min: "O custo deve ser maior que zero."
                    },
                    met_pagamento: {
                        required: "Por favor, selecione um método de pagamento."
                    }
                }
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>