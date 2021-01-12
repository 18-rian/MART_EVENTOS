<?php
    session_start();
    $a = $_POST["a"];
    $b = $_POST["b"];

    include "../base_de_dados/conexao.php";

	$deletando = "DELETE FROM publico
						WHERE cliente_id = $a AND evento_id = $b";

    $query = mysqli_query($conexao, $deletando);


    mysqli_close($conexao);


?>