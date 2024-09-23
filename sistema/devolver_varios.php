<?php
      require_once 'testeLogin.php';
      require_once 'operacoes.php';
      require_once 'conexao.php';
      
      $idCliente = $_GET['idCliente'];
      $kmRodado = $_GET['kmRodado'];
      $valorDevolucao = $_GET['valorDevolucao'];
      $tipoPgamento = $_GET['tipoPgamento'];

      
      foreach($_SESSION['dados_funcionario'] as $dados){$id_funcionario = $dados[1];}
      
      $veiculo = $_SESSION['carrinho_devolucao']['veiculos_devolucao'];

      $veiculoKm = array_combine($kmRodado, $veiculo);


      foreach ($veiculoKm as $id => $km) {

            $id_aluguel = idAluguelPorTbVeiculoAluguel($conexao, $id);

            devolucaoIndividual($conexao, $valorDevolucao, $tipoPgamento, $id_aluguel, $id_funcionario);

            estadoVeiculo($conexao, $id);

            kmFinal($conexao, $id, $km);

            updateKmInicial($conexao, $id, $km);
      }

      header('Location: home.php');
      exit();

?>