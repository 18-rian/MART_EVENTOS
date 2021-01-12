<?php 
    
    $repre = $_POST["repre"];
    
    session_start();
    include("../base_de_dados/conexao.php");

    if($_POST["y"] == 1)
    {
        $sql = 'UPDATE contratacao SET situacao = 2 WHERE id_contrato = '.$repre.'';
        
        $query = mysqli_query($conexao, $sql);
        
    }
    else if($_POST["y"] == 2)
    {
        $sql = 'UPDATE contratacao SET situacao = 3 WHERE id_contrato = '.$repre.'';
        
        $query = mysqli_query($conexao, $sql);
    }

    //Precisa fazer os eventos de recusa e aceitação de oferta.

    mysqli_close($conexao);
?>