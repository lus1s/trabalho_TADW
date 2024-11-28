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
        $id = 0;
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
    elseif ($_GET['origem'] == 2) {
        $pdf->addpage();

        $pdf->setFont('helvetica', '', 15);

        $pdf->Cell(0, 5, 'VEICULOS FARIA', 0, 1, 'C');
        $pdf->Ln();
    }


    $pdf->Output();
?>