<?php
    require_once 'testeLogin.php';
    require_once 'operacoes.php';
    require_once 'conexao.php';
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table> 
        <tr>
            <td>cpf do cliente</td>
            <td>cnh cliente</td>
            <td>nome do cliente</td>
        </tr>
        
        <?php

$nome_cliente = $_GET['nome_cliente'];
$id_cliente = $_GET['id_cliente'];
echo $nome_cliente;

      $sql = "SELECT cpf, cnh FROM tb_pessoa WHERE tb_cliente_id_cliente = ?";

      $stmt = mysqli_prepare($conexao, $sql);

      mysqli_stmt_bind_param($stmt, "s", $id_cliente);

      mysqli_stmt_execute($stmt);

      mysqli_stmt_bind_result($stmt, $cpf, $cnh);

      mysqli_stmt_store_result($stmt);

      $dados_cliente = [];

      if (mysqli_stmt_num_rows($stmt) > 0) {

        mysqli_stmt_fetch($stmt);

        $dados_cliente[] = [$cpf, $cnh];

        echo "<td> $cpf </td>";
        echo "<td> $cnh </td>";
        echo  "<td><button><a href= 'dados_individuais.php? </td>";

      

      }
    


      
      $sql = "SELECT tb_veiculos_id_veivulo, tb_aluguel_id_aluguel FROM tb_veiculos_aluguel WHERE tb_veiculos = ?";


     $stmt = mysqli_prepare($conexao, $sql);




     mysqli_stmt_bind_param($stmt, "s", $id_cliente);




     mysqli_stmt_execute($stmt);




     mysqli_stmt_bind_result($stmt, $tb_veiculos_id_veivulo, $tb_aluguel_id_aluguel);




     mysqli_stmt_store_result($stmt);


     $dados_veiculos = [];




     if (mysqli_stmt_num_rows($stmt) > 0) {


      while (mysqli_stmt_fetch($stmt)) {
       
        $dados_veiculos[] = [$tb_veiculos_id_veivulo, $tb_aluguel_id_aluguel];


       
        echo "<td> $tb_veiculos_id_veivulo </td>";
        echo "<td> $tb_aluguel_id_aluguel </td>";
       
       
        echo "<td><button><a href='dados_individuais.php?id_veiculo=$tb_veiculos_id_veivulo'>Detalhes</a></button></td>";
    }
}




      ?>
      

?>



          

      
      
      ?>

</table>
</body>
</html>