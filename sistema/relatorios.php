<?php
    require_once 'conexao.php';
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once './TCPDF-main/tcpdf.php';

    $pdf = new TCPDF();

    $pdf->setPrintHeader(false);

    

    if ($_GET['origem'] == 1) {

        $pdf->addpage();

        $pdf->setFont('helvetica', '', 15);

        $pdf->Cell(0, 5, 'VEICULOS FARIA', 0, 1, 'C');
        $pdf->Ln();

        $pdf->Cell(0, 5, 'Veiculos não devolvidos', 0, 1, 'C');

        $pdf->Ln();

        $alugueis = dadosAluguelNaoDevolvido($conexao);
        $id = 1;
        $pdf->setFont('helvetica', '', 12);

        if (sizeof($alugueis)> 0) {
            $pdf->Cell(30, 10, '#ID', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Cliente', 1, 0, 'C');
            $pdf->Cell(30, 10, 'Funcionario', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Data', 1, 1, 'C');

            foreach ($alugueis as $value) {
                
                $pdf->Cell(30, 10, $id, 1, 0, 'C');
                $pdf->Cell(50, 10, $value['cliente'], 1, 0, 'C');
                $pdf->Cell(30, 10, $value['funcionario'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['data'], 1, 1, 'C');

                $id ++ ;
            }
        }

    }
    elseif ($_GET['origem'] == 2) {

        $pdf->addpage('L');

        $pdf->setFont('helvetica', '', 15);

        $pdf->Cell(0, 5, 'VEICULOS FARIA', 0, 1, 'C');
        
        $pdf->Ln();
        
        $pdf->setFont('helvetica', '', 12);
        $pdf->Cell(0, 5, 'Historico de alugueis', 0, 1, 'C');

        $pdf->Ln();

        $aluguel = dadosDevoluçãoAluguel($conexao);

        $id = 0;
        if (sizeof($aluguel)> 0) {
            $pdf->Cell(30, 10, '#ID', 1, 0, 'C');
            $pdf->Cell(30, 10, 'Cliente', 1, 0, 'C');
            $pdf->Cell(30, 10, 'Funcionario', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Data locação', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Data devolução', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Valor cobrado (R$)', 1, 1, 'C');

            foreach ($aluguel as $value) {
                
                $pdf->Cell(30, 10, $id, 1, 0, 'C');
                $pdf->Cell(30, 10, $value['cliente'], 1, 0, 'C');
                $pdf->Cell(30, 10, $value['funcionario'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['data'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['dataDevolucao'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['valor'], 1, 1, 'C');

                $id ++ ;
            }
        }
        
    }
    elseif ($_GET['origem'] == 3) {
        $pdf->addpage();

        $pdf->setFont('helvetica', '', 15);

        $pdf->Cell(0, 5, 'VEICULOS FARIA', 0, 1, 'C');
        $pdf->Ln();

        $pdf->setFont('helvetica', '', 12);
        $pdf->Cell(0, 5, 'Historico de alugueis', 0, 1, 'C');

        $dados_cliente = cliente($conexao);

        $id = 1;

        if (sizeof($dados_cliente)> 0) {  
            $pdf->Cell(30, 10, '#ID', 1, 0, 'C');
            $pdf->Cell(30, 10, 'Cliente', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Endereço', 1, 1, 'C');
            foreach ($dados_cliente as $value) {
                $pdf->Cell(30, 10, $id, 1, 0, 'C');
                $pdf->Cell(30, 10, $value['nome'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['endereco'], 1, 1, 'C');

                $id ++ ;
            }
        }
    }
    elseif ($_GET['origem'] == 4) {
        $pdf->addpage('L');

        $pdf->setFont('helvetica', '', 15);

        $pdf->Cell(0, 5, 'VEICULOS FARIA', 0, 1, 'C');
        $pdf->Ln();

        $pdf->setFont('helvetica', '', 12);
        $pdf->Cell(0, 5, 'Veículos cadastrados', 0, 1, 'C');

        $dados_veiculos = dadosCompletosVeiculo($conexao);

        $id = 1;

        if (sizeof($dados_veiculos)> 0) {
            $pdf->Cell(30, 10, '#ID', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Nome', 1, 0, 'C');
            $pdf->Cell(30, 10, 'Marca', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Placa', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Km rodados', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Estado', 1, 1, 'C');
            foreach ($dados_veiculos as $value) {
                if ($value['estado'] == 1) {
                    $value['estado'] = 'Disponível';
                } else {
                    $value['estado'] = 'Alugado';
                }
                $pdf->Cell(30, 10, $id, 1, 0, 'C');
                $pdf->Cell(50, 10, $value['nome'], 1, 0, 'C');
                $pdf->Cell(30, 10, $value['marca'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['placa'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['km'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['estado'], 1, 1, 'C');

                $id ++ ;
            }
            # code...
        }

    }
    elseif ($_GET['origem'] == 5) {

        $Cliente = $_GET['cliente'];
        $valor = $_GET['valor'];
        $tipo = $_GET['tipo'];

        $pdf->addpage();

        $pdf->setFont('helvetica', '', 15);

        $pdf->Cell(0, 5, 'VEICULOS FARIA', 0, 1, 'C');
        $pdf->Ln();

        $pdf->setFont('helvetica', '', 12);
        $pdf->Cell(0, 5, 'Comprovante de devolução', 0, 1, 'C');
        
        $veiculo = $_SESSION['carrinho_devolucao']['veiculos_devolucao'];  

        $veiculoUnico = removerRepetidosArray($veiculo);

        $pdf->Cell(0, 5, 'Cliente: '.$Cliente, 0, 1, 'C');
        
        if (sizeof($veiculoUnico)> 0) {
            $pdf->Cell(30, 10, '#ID', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Veiculo', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Km rodados', 1, 1, 'C');
            $id = 1;
            foreach ($veiculoUnico as $value) {
                $pdf->Cell(30, 10, $id, 1, 0, 'C');
                $pdf->Cell(50, 10, $value['nome'], 1, 0, 'C');
                $pdf->Cell(50, 10, $value['aluguel'], 1, 1, 'C');
                
                $id ++ ;
            }   
        }
        $pdf->Cell(0, 5, 'Valor cobrado: R$ '.$valor, 0, 1, 'C');

        limparSessionDevolucao();
    } 



    $pdf->Output();
?>