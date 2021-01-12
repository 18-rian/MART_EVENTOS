<?php 
    session_start();

    $cnpj = $_POST["cnpj"];
    include("conexao.php");
    
    $SELECT = "SELECT 
                nome
            FROM 
                grupos_itinerantes
            WHERE 
                cnpj_itine = $cnpj;
            ";
            
    $query = mysqli_query($conexao, $SELECT);
    
    while($registros = mysqli_fetch_assoc($query))
    {
        $nome = $registros["nome"];
    }


    $_SESSION["cnpj_temp"] = $cnpj;
    $_SESSION["nome"] = $nome;


    header("Location: negoc.php");
?>