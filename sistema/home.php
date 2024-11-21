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
      <a href="funcionario.php?origem=1" id="funcionario">
        Funcionário: <u><?php echo $nomeFuncionario; ?></u>
      </a>

      <button class="btn btn-danger" type="submit"><a href="limpar_sessions.php?origem=1" id="sair">Sair</a></button>
    </div>
  </nav>

  <div class="cards">
    <div class="card" style="width: 18rem;">
      <img src="./imagens/veiculos.webp" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Novos Veículos</h5>
        <p class="card-text">Cadastre um novo veículo nesta área sempre que você desejar.</p>
        <a href="form_veiculo.html" class="btn">Cadastrar Veículo</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="./imagens/clientes.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Novos Clientes</h5>
        <p class="card-text">Cadastre um novo cliente nesta área sempre que você desejar. <i>"Trate-os sempre com muito respeito!"</i></p>
        <a href="cad_cliente.php?origem=1" class="btn">Cadastrar Cliente</a>
      </div>
    </div>
  </div>
  <div class="cards2">
    <div class="card" style="width: 18rem;">
      <img src="./imagens/carros.webp" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Nossos Veículos</h5>
        <p class="card-text">Agora, aqui, você pode ver e analisar todos os nossos veículos disponíveis.</p>
        <a href="exibir_veiculos.php" class="btn">Nossos Veículos</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="./imagens/registros.webp" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Históricos</h5>
        <p class="card-text">Mas, caso necessite relembrar de algum valor de operações passadas: VOCÊ PODE OLHAR AQUI!</p>
        <a href="busca_clientes.html" class="btn">Registros Gerais</a>
      </div>
    </div>
  </div>
  
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Novo Funcionário</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="formulario_funci.html" class="btn">Cadastrar Funcionário</a>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>