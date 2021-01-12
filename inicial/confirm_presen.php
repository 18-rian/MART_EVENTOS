<?php 
    session_start();

    $a = $_POST["a"];
    $b = $_POST["b"];


    include "../base_de_dados/conexao.php";

	$inserindo = 'INSERT INTO publico
						(cliente_id, evento_id)
					VALUES ('.$a.', '.$b.')';

    

    $query = mysqli_query($conexao, $inserindo);


    mysqli_close($conexao);

?>