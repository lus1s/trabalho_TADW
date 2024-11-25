<?php
      require_once 'testeLogin.php';
      require_once 'operacoes.php';
      require_once 'conexao.php';
      
      $idCliente = $_GET['idCliente'];          //Obtém o valor de idCliente da URL e o armazena na variável $idCliente.
      $kmRodado = $_SESSION['kmdevolucao'];     // Obtém o valor de kmdevolucao da sessão e o armazena na variável $kmRodado.
      $valorDevolucao = $_GET['valorDevolucao'];//Obtém o valor de valorDevolucao da URL e o armazena na variável $valorDevolucao.
      $tipoPgamento = $_GET['tipoPgamento'];    //Obtém o valor de tipoPgamento da URL e o armazena na variável $tipoPgamento.

      //Itera sobre o array $_SESSION['dados_funcionario'] e, para cada elemento ($dados), atribui o valor do segundo item (índice 1) ao $id_funcionario.
      foreach($_SESSION['dados_funcionario'] as $dados){$id_funcionario = $dados[1];}

      //Obtém o valor associado à chave 'veiculo_devolucao' do array $_SESSION['carrinho_devolucao'] e o armazena na variável $veiculo.
      $veiculo = $_SESSION['carrinho_devolucao']['veiculo_devolucao'];

      //Cria um novo array associativo usando os elementos de $veiculo como chaves e os elementos de $kmRodado como valores.
      $veiculoKm = array_combine($veiculo, $kmRodado);
      
      //Itera sobre o array $veiculoKm, com $id como o ID do veículo e $km como a quilometragem.
      foreach ($veiculoKm as $id => $km) {

            //Obtém o ID do aluguel relacionado ao veículo, usando o ID do veículo.
            $id_aluguel = idAluguelPorTbVeiculoAluguel($conexao, $id);

            //Processa a devolução do veículo, passando o valor, tipo de pagamento, ID do aluguel e ID do funcionário.
            devolucaoIndividual($conexao, $valorDevolucao, $tipoPgamento, $id_aluguel, $id_funcionario);

            //Atualiza o estado do veículo (como "disponível" ou "devolvido").
            estadoVeiculo($conexao, $id);

            //Registra a quilometragem final do veículo no banco de dados.
            kmFinal($conexao, $id, $km);

            //Atualiza a quilometragem inicial do veículo com a quilometragem final.
            updateKmInicial($conexao, $id, $km);

            //Atualiza o estado do veículo no banco de dados.
             updateEstadoVeiculo($conexao, $id);

            //Limpa os dados da sessão relacionados à devolução do veículo.
            limparSessionDevolucao();
      }

      header('Location: home.php'); //Redireciona o usuário para a página home.php.
      exit(); //Encerra a execução do script após o redirecionamento.

?>