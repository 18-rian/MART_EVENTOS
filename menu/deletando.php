<?php

    session_start();
    include("../base_de_dados/conexao.php");
    $id = $_SESSION["id"];


    $deletando = "DELETE 
                    FROM
                    publico
                    WHERE 
                    cliente_id = $id";

    $query_one = mysqli_query($conexao, $deletando);
    
    $SQL = "DELETE FROM cliente WHERE id = '$id'";

    $query = mysqli_query($conexao, $SQL);
    

    mysqli_close($conexao);

    session_destroy();


?>