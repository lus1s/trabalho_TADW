<?php
/**
 * @author Luís Carlos  <luiscarlosantoa1235@gmail.com> 
 */
      require_once 'testeLogin.php';
      require_once 'operacoes.php';
      require_once 'conexao.php';
      
      $idCliente = $_GET['idCliente'];
      $nomeCliente = $_GET['nomeCliente'];
      $kmRodado = $_SESSION['kmdevolucao'];
      $valorDevolucao = $_GET['valorDevolucao'];
      $tipoPgamento = $_GET['tipoPgamento'];

      foreach($_SESSION['dados_funcionario'] as $dados){$id_funcionario = $dados[1];}

      $veiculo = $_SESSION['carrinho_devolucao']['veiculo_devolucao'];

      $veiculoUnico = removerRepetidosArray($veiculo);
      $veiculoKm = array_combine($veiculoUnico, $kmRodado);
      
      
      foreach ($veiculoKm as $id => $km) {

            $id_aluguel = idAluguelPorTbVeiculoAluguel($conexao, $id);

            devolucaoIndividual($conexao, $valorDevolucao, $tipoPgamento, $id_aluguel, $id_funcionario);

            estadoVeiculo($conexao, $id);

            kmFinal($conexao, $id, $km);

            updateKmInicial($conexao, $id, $km);

            updateEstadoVeiculo($conexao, $id);

            
      }

      header('Location: relatorios.php?origem=5&cliente='.$nomeCliente.'&valor='.$valorDevolucao.'&tipo='.$tipoPgamento);
      exit();

?>