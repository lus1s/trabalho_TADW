<?php

    function idAluguelPorTbVeiculo($conexao, $id_veiculo){
        $sql = "SELECT tb_aluguel_id_aluguel FROM tb_veiculo_aluguel WHERE tb_veiculo_id_veiculo = '$id_veiculo'";

        $stmt = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($stmt);
    
        mysqli_stmt_bind_result($stmt, $id);
    
        mysqli_stmt_store_result($stmt);
    
        $lista = [];
        if (mysqli_stmt_num_rows($stmt) > 0) {
            while (mysqli_stmt_fetch($stmt)) {
                $lista[] = [$id];
            }
        }
        mysqli_stmt_close($stmt);
    
        return $id;
    }
?>