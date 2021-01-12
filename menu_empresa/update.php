<?php

    session_start();
    $valor = $_POST["valor"];
    $a = $_POST["a"];
    $ID_EVENTO = $_SESSION["id_evento"];
    

    include("../base_de_dados/conexao.php");

    if($a == 1)
    {
        $SQL = "UPDATE eventos SET nome = '".$valor."' WHERE id_evento = $ID_EVENTO;";
        
        $QUERY = mysqli_query($conexao, $SQL);
    }
    if($a == 2)
    {
        $SQL = "UPDATE eventos SET descricao = '".$valor."' WHERE id_evento = $ID_EVENTO;";
        
        $QUERY = mysqli_query($conexao, $SQL);
    }
    if($a == 3)
    {
        $SQL = "UPDATE eventos SET local = '".$valor."' WHERE id_evento = $ID_EVENTO;";
        
        $QUERY = mysqli_query($conexao, $SQL);
        
    }
    if($a == 4)
    {
        $SQL = "UPDATE eventos SET data_horario = '".$valor."' WHERE id_evento = $ID_EVENTO;";
        
        $QUERY = mysqli_query($conexao, $SQL);
        
    }
    if($a == 5)
    {
        $SQL = "UPDATE eventos SET url = '".$valor."' WHERE id_evento = $ID_EVENTO;";
        
        $QUERY = mysqli_query($conexao, $SQL);
        
        print $SQL;
    }

    mysqli_close($conexao);
?>