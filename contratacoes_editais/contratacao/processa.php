<?php
    session_start();
    $cnpj_temp = $_SESSION["cnpj_temp"];
    $id_evento = $_SESSION["id_evento"];
    $cnpj = $_SESSION['cnpj'];
    $des = $_POST["des"];

    include("conexao.php");

    $sql = 'INSERT INTO contratacao
                (eventos_id_evento, eventos_cnpj_empresa, grupos_itinerantes_contratado, situacao, descricao_funcao)
            VALUES
                ('.$id_evento.', '.$cnpj.', '.$cnpj_temp.', 1, "'.$des.'")';

    $exe = mysqli_query($conexao, $sql);

    print "<script>alert('Solicitação de contrato enviada!')</script>";

    header("Location: ../menu_negociacao.php");

?>
