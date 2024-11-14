<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';
    
   
    foreach($_SESSION['dados_funcionario'] as $dados){

        $nomeFuncionario = $dados[0];
        $id_funcionario = $dados[1];
    }
    $_SESSION['idFuncionario'] = $id_funcionario;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Início - Veículos FARIA</title>
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
      <a href="funcionario.php" id="funcionario">
        Funcionário: <u><?php echo $nomeFuncionario; ?></u>
      </a>
      <button class="btn btn-danger" type="submit"><a href="limpar_sessions.php?origem=1" id="sair">Sair</a></button>
    </div>
  </nav>
      
    <center>
        <div class="container-fluid">
            <a href="form_veiculo.html">Formulário de veículo</a> <br><br>
            <a href="cad_cliente.php?origem=1">Cadastrar cliente</a> <br><br>
            <a href="formulario_funci.html">Formulário de funcionário</a> <br><br> 
            <a href="exibir_veiculos.php">veiculos</a> <br><br>
            <a href="busca_clientes.html">Exibir clientes / Histórico de alugueis</a> <br><br>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>