<?php

/**
 * Cadastro de cliente
 * 
 * Esta página processa os dados e envia para o banco
 * 
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com>
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
    
    <a href="./busca_clientes.html">voltar</a>
    <table border="1">
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
                        <td>#</td>
                        <td>Nome Cliente</td>
                        <td>Tipo Cliente</td>
                        <td>Ação</td>
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
                            $acao = "<button><a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente'>exibir</a></button>";
                        }
                        else {
                            $acao = "<button><a href='dados_cliente.php?origem=4&id_cliente=$id_cliente'>selecionar</a></button>";
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
                        $valor++;
                    }

                    //echo          =>  serve para exibir na tela algum texto/ mensagem ou item;
                    //foi usado echo para exibir um botão que possibilita o cadastro de um novo cliente;

                    echo "<button><a href='cad_cliente.php?origem=1'>cadastrar novo cliente</a></button>";
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
                    echo "<td><button><a href='dados_individuais.php?id_cliente=$id_cliente&nome_cliente=$nome_cliente'>exibir</a></button></td>";
                    echo "</tr>";
                    $valor++;
                }
            } 

            else {
                echo "Realize sua busca!";
            }

        ?>
    </table>
</body>

</html>