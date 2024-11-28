<?php
/**
 * @author Maria <mariabeatriz678@icloud.com>
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> 
 * 
 */
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico de Alugueis</title>
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
<table id="tabela">
        <tr>
            <td colspan="4"><h3>Aluguel Pendente</h3></td>
        </tr>
        <tr>
            <td colspan='4'><hr></td>
        </tr>
        <tr>
            <td><h4>Cliente</h4></td>
            <td><h4>Funcionario</h4></td>
            <td><h4>Data</h4></td>
            <td><h4>Devolução</h4></td>
        </tr>
        
            <?php
                $alugueis = dadosAluguelNaoDevolvido($conexao);

                foreach ($alugueis as $valor) {
                    $id = $valor["idCliente"];
                    $cliente = $valor["cliente"];
                    echo "<tr>";
                    echo "<td>". $valor["cliente"] ."</td>";
                    echo "<td>". $valor["funcionario"] ."</td>";
                    echo "<td>". $valor["data"] ."</td>";
                    echo "<td><a href='./dados_individuais.php?id_cliente=$id&nome_cliente=$cliente' class='btn btn-danger'>Devolução</a></td>";
                    echo "</tr>";  
                    echo "<tr>
                            <td colspan='4'><hr></td>
                    </tr>";         
                }
            ?>
        
    </table>

    <a href="relatorios.php?origem=1" class="btn btn-primary">Solicitar relatório</a>

    <br><br>
    <table id="tabela">
        <tr>
            <td colspan="5"><h3>Alugueis já realizados</h3></td>
        </tr>
        <tr>
            <td><h4>Cliente</h4></td>
            <td><h4>Funcionário</h4> </td>
            <td><h4>Data locação</h4></td>
            <td><h4>Data devolução</h4></td>
            <td><h4>Valor cobrado</h4></td>
        </tr>
        
            <?php
                $aluguel = dadosDevoluçãoAluguel($conexao);

                foreach($aluguel as $dados){
                    echo "<tr>";
                    echo "<td>" . $dados["cliente"] . "</td>";
                    echo "<td>" . $dados["funcionario"] . "</td>";
                    echo "<td>" . $dados["data"] . " </td>";
                    echo "<td>" . $dados["dataDevolucao"] . "</td>";
                    echo "<td>" . $dados["valor"] . "</td>";
                    echo "</tr >";
                    echo "<tr>
                            <td colspan='5'><hr></td>
                    </tr>"; 
                }
            ?>
    </table>
    <a href="relatorios.php?origem=2" class="btn btn-primary">Solicitar relatório</a>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>