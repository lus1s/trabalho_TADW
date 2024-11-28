<?php

/**
 * Cadastro de cliente
 * 
 * Esta página processa os dados e envia para o banco
 * 
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com>
 *  Julian Victor <julianvictorlopesoliveira@gmail.com> 
 * @author Maria <mariabeatriz678@icloud.com>
 * 
 * @requires testeLogin.php
 * @requires operacoes.php
 * @requires conexao.php
 */

    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';

/**
 * @var int       $origem         1 = traz o formuário responsável pela definição do tipo de cliente;
 * @var int       $origem         2 = destinado a identificação do cliente em pessoa física ou pessoa jurídica;
 * @var int       $origem         3 = traz os formuários específicos referentes aos tipos de cliente;
 * @var int       $origem         4 = destinado ao cadastro dos dados do cliente como pessoa física;
 * @var int       $origem         5 = destinado ao cadastro dos dados do cliente nos diferentes casos; 
 */

    $origem = $_GET['origem'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <!--Foi feita uma tabela para apresentar os dados dos clientes:
        $tipo_cliente   => string   => define o tipo do cliente:
            $cliente    => situação => pessoa física;
            $cliente    => situação => empresa;

        Os dados apresentados podem ser:
        $nome           => string   => recebe o nome do cliente; 
        $tipo_cliente   => string   => recebe o tipo do cliente, em pessoa física ou pessoa jurídica;
        $acao           => ação     => seleciona um cliente ou executa um ação de pesquiza;
    -->
    
    <nav class="navbar">
        <div class="container" id="navbar">
          <a href="home.php" id="logo">Veículos FARIA</a>
          <form class="d-flex" action="busca.php" role="search">
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
        <table id="tabela">
        <?php
            if ($origem == 1) {
                $nome = $_GET['cliente'];

                //$sql  => mysqli   => seleciona o cliente da tabela cliente onde o nome for o pesquisado;
                $sql = "SELECT nome_cliente FROM tb_cliente WHERE nome_cliente LIKE %?%";

                //$stmt => mysqli   => prepara a execução do $sql;
                $stmt = mysqli_prepare($conexao, $sql);

                mysqli_stmt_bind_param($stmt, "s", $nome);
                mysqli_stmt_execute($stmt);
            } 

            elseif ($origem == 2) {
                $valor = 1;
                $dados_cliente = [];

                echo "<tr>
                        <td><h3>#</h3></td>
                        <td><h3>Nome Cliente</h3></td>
                        <td><h3>Tipo Cliente</h3></td>
                        <td><h3>Ação</h3></td>
                        <tr>
                            <td colspan='5'><hr></td>
                        </tr>
                     </tr>";

                //$sql  => mysqli   => seleciona o cliente da tabela cliente onde o nome for o pesquisado;
                $sql = "SELECT id_cliente, nome_cliente, tipo_cliente FROM tb_cliente";

                //$stmt => mysqli   => prepara a execução do $sql;
                $stmt = mysqli_prepare($conexao, $sql);

                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $id_cliente, $nome_cliente, $tipo_cliente);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {

                    //$while        =>  situação    =>  foi feita uma verificação para organizar os dados do cliente, como;
                    //$id_cliente   =>  int         =>  traz o número identificador do cliente selecionado;
                    //$nome_cliente =>  string      =>  traz o nome do cliente selecionado;
                    //$tipo_cliente =>  string      =>  traz o tipo do cliente, no caso, se é pessoa física ou pessoa jurídica;
                    //$acao         =>  situação    =>  após selecionada essa função exibe os dados individuais do cliente;  
                    //$acao         =>  situação    =>  após selecionada essa função seleciona o cliente para uma ação;

                    while (mysqli_stmt_fetch($stmt)) {
                        $dados_cliente[] = [$id_cliente, $nome_cliente, $tipo_cliente];

                        if ($tipo_cliente == "p") {
                            $cliente = "pessoa fisica";
                        }
                        else {
                            $cliente = "empresa";
                        }
                        if (empty($_SESSION['nome_veiculo'])) {
                            $acao = "<a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente' class='btn btn-success'>Exibir</a>";
                        }
                        else {
                            $acao = "<a href='dados_cliente.php?origem=4&id_cliente=$id_cliente' class='btn btn-success'>Selecionar</a>";
                        }

                        //echo          =>  serve para exibir na tela algum texto/ mensagem ou item;
                        //foi usado echo para fazer uma tabela que exibe os seguintes dados;
                        //$valor        =>  int      =>  identifica o cliente;
                        //$nome_cliente =>  string   =>  traz o nome do cliente selecionado; 
                        //$cliente      =>  string   =>  traz o tipo do cliente, no caso, se é pessoa física ou pessoa jurídica;
                        //$acao         =>  situação =>  exibe a ação que se encaixe na situação adequada;

                        echo "<td> $valor </td>";
                        echo "<td> $nome_cliente </td>";
                        echo "<td> $cliente </td>";
                        echo "<td> $acao </td>";
                        echo "</tr>";
                        echo "<tr>
                                <td colspan='5'><hr></td>
                            </tr>";
                        $valor++;
                    }

                    //echo          =>  serve para exibir na tela algum texto/ mensagem ou item;
                    //foi usado echo para exibir um botão que possibilita o cadastro de um novo cliente;

                    echo "<a href='cad_cliente.php?origem=1' class='btn btn-dark' id='novo-cliente'>Cadastrar novo cliente</a>";
                }
            }
            
            elseif ($origem == 3) {

                //echo          =>  serve para exibir na tela algum texto/ mensagem ou item;
                //foi usado echo para exibir uma tabela com o Nome do cliente e o Tipo do cliente;

                echo " <table border='1'>
                        <tr>
                            <td>#</td>
                            <td>Nome Cliente</td>
                            <td>Tipo Cliente</td>
                        </tr>";

                $valor = 1;

                //$cliente  =>  exibe os clientes cadastrados e ainda não possuem um aluguel;
                
                $cliente = clientesCadastradasSemAluguel($conexao);

                //$unico    =>  verifica os valores e certificam sua unicidade;

                $unico = array_unique($cliente, SORT_REGULAR);

                //foreach       =>  organiza os dados vindos do ($unico) e insere em ($dados);
                //$tipo_cliente =>  string  =>  recebe o tipo do cliente com pessoa física ou pessoa jurídica;
                //$nome_cliente =>  string  =>  recebe o nome do cliente;
                //$id_cliente   =>  int     =>  rece be o número identificador;

                foreach ($unico as $dados) {
                    $tipo_cliente = $dados["tipo"];
                    $nome_cliente = $dados["cliente"];
                    $id_cliente   = $dados["id"];

                    if ($tipo_cliente == "p"){ $cliente = "pessoa fisica";}
                    else {$cliente = "empresa";}

                    //foi usado echo para exibir uma tabela com os dados $valor, $dados["cliente"] e $cliente;
                    //possui também um botão que exibe os dados do cliente;
                    
                    echo "<td>" . $valor . "</td>";
                    echo "<td>" . $dados["cliente"] ."</td>";
                    echo "<td>" . $cliente . "</td>";
                    echo "<td><a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente' class='btn btn-success'>Exibir</a></td>";
                    echo "</tr>";
                    $valor++;
                }
            } 

            else {
                echo "Realize sua busca!";
            }

        ?>
    </table>
    </div>


    <div id="impressao">
        <a href="relatorios.php?origem=3" class="btn btn-primary" id="impressao">Imprimir Relatório</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>