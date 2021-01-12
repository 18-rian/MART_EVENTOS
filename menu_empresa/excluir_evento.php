<?php 
    //excluir o evento

    include("../base_de_dados/conexao.php");

    session_start();
    $id = $_SESSION["id_evento"];

    $cnpj = $_SESSION["cnpj"];

    $SQL = 'DELETE FROM eventos WHERE id_evento = '.$id.' AND cnpj_empresa = '.$cnpj.';';

    $query = mysqli_query($conexao, $SQL);



    mysqli_close($conexao);


?>
